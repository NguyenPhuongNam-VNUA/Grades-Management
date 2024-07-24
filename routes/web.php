<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\DashboardController;

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
    Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
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

    Route::prefix('classes')->group(function () {
        Route::get('', [ClassesController::class, 'index'])->name('classes.index');
        Route::get('create', [ClassesController::class, 'create'])->name('classes.create');
        Route::post('store', [ClassesController::class, 'store'])->name('classes.store');
        Route::get('edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
        Route::post('update/{id}', [ClassesController::class, 'update'])->name('classes.update');
        Route::delete('delete/{id}', [ClassesController::class, 'delete'])->name('classes.delete');
    });

    Route::prefix('subjects')->group(function () {
        Route::get('', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('store', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::post('update/{id}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::delete('delete/{id}', [SubjectController::class, 'delete'])->name('subjects.delete');
    });
});
