<?php

use App\Livewire\CreateComment;
use App\Livewire\ShowPosts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search-posts', ShowPosts::class)->name('search-posts');
Route::get('create-comment', CreateComment::class);
