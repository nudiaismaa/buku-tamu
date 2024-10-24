<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukutamuController;
use App\Http\Controllers\GuestController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/bukutamu', [BukutamuController::class, 'index'])->name('bukutamu.index');
Route::get('/bukutamu/edit/{id}', [BukutamuController::class, 'edit'])->name('bukutamu.edit');
Route::put('/bukutamu/update/{id}', [BukutamuController::class, 'update'])->name('bukutamu.update');
Route::delete('/bukutamu/destroy/{id}', [BukutamuController::class, 'destroy'])->name('bukutamu.destroy');
Route::get('/bukutamu/export', [BukutamuController::class, 'export'])->name('bukutamu.export');


Route::get('/about', function () {
    return view('about');
})->name('about');

// Guest Routes
Route::get('/guest/create', [GuestController::class, 'create'])->name('guest.create');
Route::post('/guest/store', [GuestController::class, 'store'])->name('guest.store');
