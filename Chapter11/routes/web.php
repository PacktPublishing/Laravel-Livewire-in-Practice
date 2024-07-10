<?php

use App\Livewire\Admin;
use App\Livewire\CarDetails;
use App\Livewire\Cars;
use App\Livewire\Dashboard\CarListing;
use App\Livewire\Dashboard\LocationListing;
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

    Route::get('/cars', CarListing::class)->name('cars.index');

    Route::get('/locations', LocationListing::class)->name('locations.index');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'cars', 'as' => 'cars.', 'middleware' => []], function () {
    Route::get('/', Cars::class)->name('index');
    Route::get('/{id}', CarDetails::class)->name('car.details');
});
