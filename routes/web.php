<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/logout', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/products', ProductController::class)->names('products');
    Route::resource('/category', CategoryController::class)->names('category');
    Route::resource('/blogs', BlogController::class)->names('blogs');
    Route::resource('/gallery', GalleryController::class)->names('gallery');
    Route::resource('/events', EventController::class)->names('events');
    Route::resource('/testimonial', TestimonialController::class)->names('testimonial');
});


require __DIR__.'/auth.php';
