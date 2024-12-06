<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog']);
});
Route::get('/about', function () {
    return view('about', ['title' => 'Blog']);
});
