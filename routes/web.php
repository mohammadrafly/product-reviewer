<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::middleware(['guest'])->group(function () { 
    Route::controller(AuthController::class)->group(function () {
        Route::match(['GET', 'POST'], '/login', 'index')->name('login');
    });
    Route::controller(LandingController::class)->group(function () {
        Route::match(['GET'], '/', 'index')->name('landing.page');
        Route::match(['GET'], '/product/{id}', 'singleProduct')->name('single.product');
        Route::match(['POST'], '/product/review/{id}', 'review')->name('review.product');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () { 
        Route::controller(ProfileController::class)->group(function () {
            Route::match(['GET', 'POST'], '/profile', 'index')->name('profile');
            Route::match(['GET', 'POST'], '/profile/change/password', 'changePassword')->name('password.change');
        });
        Route::controller(DashboardController::class)->group(function () {
            Route::match(['GET'], '/', 'index')->name('dashboard');
            Route::match(['GET'], '/logout', 'Logout')->name('logout');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::match(['GET', 'POST'], '/product', 'index')->name('product');
            Route::match(['GET', 'POST'], '/product/update/{id}', 'update')->name('product.update');
            Route::match(['GET'], '/product/delete/{id}', 'delete')->name('product.delete');
        });
        Route::controller(UserController::class)->group(function () {
            Route::match(['GET', 'POST'], '/user', 'index')->name('user');
            Route::match(['GET', 'POST'], '/user/update/{id}', 'update')->name('user.update');
            Route::match(['GET'], '/user/delete/{id}', 'delete')->name('user.delete');
        });
        Route::controller(ReviewController::class)->group(function () {
            Route::match(['GET', 'POST'], '/review', 'index')->name('review');
            Route::match(['GET', 'POST'], '/review/update/{id}', 'update')->name('review.update');
            Route::match(['GET'], '/review/delete/{id}', 'delete')->name('review.delete');
        });
        Route::controller(ReviewController::class)->group(function () {
            Route::match(['GET', 'POST'], '/review', 'index')->name('review');
            Route::match(['GET', 'POST'], '/review/update/{id}', 'update')->name('review.update');
            Route::match(['GET'], '/review/delete/{id}', 'delete')->name('review.delete');
        });
    });
});