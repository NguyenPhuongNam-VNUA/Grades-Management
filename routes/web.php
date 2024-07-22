<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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
Route::get('/', function () {
    return redirect('/admin');
});

Route::prefix('login')->group(function() {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('login.show');
    Route::post('', [LoginController::class, 'login'])->name('login.post');
    Route::get('verify-acccount/{token}', [LoginController::class, 'verify'])->name('login.verify');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/admin')->middleware('admin')->group(function() {
    Route::get('', function() {
        return redirect()->route('users.index');
    })->name('admin.dashboard');
    Route::prefix('users')->group(function() {
        Route::get('', [UserController::class, 'index'])->name('users.index');
        Route::get('create', [UserController::class, 'create'])->name('users.create');
        Route::post('store', [UserController::class, 'store'])->name('users.store');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    });
    Route::prefix('grades')->group(function() {
        Route::get('', [GradesController::class, 'index'])->name('grades.index');
        Route::post('import', [GradesController::class, 'import'])->name('grades.import');
        Route::post('send-scores', [GradesController::class, 'sendScores'])->name('grades.sendScores');
        Route::post('reset-grades', [GradesController::class, 'resetGrades'])->name('grades.reset');
    });
});
