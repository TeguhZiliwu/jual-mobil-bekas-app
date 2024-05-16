<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Master\BrandController;
use App\Http\Controllers\API\Master\ItemController;
use App\Http\Controllers\API\Master\SupplierContactController;
use App\Http\Controllers\API\Master\SupplierController;
use App\Http\Controllers\API\Master\UnitOfMeasurementController;
use App\Http\Controllers\API\Master\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/signin', [AuthController::class, 'sign_in']);
    Route::post('/signup', [AuthController::class, 'sign_up']);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/signout', [AuthController::class, 'sign_out']);
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'show']);
        Route::post('/create', [UserController::class, 'create']);
        Route::post('/update', [UserController::class, 'update']);
        Route::delete('/delete', [UserController::class, 'delete']);
    });

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', [BrandController::class, 'show']);
        Route::post('/create', [BrandController::class, 'create']);
        Route::post('/update', [BrandController::class, 'update']);
        Route::delete('/delete', [BrandController::class, 'delete']);
        Route::get('/list', [BrandController::class, 'brand_list']);
    });

    Route::group(['prefix' => 'unit-of-measurement'], function () {
        Route::get('/', [UnitOfMeasurementController::class, 'show']);
        Route::post('/create', [UnitOfMeasurementController::class, 'create']);
        Route::post('/update', [UnitOfMeasurementController::class, 'update']);
        Route::delete('/delete', [UnitOfMeasurementController::class, 'delete']);
        Route::get('/list', [UnitOfMeasurementController::class, 'uom_list']);
    });

    Route::group(['prefix' => 'item'], function () {
        Route::get('/', [ItemController::class, 'show']);
        Route::post('/create', [ItemController::class, 'create']);
        Route::post('/update', [ItemController::class, 'update']);
        Route::delete('/delete', [ItemController::class, 'delete']);
        Route::get('/photo', [ItemController::class, 'get_photo']);
        Route::get('/car-for-sale', [ItemController::class, 'get_car_for_sale']);
    });

    Route::group(['prefix' => 'supplier'], function () {
        Route::get('/', [SupplierController::class, 'show']);
        Route::post('/create', [SupplierController::class, 'create']);
        Route::post('/update', [SupplierController::class, 'update']);
        Route::delete('/delete', [SupplierController::class, 'delete']);
        Route::get('/list', [SupplierController::class, 'type_list']);
    });

    Route::group(['prefix' => 'supplier-contact'], function () {
        Route::get('/', [SupplierContactController::class, 'show']);
        Route::post('/create', [SupplierContactController::class, 'create']);
        Route::post('/update', [SupplierContactController::class, 'update']);
        Route::delete('/delete', [SupplierContactController::class, 'delete']);
    });
});
