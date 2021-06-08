<?php

use App\Http\Controllers\FAQController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\TipeDokumenController;
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

Route::get('/', [LandingPageController::class, 'index'])->name('lp.home');
Route::get('/data-repository', [LandingPageController::class, 'repository'])->name('lp.repo');
Route::get('/data-repository/search', [LandingPageController::class, 'search'])->name('repo.search');
Route::get('/repo/{id}', [LandingPageController::class, 'detailRepository'])->name('lp.detailrepo');
Route::get('/about-us', [LandingPageController::class, 'about'])->name('lp.about');
Route::get('/contact-us', [LandingPageController::class, 'contact'])->name('lp.contact');
Route::get('/faqs', [LandingPageController::class, 'faq'])->name('lp.faq');
Route::get('/policy', [LandingPageController::class, 'policy'])->name('lp.policy');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/download-dokumen/{id}', [RepositoryController::class, 'download'])->name('repository.download');
    Route::resource('tipe', TipeDokumenController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('repository', RepositoryController::class);
    Route::middleware(['admin'])->group(function () {
        Route::resource('faq', FAQController::class);
    });
});