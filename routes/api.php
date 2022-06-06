<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\InteractDatabaseController;
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


Route::post("ControlUsername",[WelcomeController::class, 'ControlUsername']);

Route::post("filter", [InteractDatabaseController::class, 'filter']); //GET TEMPORANEO
Route::post("followedauctionsby",[InteractDatabaseController::class, 'followedauctionsby'] );
Route::post("recognizeimage", [InteractDatabaseController::class, 'recognizeimage']);
Route::post("insertnewauction", [InteractDatabaseController::class, 'insertnewauction']);
Route::post("togglebookmark", [InteractDatabaseController::class, 'togglebookmark']);
Route::post("getfolloweronauctions", [InteractDatabaseController::class, 'getfolloweronauctions']);
Route::post("changepassword", [InteractDatabaseController::class, 'changepassword']);
Route::post("offer", [InteractDatabaseController::class, 'offer']);