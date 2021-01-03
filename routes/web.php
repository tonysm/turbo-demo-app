<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::resource('posts', Controllers\PostsController::class)->only(['index', 'show']);
    Route::resource('posts.comments', Controllers\PostCommentsController::class)->only(['create', 'store']);
    Route::resource('comments', Controllers\CommentsController::class)->only(['edit', 'update', 'destroy']);
});
