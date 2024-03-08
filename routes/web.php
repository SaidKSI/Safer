<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AirController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboredController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return redirect('/admin/login');
});

//Login
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'show_login'])->name('login');
    Route::post('admin_login', [AdminController::class, 'login'])->name('admin_login');
});


//GET

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/banks', [BankController::class, 'index'])->name('banks');
    Route::get('/users', [DashboredController::class, 'users'])->name('users');
    Route::get('/flights', [FlightController::class, 'index'])->name('flights');
    Route::get('/airlines', [AirController::class, 'airlines'])->name('airlines');
    Route::get('/airports', [AirController::class, 'airports'])->name('airports');
    Route::get('/history', [HistoryController::class, 'index'])->name('history');
    // Transaction
    Route::get('/transactions/{status}', [TransactionController::class, 'index'])->name('transactions');

    //POST
    Route::post('/create_airport', [AirController::class, 'create_airport'])->name('create_airport');
    Route::post('/create_airline', [AirController::class, 'create_airline'])->name('create_airline');
    Route::post('/create_flight', [FlightController::class, 'store'])->name('create_flight');

    //DELETE
    Route::delete('/delete_airport/{id}', [AirController::class, 'delete_airport'])->name('delete_airport');
    Route::delete('/delete_airline/{id}', [AirController::class, 'delete_airline'])->name('delete_airline');
    Route::delete('/delete_flight/{id}', [FlightController::class, 'destroy'])->name('delete_flight');

    Route::patch('/transactions/update/{id}/{status}', [TransactionController::class, 'updateStatus'])->name('transactions.updateStatus');

    //UPDATE
});
