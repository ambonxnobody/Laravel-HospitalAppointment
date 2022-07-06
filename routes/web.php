<?php

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

Route::group(['middleware' => 'admin'], function () {
    Route::resource('/user', App\Http\Controllers\UserController::class)->except(['show']);

    Route::resource('/schedule', App\Http\Controllers\ScheduleController::class)->except(['show', 'edit', 'update', 'destroy']);
});

Route::group(['middleware' => 'doctor'], function () {
    Route::resource('/mySchedule', App\Http\Controllers\DoctorScheduleController::class)->except(['show', 'edit', 'update']);

    Route::resource('/diagnose', App\Http\Controllers\DiagnoseController::class)->only(['edit', 'update']);
    Route::resource('/complaint', App\Http\Controllers\ComplaintController::class)->only(['show']);
});

Route::group(['middleware' => 'patient'], function () {
    Route::resource('/medicalHistory', App\Http\Controllers\MedicalHistoryController::class)->except(['show']);

    Route::resource('/appointment', App\Http\Controllers\AppointmentController::class)->except(['show', 'create', 'store', 'edit', 'update']); // Sementara Edit dan Update
    Route::post('/addAppointment/{schedule}/{doctor}', [App\Http\Controllers\AppointmentController::class, 'store']);

    Route::resource('/complaint', App\Http\Controllers\ComplaintController::class)->only(['edit', 'update']);
    Route::resource('/diagnose', App\Http\Controllers\DiagnoseController::class)->only(['show']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        \App\Models\Appointment::query()->where('date', '<=', \Carbon\Carbon::now()->format('Y-m-d'))->update(['status' => 'done']);
        return view('Dashboard', [
            'title' => 'Dashboard',
            'doctors' => App\Models\User::where('role', 'doctor')->get(),
            'myAppointments' => App\Models\Diagnose::where('doctor_id', auth()->user()->id)->get(),
        ]);
    });

    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');
    Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate']);

    Route::get('/register', [App\Http\Controllers\RegisterController::class, 'index']);
    Route::post('/register', [App\Http\Controllers\RegisterController::class, 'store']);
});
