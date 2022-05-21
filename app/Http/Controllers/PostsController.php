<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;

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
        return view('posts.create', [
            'newPost' => new Post(),
        ]);
    }

    public function store()
    {
        $post = auth()->user()->currentTeam->posts()->create(
            $this->postParams() + ['user_id' => auth()->id()]
        );

        $post->syncAttachmentsMeta();

        return redirect()->route('posts.show', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);

        tap($post)->update($this->postParams())->syncAttachmentsMeta();

        if (Request::wantsTurboStream() && ! Request::wasFromTurboNative()) {
            return Response::turboStream($post);
        }

        return redirect()->route('posts.show', $post);
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        return view('posts.delete', [
            'post' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->comments()->delete();
        $post->delete();

        return redirect()->route('posts.index');
    }

    private function postParams(): array
    {
        return request()->validate([
            'title' => 'required|string|min:5|max:100',
            'content' => 'required|string',
        ]);
    }
}
