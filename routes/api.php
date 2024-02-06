<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MovieController;
use \App\Http\Controllers\CountryController;
use \App\Http\Controllers\MovieTypeController;
use \App\Http\Controllers\MovieReviewController;

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
Route::resource('movies', MovieController::class);
Route::post('movies/cover/{movie}', [MovieController::class, 'updateCover']);
Route::get('countries', [CountryController::class, 'index']);
Route::get('movie-types', [MovieTypeController::class, 'index']);
Route::post('movie-reviews', [MovieReviewController::class, 'store']);
