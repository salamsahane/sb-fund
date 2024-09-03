<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::controller(LoginController::class)->group(function() {
  Route::post('login', 'store')->name('auth.login');
  Route::post('logout', [LoginController::class, 'destroy'])->name('auth.logout');
});

Route::post('register', [RegisterController::class, 'store'])->name('auth.register');

Route::controller(CampaignController::class)->group(function() {
  Route::get('/', 'index')->name('home');
  Route::middleware('auth')->get('campaign', 'create')->name('campaign.create');
  Route::post('campaign', 'store')->name('campaign.store');
  Route::get('campaign/{campaign}', 'show')->name('campaign.show');
});

Route::post('campaign/{campaign}', [DonationController::class, 'store'])->name('donation.store');