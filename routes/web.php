<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeWebController;
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


Route::get('/', [HomeWebController::class, 'index'])->name('frontends.layout');
// For static pages
Route::get('/board-of-directors', function () {
    return view('frontends.board-of-directors');
});
Route::get('/company-profile', function () {
    return view('frontends.company-profile');
});
Route::get('/group-of-companies', function () {
    return view('frontends.group-of-companies');
});
Route::get('/plant', function () {
    return view('frontends.plant');
});
Route::get('/products', function () {
    return view('frontends.products');
});
Route::get('/vision-mission', function () {
    return view('frontends.vision-mission');
});
// Route::get('/', function () {
//     return view('auth/login');
// });

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