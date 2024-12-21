<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ProjectController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Become member api 

Route::get('/get-members', [MembershipController::class, 'getmembers']);
Route::post('/become-member', [MembershipController::class, 'becomemember']);

// project api 

Route::post('/upload-projects', [ProjectController::class, 'uploadprojects']);
Route::get('/get-projects', [ProjectController::class, 'getprojects']);