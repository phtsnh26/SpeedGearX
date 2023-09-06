<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/admin'], function () {
    Route::get('/login', [AdminController::class, 'indexSignin'])->name('indexSignin');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [AdminController::class, 'indexProfile'])->name('indexProfile');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [AdminController::class, 'indexDashboard'])->name('indexDashboard');
    });

    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [AdminController::class, 'indexBrand'])->name('indexBrand');
    });

    Route::group(['prefix' => 'vehicles'], function () {
        Route::get('/', [AdminController::class, 'indexVehicle'])->name('indexVehicle');
    });

    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', [AdminController::class, 'indexBooking'])->name('indexBooking');
    });

    Route::group(['prefix' => 'testimonials'], function () {
        Route::get('/', [AdminController::class, 'indexTestimonial'])->name('indexTestimonial');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/', [AdminController::class, 'indexReports'])->name('indexReports');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [AdminController::class, 'indexUser'])->name('indexUser');
    });
});

Route::get('/', [CustomerController::class, 'index'])->name('indexHome');
Route::get('/contact', [CustomerController::class, 'indexContact'])->name('indexContact');
Route::get('/detail', [CustomerController::class, 'indexDetail'])->name('indexDetail');
Route::group(['prefix' => 'home'], function () {
});
