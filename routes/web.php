<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubscriberController;

// THEME ROUTES
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{id?}', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
});

//BLOG ROUTES
Route::get('/my-blogs', [BlogController::class, 'myBlogs'])->name('blogs.my-blogs');
Route::resource('blogs', BlogController::class)->except('index');

// COMMENT STORE ROUTE
Route::post('/comment', [CommentController::class, 'store'])->name('comments.store');

// SUBSCRIBER STORE ROUTE
Route::post('/subscribe/register', [SubscriberController::class, 'store'])->name('subscriber.store');

// CONTACT STORE ROUTE
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

require __DIR__ . '/auth.php';

