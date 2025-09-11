<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [ProfileController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/logout', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/admin/products', ProductController::class)->names('products');
    Route::resource('/admin/category', CategoryController::class)->names('category');
    Route::resource('/admin/blogs', BlogController::class)->names('blogs');
    Route::resource('/admin/gallery', GalleryController::class)->names('gallery');
    Route::resource('/admin/events', EventController::class)->names('events');
    Route::resource('/admin/banner', BannerController::class)->names('banner');
    Route::resource('/admin/testimonial', TestimonialController::class)->names('testimonial');
});

    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/about', [HomeController::class,'about'])->name('about');
    Route::get('/contact', [HomeController::class,'contact'])->name('contact');

require __DIR__.'/auth.php';
