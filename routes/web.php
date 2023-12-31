<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
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


Route::controller(UserController::class)->group(function () {
  Route::middleware('guest')->group(function () {
    Route::get('/register', 'create')->name('auth.create');
    Route::post('/register', 'store')->name('auth.store');
    Route::get('/login', 'show')->name('auth.show');
    Route::post('/login', 'login')->name('auth.login');
  });
  Route::get('/logout', 'destroy')->name('auth.destroy')->middleware('auth');
});

Route::controller(ListingController::class)->group(function () {
  Route::get('/', 'index')->name('listing.index');
  Route::get('/listing/{listing}', 'show')->name('listing.show');
  Route::middleware('auth')->group(function () {
    Route::get('/listing/add', 'create')->name('listing.create');
    Route::post('/listing/store', 'store')->name('listing.store');
    Route::get('/listing/edit/{listing}', 'edit')->name('listing.edit');
    Route::put('/listing/update/{listing}', 'update')->name('listing.update');
    Route::delete('/listing/destroy/{listing}', 'destroy')->name('listing.destroy');
  });
});