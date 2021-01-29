<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('posts', Controllers\PostsController::class);
    Route::get('posts/{post}/delete', [Controllers\PostsController::class, 'delete'])->name('posts.delete');
    Route::resource('posts.comments', Controllers\PostCommentsController::class)->only(['index', 'create', 'store']);
    Route::resource('comments', Controllers\CommentsController::class)->only(['show', 'edit', 'update', 'destroy']);
    Route::get('comments/{comment}/delete', [Controllers\CommentsController::class, 'delete'])->name('comments.delete');

    Route::prefix('merch')->group(function () {
        Route::get('/', [Controllers\ShopController::class, 'index'])->name('shop.index');
        Route::resource('carts', Controllers\CartsController::class)->only(['index']);
        Route::resource('cart-items', Controllers\CartItemsController::class)->only(['store', 'update', 'destroy']);
        Route::resource('checkout', Controllers\CheckoutsController::class)->only(['index', 'store']);
        Route::resource('orders', Controllers\OrdersController::class)->only(['index', 'show']);
    });

    Route::get('livewire-integration', function () {
        return view('livewire-integration');
    })->name('livewire.integration');

    Route::get('notifications', function () {
        return view('notifications.index', [
            'notifications' => auth()->user()
                ->notifications()
                ->paginate(),
            'frame' => request()->input('notifications-frame', '') == "box" ? 'notifications-box' : 'notifications',
        ]);
    })->name('notifications.index');
});
