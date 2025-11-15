<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Protect all routes in this controller
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts')->with('success', 'Post created successfully.');
    }

    public function posts()
    {
        // Retrieve all posts from the database
        $posts = Post::all(); // or use Post::latest()->get() to get newest first

        // Pass posts to the Blade view
        return view('dashboard.posts', compact('posts'));
    }

    public function edit(Post $post)
    {
        return view('dashboard.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts')->with('success', 'Post deleted successfully.');
    }
}
