<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::resource('articles', ArticleController::class);

Route::resource('tags', TagController::class);

Route::resource('categories', CategoryController::class);
