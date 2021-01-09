<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => request()->user()->currentTeam->posts()
                ->latest('created_at')
                ->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $post = auth()->user()->currentTeam->posts()->create(
            $this->postParams() + ['user_id' => auth()->id()]
        );

        return redirect()->route('posts.show', $post);
    }

    private function postParams(): array
    {
        return request()->validate([
            'title' => 'required|string|min:5|max:100',
            'content' => 'required|string',
        ]);
    }
}
