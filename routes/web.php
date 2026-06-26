<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events/{event}', [EventController::class, 'show'])
    ->name('events.show');

// Checkout Routes
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])
    ->name('checkout.create');

Route::post('/checkout/{event}', [CheckoutController::class, 'store'])
    ->name('checkout.store');
Route::get('/payment/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

// Route checkout lama (tetap dipertahankan)
Route::get('/checkout', [EventController::class, 'checkout'])
    ->name('checkout');

Route::get('/my-ticket', [TicketController::class, 'show'])
    ->name('ticket');

// Admin Authentication
Route::get('/admin', [AuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('admin.login.submit');

Route::get('/admin/register', [AuthController::class, 'showRegisterForm'])
    ->name('admin.register');

Route::post('/admin/register', [AuthController::class, 'register'])
    ->name('admin.register.submit');

Route::post('/admin/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

// User Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('transactions.index');

    Route::resource('events', AdminEventController::class);

    Route::resource('categories', CategoryController::class)
        ->except(['show', 'create', 'edit']);

    Route::resource('partners', PartnerController::class)
        ->except(['show', 'create', 'edit']);
});
