<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth/login');
});

Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Documents
Route::prefix('documents')->controller(DocumentController::class)->group(function () {
    Route::get('/{page}/list', 'index')->name('documents.list');
    Route::get('/{page}/add', 'create')->name('documents.add');
    Route::post('/{page}/store', 'store')->name('documents.store');
    Route::get('/{page}/edit/{id}', 'edit')->name('documents.view');
    Route::put('/{page}/view/{id}', 'update')->name('documents.view');
    Route::get('/{page}/delete/{id}', 'destroy')->name('documents.destroy');
});

// Financial
// Route::prefix('financials')->controller(FinancialController::class)->group(function () {
//     Route::get('/list', 'index')->name('financials.list');
//     Route::get('/addYear', 'addYear')->name('financials.addYear');
//     Route::post('/storeYear', 'storeYear')->name('financials.store');
//     Route::get('/edit/{id}', 'editYear')->name('financials.editYear');
//     Route::put('/update/{id}', 'updateYear')->name('financials.updateYear');
//     Route::get('/delete/{id}', 'destroy')->name('financials.destroy');
//     // for financial quarter
//     Route::get('/{year}/{quarter}/addQuarter', 'addQuarter')->name('financials.addQuarter');
//     Route::post('/{year}/{quarter}/storeQuarter', 'storeQuarter')->name('financials.storeQuarter');
//     Route::get('/{year}/{quarter}/{id}/editQuarter', 'editQuarter')->name('financials.editQuarter');
//     Route::put('/{year}/{quarter}/{id}/updateQuarter', 'updateQuarter')->name('financials.updateQuarter');
//     Route::get('/{year}/{quarter}/{id}/destroyQuarter', 'destroyQuarter')->name('financials.destroyQuarter');
// });

// Reports
Route::prefix('reports')->controller(ReportController::class)->group(function () {
    Route::get('/{page}/list', 'index')->name('reports.list');
    Route::get('/{page}/addYear', 'addYear')->name('reports.addYear');
    Route::post('/{page}/storeYear', 'storeYear')->name('reports.storeYear');
    Route::get('/{page}/editYear/{id}', 'editYear')->name('reports.editYear');
    Route::put('/{page}/updateYear/{id}', 'updateYear')->name('reports.updateYear');
    Route::get('/{page}/deleteYear/{id}', 'destroy')->name('reports.destroy');

    // for financial quarter
    Route::get('/{page}/{year}/{quarter}/addQuarter', 'addQuarter')->name('reports.addQuarter');
    Route::post('/{page}/{year}/{quarter}/storeQuarter', 'storeQuarter')->name('reports.storeQuarter');
    Route::get('/{page}/{year}/{quarter}/{id}/editQuarter', 'editQuarter')->name('reports.editQuarter');
    Route::put('/{page}/{year}/{quarter}/{id}/updateQuarter', 'updateQuarter')->name('reports.updateQuarter');
    Route::get('/{page}/{year}/{quarter}/{id}/destroyQuarter', 'destroyQuarter')->name('reports.destroyQuarter');}
);