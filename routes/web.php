<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

// ...
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

// Route::get('/login',function () {
//     return view('pages.login.index');
// });

Route::prefix('login')->group(function() {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('', [LoginController::class, 'login'])->name('login.post');
    Route::get('verify-acccount/{token}', [LoginController::class, 'verify'])->name('login.verify');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/')->middleware('admin')->group(function() {
    Route::get('', [HomeController::class, 'index'])->name('dashboard');
    Route::get('grades', [GradesController::class, 'index'])->name('grades.index');
    Route::post('grades/import', [GradesController::class, 'import'])->name('grades.import');
    Route::post('grades/send-scores', [GradesController::class, 'sendScores'])->name('grades.sendScores');
});
