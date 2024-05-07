<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthenicatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\WorkController;

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

Route::get('/home', [AttendanceController::class, 'home']);
Route::post('/home', [AttendanceController::class, 'home']);
Route::get('/attendance', [AttendanceController::class, 'date']);
Route::post('/attendance', [AttendanceController::class, 'date']);
Route::get('/home_stamp', [WorkController::class, 'stamp']);
Route::post('/home_stamp', [WorkController::class, 'stamp']);
Route::get('/home_stamp_end', [WorkController::class, 'stamp_end']);
Route::post('/home_stamp_end', [WorkController::class, 'stamp_end']);
Route::get('/home_rest', [RestController::class,'rest']);
Route::post('/home_rest', [RestController::class,'rest']);
Route::get('/home_rest_end', [RestController::class, 'rest_end']);
Route::post('/home_rest_end', [RestController::class, 'rest_end']);
/*Route::get('/home', [AttendanceController::class, 'home']);
Route::middleware('auth')->group(function () {
    Route::get('/home', [AttendanceController::class, 'home']);
    Route::get('/attendance', [AttendanceController::class, 'date']);
    Route::post('/attendance', [AttendanceController::class, 'date']);
    Route::post('/home_stamp', [WorkController::class, 'stamp']);
    Route::post('/home_stamp_end', [WorkController::class, 'stamp_end']);
    Route::post('/home_rest', [RestController::class,'rest']);
    Route::post('/home_rest_end', [RestController::class, 'rest_end']);
});*/


