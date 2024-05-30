<?php

use App\Http\Livewire\MultipleImageUpload;
use App\Http\Livewire\ResumeUpload;
use App\Http\Livewire\ShowGallery;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/upload-resume', ResumeUpload::class);
Route::get('/upload-multiple', MultipleImageUpload::class);
Route::get('/gallery', ShowGallery::class);
