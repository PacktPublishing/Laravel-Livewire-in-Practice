<?php

use App\Livewire\ShowGallery;
use App\Livewire\MultipleImageUpload;
use App\Livewire\ResumeUpload;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload-resume', ResumeUpload::class);
Route::get('/upload-multiple', MultipleImageUpload::class);
Route::get('/gallery', ShowGallery::class);
