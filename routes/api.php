<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\UserApiController;

Route::get('/events', [EventApiController::class, 'index']);
Route::post('/events', [EventApiController::class, 'store']);
Route::get('/events/{id}', [EventApiController::class, 'show']);
Route::put('/events/{event:id}', [EventApiController::class, 'update']);
Route::delete('/events/{event:id}', [EventApiController::class, 'destroy']);



Route::middleware(['web'])->group(function () {
    Route::get('/user-role', function () {
        return response()->json([
            'role' => Auth::check() ? Auth::user()->rol : 'guest'
        ]);
    });
});


Route::apiResource('events', EventApiController::class);
Route::apiResource('users', UserApiController::class);
