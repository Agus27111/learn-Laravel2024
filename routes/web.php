<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about', ['title' => 'Blog']);
});
Route::get('/blogs', [BlogController::class,'index'])->name('blog.index');
Route::get('/blogs/create', [BlogController::class,'create']);
Route::get('/blogs/{id}', [BlogController::class,'show']);
Route::post('/blogs', [BlogController::class,'store']);
Route::get('/blogs/{id}/edit', [BlogController::class,'edit']);
Route::put('/blogs/{id}', [BlogController::class,'update']);
Route::delete('/blogs/{id}', [BlogController::class,'destroy']);
