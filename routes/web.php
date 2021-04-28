<?php

use App\Http\Controllers\ExcelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sheets', [ExcelController::class, 'index'])->name('sheets.index');
Route::get('/sheets/create', [ExcelController::class, 'create'])->name('sheets.create');
Route::get('/sheets/{sheet}', [ExcelController::class, 'show'])->name('sheets.view');

Route::post('/sheets', [ExcelController::class, 'store'])->name('sheets.store');
