<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function(){

    // test routing
    Route::get('test', function(){
        return response()->json([
            'data' => 'test data apakah masalah'
        ], 200);
    });

    // auth route
    Route::prefix('auth')->group(function(){
        Route::post('login', LoginController::class);
        Route::get('logout', LogoutController::class)->middleware('auth:sanctum');
    });
});
