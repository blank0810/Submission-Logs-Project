<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataController;

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
    return view('pages/landing');
}); 

Route::get('/get-submission-logs', [dataController::class, 'getLogs'])->name('get-submission-logs');
Route::get('/get-log-info', [dataController::class, 'getInfo'])->name('get-log-info');

Route::post('/input', [dataController::class, 'saveInput'])->name('input');
Route::post('/update-log/{inputId}', [dataController::class, 'updateLog'])->name('update-log');
Route::delete('/delete-log/{inputId}', [dataController::class, 'deleteLog'])->name('delete-log');