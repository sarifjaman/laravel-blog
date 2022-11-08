<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $countpost = Post::all()->count();
        $countcategory = Category::all()->count();
        $countuser = User::all()->count();
        $counttag = Tag::all()->count();
        return view('admin.dashboard.index', compact(['posts', 'countpost', 'countcategory', 'countuser', 'counttag']));
    }
}
