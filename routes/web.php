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

Route::get('/', [HomeWebController::class, 'index'])->name('frontends.index');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

// company-profile page
Route::get('/company-profile', function () {
    return view('frontends.company-profile');
});

// board-of-directors (dynamic page)
Route::get('/board-of-directors', [HomeWebController::class, 'team'])->name('frontends.board-of-directors');

// group-of-companies page
Route::get('/group-of-companies', function () {
    return view('frontends.group-of-companies');
});

// group-of-companies page
Route::get('/plant', function () {
    return view('frontends.plant');
});

// products page
Route::get('/products', function () {
    return view('frontends.products');
});

// vision-mission page
Route::get('/vision-mission', function () {
    return view('frontends.vision-mission');
});

// contact page
Route::get('/contact', function () {
    return view('frontends.contact');
});

// investor-contact page
Route::get('/investor-contact', function () {
    return view('frontends.investor-contact');
});

// csr page
Route::get('/csr', function () {
    return view('frontends.csr');
});

// management-committee page
Route::get('/management-committee', function () {
    return view('frontends.management-committee');
});

// corporate-governance page
Route::get('/corporate-governance', function () {
    return view('frontends.corporate-governance');
});

// *********invester desk start*********
// *********documents start*********
// annual-return
Route::get('/annual-return', [HomeWebController::class, 'document'])->name('frontends.annual-return');

// annual-return
Route::get('/notices', [HomeWebController::class, 'document'])->name('frontends.notices');

// outcomes
Route::get('/outcomes', [HomeWebController::class, 'document'])->name('frontends.outcomes');

// general-meetings
Route::get('/general-meetings', [HomeWebController::class, 'document'])->name('frontends.general-meetings');

// voting-results
Route::get('/voting-results', [HomeWebController::class, 'document'])->name('frontends.voting-results');

// policy
Route::get('/policy', [HomeWebController::class, 'document'])->name('frontends.policy');

// prospectus
Route::get('/prospectus', [HomeWebController::class, 'document'])->name('frontends.prospectus');

// listing-compliances
Route::get('/listing-compliances', [HomeWebController::class, 'document'])->name('frontends.listing-compliances');

// *********documents end*********

// *********reports start*********
// financial
Route::get('/financial', [HomeWebController::class, 'report'])->name('frontends.financial');

// shareholding-pattern
Route::get('/shareholding-pattern', [HomeWebController::class, 'report'])->name('frontends.shareholding-pattern');

// *********reports end*********
// *********invester desk end*********


// Route::get('/', function () {
//     return view('auth/login');
// });

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
