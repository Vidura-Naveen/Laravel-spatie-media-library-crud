<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewPostController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');



  

Route::get('posts',[PostController::class,'index'])->name('posts.index');
Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('posts/store',[PostController::class,'store'])->name('posts.store');


Route::get('newposts', [NewPostController::class,'index']);
Route::get('newposts/create', [NewPostController::class,'create'])->name('newposts.create');
Route::post('newposts/store',[NewPostController::class,'store'])->name('newposts.store');
Route::get('newposts/edit', [NewPostController::class,'edit'])->name('newposts.edit');
Route::put('newposts/{newpost}', [NewPostController::class, 'update'])->name('newposts.update');
Route::get('newposts/destroy', [NewPostController::class,'destroy'])->name('newposts.destroy');

Route::get('/newposts/downloads/{id}', [NewPostController::class, 'download']);
Route::get('/newposts/downloads', [NewPostController::class, 'downloads']);
Route::resource('/newposts/newposts', NewPostController::class);
Route::get('/newposts/res-image/{id}', [NewPostController::class, 'resImage'])->name('show.img');