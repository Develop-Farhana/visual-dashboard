<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

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

Route::get('/graph', function () {
    return view('admin.graph'); // Renders the 'admin.graph' view
})->name('graph');

Route::get('/bar', function () {
    return view('admin.bar');
});

Route::get('/map', function () {
    return view('admin.map');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('table');
// Route::get('/chart-data', [ChartController::class, 'chartData']);
Route::get('/chart-data', [ChartController::class, 'getChartData']);
