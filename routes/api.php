<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('oauth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
Route::post('oauth/{provider}/redirect', [AuthController::class, 'redirectToProvider']);
