<?php

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
    });
});
