<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{AdminController, DoctorController, CounterController};

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//Admin Login
Route::prefix('/admin')->middleware('iflogged')->group(function (){
    Route::get('/', [AdminController::class, 'form_login']);
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
});

Route::prefix('admin')->middleware('admin')->group(function (){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    //doctors
    Route::get('/doctor/add', [DoctorController::class, 'form_add_doctor'])->name('admin.doctor.create');
    Route::post('/doctor/add', [DoctorController::class, 'add_doctor'])->name('admin.doctor.create');
    Route::get('/doctor/list', [DoctorController::class, 'view_doctor'])->name('admin.doctor.view');
    Route::get('/doctor/update/{id}', [DoctorController::class, 'form_edit_doctor'])->name('admin.doctor.edit');
    Route::post('/doctor/update/{id}', [DoctorController::class, 'edit_doctor'])->name('admin.doctor.edit');
    Route::get('/doctor/remove/{id}', [DoctorController::class, 'delete_doctor'])->name('admin.doctor.delete');

    //counters
    Route::get('/counter/add', [CounterController::class, 'form_add_counter'])->name('admin.counter.create');
    Route::post('/counter/add', [CounterController::class, 'add_counter'])->name('admin.counter.create');
    Route::get('/counter/list', [CounterController::class, 'view_counter'])->name('admin.counter.view');
    Route::get('/counter/update/{id}', [CounterController::class, 'form_edit_counter'])->name('admin.counter.edit');
    Route::post('/counter/update/{id}', [CounterController::class, 'edit_counter'])->name('admin.counter.edit');
    Route::get('/counter/remove/{id}', [CounterController::class, 'delete_counter'])->name('admin.counter.delete');
});

