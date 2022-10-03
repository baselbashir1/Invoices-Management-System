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
Route::get('section/{id}', [InvoicesController::class, 'GetProduct']);
Route::get('invoices-details/{id}', [InvoicesDetailsController::class, 'index']);
Route::get('view_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'OpenFile']);
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'GetFile']);
Route::post('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('edit_invoice/{id}', [InvoicesController::class, 'edit']);
Route::get('status_show/{id}', [InvoicesController::class, 'show'])->name('status_show');
Route::post('status_update/{id}', [InvoicesController::class, 'UpdateStatus'])->name('status_update');
Route::get('invoices-paid', [InvoicesController::class, 'PaidInvoices']);
Route::get('invoices-unpaid', [InvoicesController::class, 'UnPaidInvoices']);
Route::get('invoices-partially-paid', [InvoicesController::class, 'PartiallyPaidInvoices']);
Route::resource('archive', InvoicesArchiveController::class);
Route::get('print_invoice/{id}', [InvoicesController::class, 'PrintInvoice']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

Route::get('invoices_reports', [InvoicesReportsController::class, 'index']);
Route::post('search_invoices', [InvoicesReportsController::class, 'SearchInvoices']);
Route::get('customers_reports', [CustomersReportsController::class, 'index']);
Route::post('search_customers', [CustomersReportsController::class, 'SearchCustomers']);

Route::get('mark_all_as_read', [InvoicesController::class, 'MarkAllAsRead']);



Route::get('/{page}', [AdminController::class, 'index']);
