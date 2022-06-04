<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
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

Route::get('/login', [AuthController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/', [WebController::class, 'profile'])->name('profile');
        Route::get('/edit', [UserController::class, 'editProfile'])->name('editProfile');
        Route::post('/edit', [UserController::class, 'updateProfile'])->name('updateProfile');
    });

    Route::get('book/{service_id}', [ServiceController::class, 'book'])->name('book');

    Route::middleware('admin-access')->prefix('/admin')->name('admin')->group(function () {

        Route::prefix('services')->name('.services')->group(function () {
            Route::get('/', [AdminController::class, 'indexServices'])->name('.index');
            Route::get('/create', [ServiceController::class, 'create'])->name('.create');
            Route::post('/', [ServiceController::class, 'store'])->name('.store');
            Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('.edit');
            Route::post('/{service}/edit', [ServiceController::class, 'update'])->name('.update');
            Route::delete('/{service}/delete', [ServiceController::class, 'destroy'])->name('.delete');
        });
        Route::get('/works', [AdminController::class, 'indexWorks'])->name('.works');
        Route::get('/bookings', [AdminController::class, 'indexBookings'])->name('.bookings');
    });
});

Route::post('/feedback', [BackController::class, 'feedback'])->name('feedback');
Route::post('/callback', [BackController::class, 'callback'])->name('callback');
