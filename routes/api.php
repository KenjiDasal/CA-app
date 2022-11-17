<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GalleryController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function (){
    Route::post('/auth/logout',[AuthController::class, 'logout']);
    Route::get('/auth/user',[AuthController::class, 'user']);


    Route::apiResource('/art', ArtController::class)->except((['index', 'show']));
});


Route::get('/art', [ArtController::class, 'index']);
Route::get('/art', [ArtController::class, 'show']);

Route::apiResource('/artists', ArtistController::class);

Route::apiResource('/galleries', GalleryController::class);