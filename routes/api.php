<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('events', EventController::class);

Route::resource('users', UserController::class);

Route::resource('notifications', NotificationController::class);

Route::get('users/{userId}', [UserController::class, 'findSpecific']);

Route::resource('payments', PaymentController::class);

Route::get('payment/{userId}/{eventId}', [PaymentController::class, 'findSpecific']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/register', [UserController::class, 'register']);

Route::post('payment/create', [PaymentController::class, 'createPayment']);

Route::post('user/resetpassword', [UserController::class, 'updateMobilePassword']);

Route::get('paymentsuser/get/{userId}', [PaymentController::class, 'getPayments']);
