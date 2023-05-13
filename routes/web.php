<?php

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
    Route::controller(\App\Http\Controllers\Products\ProductsController::class)->group(function () {

        Route::get('index', 'index')->name('customer.products.index');
        Route::get('search', 'search')->name('customer.products.search');
    });
});


Route::prefix('/admin')->group(function (){
    Route::get('customerlist',[\App\Http\Controllers\CustListController::class,'index'])->name('admin.customerlist');
    Route::delete('delete/{id}',[\App\Http\Controllers\CustListController::class,'destroy'])->name('admin.customerlist.destroy');
    Route::get('yetki/{id}',[\App\Http\Controllers\CustListController::class,'yetki'])->name('admin.customerlist.yetki');
    Route::get('search',[\App\Http\Controllers\CustListController::class,'search'])->name('admin.customerlist.search');
});
