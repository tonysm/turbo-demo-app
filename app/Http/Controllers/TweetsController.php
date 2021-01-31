<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->tweets()->latest()->paginate(),
            'newTweet' => new Tweet(),
        ]);
    }

    public function show(Tweet $tweet)
    {
        return view('tweets.show', [
            'tweet' => $tweet,
        ]);
    }

    public function create()
    {
        return view('tweets.create', [
            'tweet' => new Tweet(),
            'frame' => request()->input('frame', '') === 'modal' ? '_modal' : '',
        ]);
    }

    public function store()
    {
        $tweet = auth()->user()->tweets()->create(request()->validate([
            'content' => 'required|min:1|max:280',
        ]));

        if (request()->wantsTurboStream()) {
            return response()->turboStream($tweet, 'prepend');
        }

        return redirect()->route('tweets.index');
    }

    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', [
            'tweet' => $tweet,
            'frame' => request()->input('frame', '') === 'modal' ? '_modal' : '',
        ]);
    }

    public function update(Tweet $tweet)
    {
        $tweet->update(request()->validate([
            'content' => 'required|min:1|max:280',
        ]));

        return redirect()->route('tweets.index');
    }
}
