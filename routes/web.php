<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/فكرة-تقارير', [HomeController::class, 'aboutUs'])->name('about-us');
Route::post('/send-message', [HomeController::class, 'sendMessage'])->name('send-message');

Route::get('/التقارير-والدراسات/{slug?}', [ReportsController::class, 'index'])->name('reports');
Route::get('/الادلة-المعرفية/{slug?}', [ReportsController::class, 'proofs'])->name('proofs');

Route::get('/search', [ReportsController::class, 'search'])->name('search');

Route::get('/report/{report}', [ReportsController::class, 'report'])->name('report');
Route::get('/download-report/{report}', [ReportsController::class, 'downloadReport'])->name('download-report');
Route::get('/record-view/{report}', [ReportsController::class, 'recordView'])->name('record-view');

Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/categories', [DashboardController::class, 'categories'])->name('categories');
Route::get('/categories/create', [DashboardController::class, 'createCategory'])->name('create-category');
Route::post('/categories/create', [DashboardController::class, 'storeCategory'])->name('store-category');
Route::get('/categories/{category}/edit', [DashboardController::class, 'editCategory'])->name('edit-category');
Route::post('/categories/{category}/edit', [DashboardController::class, 'updateCategory'])->name('update-category');
Route::get('/categories/{category}/delete', [DashboardController::class, 'deleteCategory'])->name('delete-category');

Route::get('/reports', [DashboardController::class, 'reports'])->name('admin-reports');
Route::get('/reports/create', [DashboardController::class, 'createReport'])->name('create-report');
Route::post('/reports/create', [DashboardController::class, 'storeReport'])->name('store-report');
Route::get('/reports/{report}/edit', [DashboardController::class, 'editReport'])->name('edit-report');
Route::post('/reports/{report}/edit', [DashboardController::class, 'updateReport'])->name('update-report');
Route::get('/reports/{report}/delete', [DashboardController::class, 'deleteReport'])->name('delete-report');

Route::get('/proofs', [DashboardController::class, 'proofs'])->name('admin-proofs');
Route::get('/proofs/create', [DashboardController::class, 'createProof'])->name('create-proof');
Route::post('/proofs/create', [DashboardController::class, 'storeProof'])->name('store-proof');
Route::get('/proofs/{proof}/edit', [DashboardController::class, 'editProof'])->name('edit-proof');
Route::post('/proofs/{proof}/edit', [DashboardController::class, 'updateProof'])->name('update-proof');
Route::get('/proofs/{proof}/delete', [DashboardController::class, 'deleteProof'])->name('delete-proof');

Route::get('/settings', [SettingController::class, 'index'])->name('settings');
Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
