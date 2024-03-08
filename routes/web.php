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
Route::get('/airlines', [AirController::class, 'airlines'])->name('airports');
Route::get('/airports', [AirController::class, 'airports'])->name('airports');

//POST
Route::post('/create_airport', [AirController::class, 'create_airport'])->name('create_airport');
Route::post('/create_airline', [AirController::class, 'create_airline'])->name('create_airline');

//DELETE
Route::delete('/delete_airport/{id}', [AirController::class, 'delete_airport'])->name('delete_airport');
Route::delete('/delete_airline/{id}', [AirController::class, 'delete_airline'])->name('delete_airline');

});
