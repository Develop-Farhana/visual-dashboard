<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Models\DataEntry;
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
Route::get('/map', function () {
    return view('admin.map');
});

Route::get('/get-relevance-data', [ChartController::class, 'getRelevanceData']);

// Route to display the dashboard initially
Route::get('/', [DashboardController::class, 'demo'])->name('dashboard.demo');

// Route to handle form submission and filtering (POST method)
Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Route::get('/chart-data', [ChartController::class, 'chartData']);
Route::get('/chart-data', [ChartController::class, 'getChartData']);

Route::get('/map-data', [ChartController::class, 'getMapData']);

Route::get('/total-counts', [ChartController::class, 'getTotalCounts']);
