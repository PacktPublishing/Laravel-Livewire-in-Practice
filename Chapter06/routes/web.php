<?php

use App\Livewire\CounterDemo;
use App\Livewire\EntangleDemo;
use App\Livewire\LiveAlpine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/live-alpine', LiveAlpine::class);
Route::get('/counter-demo', CounterDemo::class);
Route::get('/entagle-demo', EntangleDemo::class);
