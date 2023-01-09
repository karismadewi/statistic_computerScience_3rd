<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Exports\DataExport;
use App\Imports\DataImport;

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
    return to_route('data.index');
});

Route::resource('data',DataController::class);
Route::get('/data_export' ,[DataController::class, 'data_export'])->name('data_export');
Route::post('/data_import_excel' ,[DataController::class, 'data_import_excel'])->name('data_import_excel');
route ::get('/agregate', [DataController::class, 'agregate'])->name('agregate');