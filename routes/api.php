<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilesController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [ AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signUp']);
   // Route::get('list', [AuthController::class, 'store']);


    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});


Route::group([
    'prefix' => 'files'
  ], function() {
        Route::get('', [FilesController::class, 'store']);
        Route::get('total', [FilesController::class, 'total']);
  });
