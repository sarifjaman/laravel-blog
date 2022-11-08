<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //Home
    public function home()
    {
        //Top Head Image Sec
        $posts = Post::orderBy('created_at', 'DESC')->take(5)->get();

        $firstposts2 = $posts->splice(0, 2);
        $middleposts = $posts->splice(0, 1);
        $lastposts = $posts->splice(0);

        //Footer Image Sec
        $footerposts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();

        $firstfooterpost = $footerposts->splice(0, 1);
        $middlefooterpost = $footerposts->splice(0, 2);
        $lastfooterpost = $footerposts->splice(0, 1);
        // return $lastfooterpost;

        $recentPosts = Post::with('category')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home', compact(['posts', 'recentPosts', 'firstposts2', 'middleposts', 'lastposts', 'firstfooterpost', 'middlefooterpost', 'lastfooterpost']));
    }

    //Category
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category == true) {
            $posts = Post::where('category_id', $category->id)->paginate(9);
            return view('website.category', compact('category', 'posts'));
        } else {
            return redirect()->route('website');
        }
    }

    //Tag
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        // return $tag;

        if ($tag == true) {
            $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
            // return $posts;
            return view('website.tag', compact(['tag', 'posts']));
        } else {
            return redirect()->route('website');
        }
    }

    //About
    public function about()
    {
        $user = User::first();
        return view('website.about', compact('user'));
    }

    //post
    public function post($slug)
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        $categories = Category::all();
        $tags = Tag::all();

        //related Post
        $relatedpost = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();

        $firstrelatedpost = $relatedpost->splice(0, 1);
        $tworelatedpost = $relatedpost->splice(0, 2);
        $lastrelatedpost = $relatedpost->splice(0, 1);

        if ($post == true) {
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstrelatedpost', 'tworelatedpost', 'lastrelatedpost']));
        } else {
            return redirect('/');
        }
    }

    //contact
    public function contact()
    {
        return view('website.contact');
    }

    public function send_message(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:50',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        session()->flash('success', 'Message sent successfully!');
        return redirect()->back();
    }
}
