<?php

use App\Http\Controllers\ArtController;
use App\Http\Controllers\ArtistController;
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


//creates a routing for the api of the Art and Artist controller which allows the swagger to access the database.
Route::apiResource('/art', ArtController::class);

Route::apiResource('/artists', ArtistController::class);