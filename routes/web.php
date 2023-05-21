<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('appointments/store', [UserController::class, 'appointment_store'])->name('appointments.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // 'verified'
])->group(function () {

    Route::middleware(isAdmin::class)->group(function () {
        Route::name('admin.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::resource('appointments', AppointmentController::class);
            Route::get('appointments/accept/{id}', [AppointmentController::class, 'accept'])->name('appointments.accept');
            Route::get('appointments/reject/{id}', [AppointmentController::class, 'reject'])->name('appointments.reject');
            Route::get('appointments/send_email_view/{id}', [AppointmentController::class, 'send_email_view'])->name('appointments.send_email_view');
            Route::post('appointments/send_email/{id}', [AppointmentController::class, 'send_email'])->name('appointments.send_email');
        });

        Route::resource('doctors', DoctorController::class);
    });

    Route::name('user.')->middleware('verified')->group(function () {
        Route::get('/home', [DashboardController::class, 'user_dashboard'])->name('dashboard');
        Route::get('my-appointments/', [UserController::class, 'appointment_index'])->name('appointments.index');
        Route::get('appointments/cancel/{id}', [UserController::class, 'appointment_cancel'])->name('appointments.cancel');
    });
});
