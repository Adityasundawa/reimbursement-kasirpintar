<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [App\Http\Controllers\Admin\Auth\AuthController::class, 'viewLogin'])->name('auth.login.view');
Route::post('/login', [App\Http\Controllers\Admin\Auth\AuthController::class, 'authenticateLogin'])->name('auth.login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewDashboard'])->name('dashboard')->middleware(['permission:manage dashboard']);

    Route::get('/dashboard/direktur', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewDashboard'])->name('direktur.dashboard')->middleware(['permission:manage direktur']);
    Route::get('/dashboard/users/{id}', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'delete'])->name('direktur.delete')->middleware(['permission:manage direktur']);
    Route::post('/dashboard/users/save', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'save'])->name('direktur.save');
    Route::get('/dashboard/users/{id}/edit',[App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'edit'])->name('user.edit');
    Route::put('/dashboard/users/{id}', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'update'])->name('user.update');

    Route::get('/dashboard/reimbursement', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewReimbursement'])->name('direktur.reimbursement')->middleware(['permission:manage direktur']);
    Route::get('/dashboard/reimbursement/{id}', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewReimbursementById'])->name('direktur.reimbursement.show')->middleware(['permission:manage direktur']);
    Route::post('/dashboard/reimbursement/{id}/change_status/', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'Change_statusReimbursementById'])->name('direktur.reimbursement.change.status')->middleware(['permission:manage direktur']);



    Route::get('/dashboard/finance', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewDashboard'])->name('finance.dashboard')->middleware(['permission:manage finance']);

    Route::get('/dashboard/staff', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'viewDashboard'])->name('staff.dashboard')->middleware(['permission:manage staff']);



});
