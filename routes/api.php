<?php

use App\Http\Controllers\AgrupationsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\OfficesController;
use App\Http\Controllers\ExternalPasseController;
use App\Http\Controllers\InternalPasseController;
use App\Http\Controllers\ProvisTipoController;


use App\Http\Controllers\GraphicsController;
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
    Route::get('list', [AuthController::class, 'store']);
    Route::post('edit', [AuthController::class, 'edit']);


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
        Route::get('/store/{status}', [FilesController::class, 'store']);
        Route::post('/update', [FilesController::class, 'edit']);
        Route::post('/search', [FilesController::class, 'search']);
        Route::post('/validation_create', [FilesController::class, 'validation_create']);
        Route::post('/create', [FilesController::class, 'create']);
        Route::get ('/total', [FilesController::class, 'total']);
        Route::get('/close/{status}', [FilesController::class, 'close']);

  });

Route::group([
    'prefix' => 'external_passe'
  ], function() {
        Route::get('', [ExternalPasseController::class, 'store']);
        Route::post('/update', [ExternalPasseController::class, 'update']);
        Route::get('/close/{id}', [ExternalPasseController::class, 'close']);
        Route::post('/search', [ExternalPasseController::class, 'search']);
        Route::get('/{file_id}', [ExternalPasseController::class, 'search']);
        Route::post('/create', [ExternalPasseController::class, 'create']);
        Route::get('/exports', [ExportsController::class, 'ExportToWord']);

  });
  Route::group([
    'prefix' => 'exports'
  ], function() {
        Route::get('/{id}', [ExportsController::class, 'ExportToWord']);

  });

  Route::group([
    'prefix' => 'internal_passe'
  ], function() {
        Route::get('', [InternalPasseController::class, 'store']);
        Route::post('/update', [InternalPasseController::class, 'update']);
        Route::post('/search', [InternalPasseController::class, 'search']);
        Route::get('/{external_passe_id}', [InternalPasseController::class, 'search']);
        Route::post('/create', [InternalPasseController::class, 'create']);
  });



Route::group([
    'prefix' => 'agrupations'
  ], function() {
        Route::get('', [AgrupationsController::class, 'store']);

  });

  Route::group([
    'prefix' => 'offices'
  ], function() {
        Route::get('', [OfficesController::class, 'store']);
        Route::post('/search', [OfficesController::class, 'search']);

  });

  Route::group([
    'prefix' => 'provis'
  ], function() {
        Route::get('', [ProvisTipoController::class, 'store']);
        Route::post('/search', [ProvisTipoController::class, 'search']);
  });

  Route::group([
    'prefix' => 'graphics'
  ], function() {
        Route::get('/pie', [GraphicsController::class, 'pie']);
        Route::get('/line', [GraphicsController::class, 'line']);

  });


