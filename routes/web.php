<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\LandingPageController;
use App\Http\Controllers\Dashboard\UserController; 
use App\Http\Controllers\Dashboard\DashboardController; 

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

// Route::view('/', 'landing-page.welcome');
Route::get('/', [LandingPageController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('welcome')->namespace('Home')->group(function () {
        // Route::get('/', 'LandingPageController@index');
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('verified')->name('dashboard');
    Route::get('users', [UserController::class, 'userIndex'])->name('user');

    Route::view('profile', 'dashboard.profile')->name('profile');
});



require __DIR__.'/auth.php';
