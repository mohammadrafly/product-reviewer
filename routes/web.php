<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;

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
        Route::match(['GET', 'POST'], '/', 'index')->name('login');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->group(function () { 
        Route::controller(DashboardController::class)->group(function () {
            Route::match(['GET'], '/', 'index')->name('dashboard');
            Route::match(['GET'], '/logout', 'Logout')->name('logout');
        });
        Route::controller(ProductController::class)->group(function () {
            Route::match(['GET', 'POST'], '/product', 'index')->name('product');
            Route::match(['GET', 'POST'], '/product/update/{id}', 'update')->name('product.update');
            Route::match(['GET'], '/product/delete/{id}', 'delete')->name('product.delete');
        });
        Route::controller(ReviewController::class)->group(function () {
            Route::match(['GET', 'POST'], '/review', 'index')->name('review');
            Route::match(['GET', 'POST'], '/review/update/{id}', 'update')->name('review.update');
            Route::match(['GET'], '/review/delete/{id}', 'delete')->name('review.delete');
        });
    });
});