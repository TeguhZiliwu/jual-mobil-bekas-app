<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Master\BrandController;
use App\Http\Controllers\API\Master\ItemController;
use App\Http\Controllers\API\Master\SupplierContactController;
use App\Http\Controllers\API\Master\SupplierController;
use App\Http\Controllers\API\Master\UnitOfMeasurementController;
use App\Http\Controllers\API\Master\UserController;
use App\Http\Controllers\API\Transaction\CartController;
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

Route::middleware('auth:sanctum')->group(function () {
});
