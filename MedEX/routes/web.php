<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\{AdminController, DoctorController, CounterController, UserController, LoginController, MailController};
use App\Http\Controllers\Auth\{PasswordResetLinkController, NewPasswordController};

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

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// require __DIR__.'/auth.php';

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


// Email Verification for New User  __Start
Route::prefix('dashboard/email')->middleware('auth')->group(function (){
    Route::get('/verify', [MailController::class, 'index'])->name('verification.notice');
    Route::post('/verification-notification', [MailController::class, 'verify'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('/verify/{id}/{hash}', [MailController::class, 'verify_confirm'])->middleware('signed')->name('verification.verify');
});
// Email Verification for New User  __END


//User Login
Route::middleware('iflogged')->group(function (){
    Route::get('/', [LoginController::class, 'form_login']);
    Route::post('/signin', [LoginController::class, 'login'])->name('user.login');
    Route::get('/signup', [LoginController::class, 'form_register'])->name('user.register');
    Route::post('/signup', [LoginController::class, 'register'])->name('user.register.store');
    
    Route::get('/password/request', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/password/request', [PasswordResetLinkController::class, 'store'])->name('password.request');
    Route::get('/reset-password', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.reset');
});

//Patient
Route::middleware('user')->group(function (){
    Route::middleware('verified')->group(function (){
        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });
    Route::get('/signout', [UserController::class, 'logout'])->name('user.logout');
});

//Counter
Route::prefix('counter')->middleware('counter')->group(function (){
    Route::get('/dashboard', [CounterController::class, 'index'])->name('counter.dashboard');
    Route::get('/signout', [CounterController::class, 'logout'])->name('counter.logout');
    Route::post('/queue/add', [CounterController::class, 'add_queue'])->name('counter.queue.add');
});

//Doctor
Route::prefix('doctor')->middleware('doctor')->group(function (){
    Route::get('/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
    Route::get('/signout', [DoctorController::class, 'logout'])->name('doctor.logout');
    Route::get('/prescribe/{id}', [DoctorController::class, 'form_prescribe'])->name('doctor.prescribe.form');
    Route::post('/prescribe/{id}', [DoctorController::class, 'store_prescribe'])->name('doctor.prescribe.store');
});