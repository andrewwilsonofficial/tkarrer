<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportsController;
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
Route::get('/من-نحن', [HomeController::class, 'aboutUs'])->name('about-us');

Route::get('/التقارير-والدراسات/{slug}', [ReportsController::class, 'index'])->name('reports');
Route::get('/الادلة-المعرفية/{slug}', [ReportsController::class, 'proofs'])->name('proofs');

Route::get('/view-report/{report}', [ReportsController::class, 'viewReport'])->name('view-report');
Route::get('/download-report/{report}', [ReportsController::class, 'downloadReport'])->name('download-report');

Route::get('/test', function () {
    $faker = Faker\Factory::create('ar_SA');

    dd($faker->realText(10));
});
