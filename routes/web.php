<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersReportsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoicesArchiveController;
use App\Http\Controllers\InvoicesReportsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);
Route::resource('invoices-attachments', InvoicesAttachmentsController::class);
Route::resource('archive', InvoicesArchiveController::class);

Route::controller(InvoicesController::class)->group(function () {
    Route::get('section/{id}', 'GetProduct');
    Route::get('edit_invoice/{id}', 'edit');
    Route::get('status_show/{id}', 'show')->name('status_show');
    Route::post('status_update/{id}', 'UpdateStatus')->name('status_update');
    Route::get('invoices-paid', 'PaidInvoices');
    Route::get('invoices-unpaid', 'UnPaidInvoices');
    Route::get('invoices-partially-paid', 'PartiallyPaidInvoices');
    Route::get('print_invoice/{id}', 'PrintInvoice');
    Route::get('mark_all_as_read', 'MarkAllAsRead');
});

Route::controller(InvoicesDetailsController::class)->group(function () {
    Route::get('invoices-details/{id}', 'index');
    Route::get('view_file/{invoice_number}/{file_name}', 'OpenFile');
    Route::get('download/{invoice_number}/{file_name}', 'GetFile');
    Route::post('delete_file', 'destroy')->name('delete_file');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::controller(InvoicesReportsController::class)->group(function () {
    Route::get('invoices_reports', 'index');
    Route::post('search_invoices', 'SearchInvoices');
});

Route::controller(CustomersReportsController::class)->group(function () {
    Route::get('customers_reports', 'index');
    Route::post('search_customers', 'SearchCustomers');
});

Route::get('/{page}', [AdminController::class, 'index']);
