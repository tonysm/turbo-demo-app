<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/posts')->name('dashboard');

    Route::resource('posts', Controllers\PostsController::class);
    Route::resource('posts.comments', Controllers\PostCommentsController::class);
});
