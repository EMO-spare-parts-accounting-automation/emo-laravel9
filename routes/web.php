<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

# '/' ve 'home' linkleri login kontolüyle home sayfasına yönlendirilir controller ile
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin/products')->group(function () {
    Route::controller(\App\Http\Controllers\Products\ProductsController::class)->group(function () {
        Route::get('create', 'create')->name('admin.products.create');
        Route::post('store', 'store')->name('admin.products.store');
        Route::put('update/{product}', 'update')->name('admin.products.update');
        Route::delete('delete/{product}', 'destroy')->name('admin.products.destroy');
        Route::get('index', 'index')->name('admin.products.index');
        Route::get('edit/{product}', 'edit')->name('admin.products.edit');
        //Route::get('show/{product}', 'show')->name('admin.products.show');
        Route::get('search', 'search')->name('admin.products.search');
    });
});
Route::prefix('customer/products')->group(function () {
    Route::controller(\App\Http\Controllers\customer\CustomerController::class)->group(function () {

        Route::get('index', 'index')->name('customer.products.index');
        Route::get('search', 'search')->name('customer.products.search');
    });
});


Route::prefix('/admin')->group(function () {
    Route::get('customerlist', [\App\Http\Controllers\CustListController::class, 'index'])->name('admin.customerlist');
    Route::delete('delete/{id}', [\App\Http\Controllers\CustListController::class, 'destroy'])->name('admin.customerlist.destroy');
    Route::get('authority/{id}', [\App\Http\Controllers\CustListController::class, 'authority'])->name('admin.customerlist.authority');
    Route::get('search', [\App\Http\Controllers\CustListController::class, 'search'])->name('admin.customerlist.search');
});

Route::prefix('admin/contacts')->group(function () {
    Route::controller(\App\Http\Controllers\ContactsController::class)->group(function () {
        Route::get('create', 'create')->name('admin.contacts.create');
        Route::post('store', 'store')->name('admin.contacts.store');
        Route::put('update/{contact}', 'update')->name('admin.contacts.update');
        Route::delete('delete/{contact}', 'destroy')->name('admin.contacts.destroy');
        Route::get('index', 'index')->name('admin.contacts.index');
        Route::get('edit/{contact}', 'edit')->name('admin.contacts.edit');
        //Route::get('show/{contact}', 'show')->name('admin.contacts.show');

    });
});


Route::prefix('/customer')->group(function () {
    Route::get('payment', function () {
        return view('customer.payment.payment');
    })->name('customer.payment')->middleware(['auth', 'role:customer']);

    Route::controller(\App\Http\Controllers\PaymentController::class)->group(function (){
        Route::post('addbalance', 'addbalance')->name('admin.payments.addbalance')
            ->middleware(['auth', 'role:customer']);
    });

    Route::get('payment/credit', function () {
        return view('customer.payment.credit');
    })->name('customer.payment.credit')->middleware(['auth', 'role:customer']);

    Route::get('payment/transfer', function () {
        return view('customer.payment.transfer');
    })->name('customer.payment.transfer')->middleware(['auth', 'role:customer']);

});
