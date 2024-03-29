<?php

namespace App\Http\Controllers;

use App\Models\User;

class MentionsController extends Controller
{
    public function index()
    {
        return auth()->user()->currentTeam->allUsers()
            ->when(request('search'), fn ($users, $search) => $users->filter(fn (User $user) => str_starts_with(strtolower($user->name), strtolower($search))))
            ->sortBy('name')
            ->take(10)
            ->map(fn (User $user) => [
                'sgid' => $user->richTextSgid(),
                'name' => $user->name,
                'content' => $user->richTextRender(),
            ])
            ->values();
    }
}
