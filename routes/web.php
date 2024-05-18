<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Master\BrandController;
use App\Http\Controllers\API\Master\ItemController;
use App\Http\Controllers\API\Master\SupplierContactController;
use App\Http\Controllers\API\Master\SupplierController;
use App\Http\Controllers\API\Master\UnitOfMeasurementController;
use App\Http\Controllers\API\Master\UserController;
use App\Http\Controllers\API\Transaction\CartController;
use App\Http\Controllers\API\Transaction\PaymentController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('/signin', function () {
        return view('pages.auth.signin');
    })->name('signin');

    Route::get('/signup', function () {
        return view('pages.auth.signup');
    })->name('signup');
});

Route::get('/jual-mobil-bekas', function () {
    return view('landing-page');
})->name('landing-page');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    
    Route::group(['prefix' => 'master'], function () {
        Route::get('/user', function () {
            return view('pages.masters.user');
        })->name('master.user');
    
        Route::get('/brand', function () {
            return view('pages.masters.brand');
        })->name('master.brand');
    
        Route::get('/item', function () {
            return view('pages.masters.item');
        })->name('master.item');
    });
    
    Route::group(['prefix' => 'transaction'], function () {
        Route::get('/car-for-sale', function () {
            return view('pages.transactions.car-for-sale');
        })->name('transaction.car-for-sale');
        
        Route::get('/cart', function () {
            return view('pages.transactions.cart');
        })->name('transaction.cart');
        
        Route::get('/payment', function () {
            return view('pages.transactions.payment');
        })->name('transaction.payment');
    });
    
    Route::group(['prefix' => 'report'], function () {
        Route::get('/sales', function () {
            return view('pages.report.sales');
        })->name('report.sales');
    });
});

    
Route::group(['prefix' => 'api'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/signin', [AuthController::class, 'sign_in']);
        Route::post('/signup', [AuthController::class, 'sign_up']);
    });
    

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

    Route::group(['prefix' => 'item'], function () {
        Route::get('/', [ItemController::class, 'show']);
        Route::post('/create', [ItemController::class, 'create']);
        Route::post('/update', [ItemController::class, 'update']);
        Route::delete('/delete', [ItemController::class, 'delete']);
        Route::get('/photo', [ItemController::class, 'get_photo']);
        Route::get('/car-for-sale', [ItemController::class, 'get_car_for_sale']);
        Route::post('/add-to-cart', [ItemController::class, 'add_to_cart']);
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'get_cart']);
        Route::post('/buy', [CartController::class, 'buy']);
        Route::post('/upload', [CartController::class, 'upload_receipt']);
    });

    Route::group(['prefix' => 'payment'], function () {
        Route::get('/', [PaymentController::class, 'payment_list']);
        Route::post('/approve', [PaymentController::class, 'approve_payment']);
        Route::post('/reject', [PaymentController::class, 'reject_payment']);
    });

    Route::group(['prefix' => 'report'], function () {
        Route::get('/sales', [PaymentController::class, 'sales_report']);
    });
});

