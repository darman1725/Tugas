<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepositoryController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/download-dokumen/{id}', [RepositoryController::class, 'download'])->name('repository.download');
    Route::resource('profile', ProfileController::class);
    Route::resource('repository', RepositoryController::class);
});