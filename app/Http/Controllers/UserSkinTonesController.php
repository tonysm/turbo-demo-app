<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;

class UserSkinTonesController extends Controller
{
    public function create()
    {
        return view('user_skin_tones.create');
    }

    public function store()
    {
        request()->validate([
            'skin_tone' => ['required', Rule::in(config('turbo-demo.users.skin-tones'))],
        ]);

        auth()->user()->update([
            'preferred_skin_tone' => request('skin_tone'),
        ]);

        return response()->noContent();
    }
}
