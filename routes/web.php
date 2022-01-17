<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/layout', function () {
    return view('layout.layout');
});

Route::get('/nav', function () {
    return view('layout.nav');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profileInfo/{nim}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profileinfo');
Route::post('/profileInfo/tambahHobi', [App\Http\Controllers\HobiController::class, 'create'])->name('profileinfo.tambahHobi');
Route::post('/profileInfo/updateAlamat', [App\Http\Controllers\detailAlamatController::class, 'update'])->name('profileinfo.updateAlamat');
Route::post('/profileInfo/updateContact', [App\Http\Controllers\ContactController::class, 'update'])->name('profileinfo.updateContact');
Route::post('/profileInfo/match', [App\Http\Controllers\MatchController::class, 'create'])->name('profileinfo.match');
Auth::routes();

