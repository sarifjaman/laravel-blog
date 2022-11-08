<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->paginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,$user->id',
            'password' => 'sometimes|nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->description = $request->description;
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        if ($user == true) {
            $user->delete();
        }
        return redirect()->back()->with('success', 'User deleted successfully!');
    }

    //User Profile
    public function profile()
    {
        $user = auth()->user();
        return view('admin.user.profile', compact('user'));
    }

    //User Profile Update
    public function profile_update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,$user->id',
            'password' => 'sometimes|nullable|min:8',
            'image' => 'sometimes|nullable|image|max:2000',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if ($request->has('password') && $request->password != null) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time() . "." . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $user->image = '/storage/post/' . $image_new_name;
        }

        $user->save();


        // dd($user->save());

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
