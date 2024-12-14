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
use App\Http\Controllers\API\Transaction\TransactionController;
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

Route::get('/', function () {
    $result = DB::table("items AS A")->select('A.id', 'A.brand_id', 'D.name AS brand_name', 'A.status', 'A.name', 'A.description', 'A.cc', 'A.fuel_type', 'A.transmission_type', 'A.total_seat', 'A.price')->leftJoin('users AS B', 'A.created_by', '=', 'B.userid')->leftJoin('users AS C', 'A.updated_by', '=', 'C.userid')->join('brands AS D', 'A.brand_id', '=', 'D.id')->where('status', 'OPEN')->get();
    
    $result_photo = DB::table("item_photos AS A")->select('A.id', 'A.item_id', 'A.name')->get();
    
    return view('landing-page', ['items' => $result, 'photos' => $result_photo]);
})->name('landing-page');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/dashboard', function () {
        $totalIncomeCurrMonth = DB::table('transactions')
                    ->whereYear('date', date('Y'))
                    ->whereMonth('date', date('m'))
                    ->where('status', 'DONE')
                    ->sum('price');

        $totalIncomeCurrYear = DB::table('transactions')
                    ->whereYear('date', date('Y'))
                    ->where('status', 'DONE')
                    ->sum('price');

        $totalIncomeAllTime = DB::table('transactions')
                    ->where('status', 'DONE')
                    ->sum('price');

        $totalCarSold = DB::table('transactions')
                    ->where('status', 'DONE')
                    ->count('item_id');

        $formattedTotalIncomeCurrMonth = 'Rp. ' . number_format($totalIncomeCurrMonth, 2, ',', '.');
        $formattedTotalIncomeCurrYear = 'Rp. ' . number_format($totalIncomeCurrYear, 2, ',', '.');
        $formattedTotalIncomeAllTime = 'Rp. ' . number_format($totalIncomeAllTime, 2, ',', '.');
        
        return view('welcome', ['formattedTotalIncomeCurrMonth' => $formattedTotalIncomeCurrMonth, 'formattedTotalIncomeCurrYear' => $formattedTotalIncomeCurrYear, 'formattedTotalIncomeAllTime' => $formattedTotalIncomeAllTime, 'totalCarSold' => $totalCarSold]);
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
        
        Route::get('/history', function () {
            return view('pages.transactions.history');
        })->name('transaction.history');
        
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
        Route::post('/change-password', [UserController::class, 'change_password']);
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
        Route::post('/remove', [CartController::class, 'remove_from_cart']);
    });

    Route::group(['prefix' => 'history'], function () {
        Route::get('/', [TransactionController::class, 'review']);
        Route::post('/post-review', [TransactionController::class, 'post_review']);
        Route::get('/get-rating-review', [TransactionController::class, 'get_rating_review']);
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

