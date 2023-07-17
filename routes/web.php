<?php

use Illuminate\Support\Facades\Route;

use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;


// Authorization Endpoint
Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize'])
    ->middleware(['web', 'auth']);

Route::post('/oauth/authorize', [AuthorizationController::class, 'approve'])
    ->middleware(['web', 'auth']);

Route::delete('/oauth/authorize', [AuthorizationController::class, 'deny'])
    ->middleware(['web', 'auth']);

// Access Token Endpoint
Route::post('/oauth/token', [AccessTokenController::class, 'issueToken'])
    ->middleware(['throttle', 'web', 'auth']);

// Client Routes
Route::resource('/oauth/clients', ClientController::class)
    ->middleware(['web', 'auth']);

// Personal Access Token Routes
Route::resource('/oauth/personal-access-tokens', PersonalAccessTokenController::class)
    ->middleware(['web', 'auth']);

Route::get('/', function () {
    return view('welcome');
});
