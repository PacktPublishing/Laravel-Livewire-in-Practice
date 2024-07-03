<?php

use App\Livewire\Admin;
use App\Livewire\Dashboard\CarListing;
use App\Livewire\Dashboard\CategoryComponent;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', Welcome::class);

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/', Admin::class)->name('index');
    Route::group(['prefix' => 'cars', 'as' => 'cars.'], function () {
        Route::get('/', CarListing::class)->name('index');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
