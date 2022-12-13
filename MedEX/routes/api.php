<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{AdminController, DoctorController, CounterController, LoginController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//admin
Route::post('/admin/signin',[AdminController::class,'signin']);
Route::prefix('admin')->middleware('ApiAuth')->group(function (){
    Route::get('/state', [AdminController::class, 'state']);
    Route::get('/dashboard', [AdminController::class, 'index']);
    Route::get('/signout',[AdminController::class, 'signout']);
    
    Route::get('/user/view',[AdminController::class,'view_user']);
    
    //doctors
    Route::get('/doctor/view',[DoctorController::class,'view_doctor']);
    Route::post('/doctor/add',[DoctorController::class,'add_doctor']);
    Route::delete('/doctor/remove/{id}',[DoctorController::class,'delete_doctor']);

    //counters
    Route::get('/counter/view',[CounterController::class,'view_counter']);
    Route::post('/counter/add',[CounterController::class,'add_counter']);
    Route::delete('/counter/remove/{id}',[CounterController::class,'delete_counter']);
});

//patient
Route::post('/signin',[LoginController::class,'signin']);
Route::prefix('user')->middleware('ApiAuth')->group(function (){
    // Route::get('/state', [LoginController::class, 'state']);
    Route::get('/dashboard', [LoginController::class, 'index']);
    Route::get('/signout',[LoginController::class, 'signout']);
});
