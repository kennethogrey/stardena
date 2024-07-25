<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Home\LandingPageController;

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
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::post('post-message', [LandingPageController::class, 'contactUs'])->name('contact-us');
// Route::get('/login', [LandingPageController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('welcome')->namespace('Home')->group(function () {
        // Route::get('/', 'LandingPageController@index');
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('verified')->name('dashboard');
    Route::get('users', [UserController::class, 'userIndex'])->name('user');
    Route::get('user-status/{id}', [UserController::class, 'userStatus'])->name('user-status');
    Route::post('user-photo', [UserController::class, 'userPhoto'])->name('user-photo');
    Route::post('user-role', [UserController::class, 'updateUserRole'])->name('user-role');   
    Route::get('messages', [LandingPageController::class, 'visitorsMessage'])->name('message');
    Route::get('delete-visitor/{id}', [DashboardController::class, 'deleteVisitor'])->name('destroy-visitor');
    Route::get('partners', [DashboardController::class, 'partners'])->name('partner');

    Route::post('user-resume', [UserController::class, 'updateResume'])->name('update-resume');

    Route::view('profile', 'dashboard.profile')->name('profile');
    Route::view('profile/user', 'users.profile')->name('user.profile');
});

require __DIR__.'/auth.php';
