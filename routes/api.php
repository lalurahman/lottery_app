<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\LotteryController;
use App\Http\Controllers\API\V1\ParticipantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('participants', [ParticipantController::class, 'all']);
    Route::post('participants/store', [ParticipantController::class, 'store']);
    Route::put('participants/update/{id}', [ParticipantController::class, 'update']);
    Route::delete('participants/destroy/{id}', [ParticipantController::class, 'destroy']);

    // lottery
    Route::get('lottery', [LotteryController::class, 'lottery']);
});
