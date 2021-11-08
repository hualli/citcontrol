<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\TransitController;
use App\Http\Controllers\InspectionController;

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

Route::get('/', function () {
    return view('welcome');
})->name('principal');

Route::get('movements', [MovementController::class, 'index'])->name('movements.index');

Route::get('transit', [TransitController::class, 'index'])->name('transit.index');

Route::get('inspection', [InspectionController::class, 'index'])->name('inspection.index');
