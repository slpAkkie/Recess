<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\WorkObjectController;
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

Route::get('/', [WebController::class, 'welcome'])->name('welcome');
Route::get('/portfolio', [WebController::class, 'portfolio'])->name('portfolio');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/contacts', [WebController::class, 'contacts'])->name('contacts');

Route::prefix('services')->name('services')->group(function () {
    Route::get('/{service}', [ServiceController::class, 'show'])->name('.show');
});

Route::get('/booking', [WebController::class, 'booking'])->name('bookingCalculator');

Route::get('stuff/{stuff}', [StuffController::class, 'show'])->name('stuff.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('/profile')->name('profile')->group(function () {
        Route::get('/', [WebController::class, 'profile'])->name('.index');
        Route::get('/edit', [UserController::class, 'editProfile'])->name('.editProfile');
        Route::post('/edit', [UserController::class, 'updateProfile'])->name('.updateProfile');
        Route::get('/bookings', [UserController::class, 'bookings'])->name('.bookings');
        Route::delete('/bookings/{booking}', [BookingController::class, 'cancel'])->name('.cancelBooking');
    });

    Route::post('/booking', [BookingController::class, 'store'])->name('booking');

    Route::middleware('admin-access')->prefix('/admin')->name('admin')->group(function () {

        Route::prefix('/services')->name('.services')->group(function () {
            Route::get('/', [AdminController::class, 'indexServices'])->name('.index');
            Route::get('/create', [ServiceController::class, 'create'])->name('.create');
            Route::post('/', [ServiceController::class, 'store'])->name('.store');
            Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('.edit');
            Route::post('/{service}/edit', [ServiceController::class, 'update'])->name('.update');
            Route::delete('/{service}/delete', [ServiceController::class, 'destroy'])->name('.delete');
        });
        Route::prefix('/works')->name('.works')->group(function () {
            Route::get('/', [AdminController::class, 'indexWorks'])->name('.index');
            Route::get('/create', [WorkController::class, 'create'])->name('.create');
            Route::post('/', [WorkController::class, 'store'])->name('.store');
            Route::get('/{work}', [WorkController::class, 'show'])->name('.show');
            Route::get('/{work}/edit', [WorkController::class, 'edit'])->name('.edit');
            Route::post('/{work}/edit', [WorkController::class, 'update'])->name('.update');
            Route::delete('/{work}/delete', [WorkController::class, 'destroy'])->name('.delete');

            Route::prefix('/{work}/objects')->name('.objects')->group(function () {
                Route::post('/', [WorkObjectController::class, 'uploadHandler'])->name('.upload');
                Route::delete('/{work_object}', [WorkObjectController::class, 'destroy'])->name('.delete');
            });
        });

        Route::prefix('/stuff')->name('.stuff')->group(function () {
            Route::get('/', [AdminController::class, 'indexStuff'])->name('.index');
            Route::get('/create', [StuffController::class, 'create'])->name('.create');
            Route::post('/', [StuffController::class, 'store'])->name('.store');
            Route::get('/{stuff}/edit', [StuffController::class, 'edit'])->name('.edit');
            Route::post('/{stuff}', [StuffController::class, 'update'])->name('.update');
            Route::delete('/{stuff}', [StuffController::class, 'destroy'])->name('.delete');
            Route::delete('/{stuff}/avatar', [StuffController::class, 'destroyAvatar'])->name('.delete-avatar');
        });

        Route::prefix('/bookings')->name('.bookings')->group(function () {
            Route::get('/', [AdminController::class, 'indexBookings'])->name('.index');
            Route::get('/{booking}/edit', [BookingController::class, 'edit'])->name('.edit');
            Route::post('/{booking}/resolve', [BookingController::class, 'resolve'])->name('.resolve');
            Route::post('/{booking}/reject', [BookingController::class, 'reject'])->name('.reject');
            Route::post('/{booking}/close', [BookingController::class, 'close'])->name('.close');
            Route::post('/{booking}', [BookingController::class, 'update'])->name('.update');
        });
    });
});

Route::post('/feedback', [BackController::class, 'feedback'])->name('feedback');
Route::post('/callback', [BackController::class, 'callback'])->name('callback');
