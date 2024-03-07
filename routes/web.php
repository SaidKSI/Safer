<?php

use App\Http\Controllers\AirController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboredController;
use App\Http\Controllers\FlightController;
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
    return view('welcome');
});

Route::prefix('admin')->group(function () {
Route::get('/banks', [BankController::class, 'index'])->name('banks');
Route::get('/users', [DashboredController::class, 'users'])->name('users');
Route::get('/flights', [FlightController::class, 'index'])->name('flights');
Route::get('/airports', [AirController::class, 'airports'])->name('airports');
Route::get('/airlines', [AirController::class, 'airlines'])->name('airlines');
});
