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
Route::prefix('customer/contacts')->group(function () {
    Route::controller(\App\Http\Controllers\customer\ContactsListController::class)->group(function () {

        Route::get('index', 'index')->name('customer.contacts.index');

        //Route::get('show/{contact}', 'show')->name('customer.contacts.show');

    });
});

Route::prefix('/customer')->group(function () {
    Route::get('payment', function () {
        return view('customer.payment.payment');
    })->name('customer.payment')->middleware(['auth', 'role:customer']);

    Route::controller(\App\Http\Controllers\PaymentController::class)->group(function () {
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


Route::prefix('customer/shopcart')->group(function () {
    Route::controller(\App\Http\Controllers\ShopcartController::class)->group(function () {
        Route::get('index', 'index')->name('customer.shopcart.index');
        Route::get('addshopcart/{id}', [\App\Http\Controllers\ShopcartController::class, 'addshopcart'])->name('customer.shopcart.addshopcart');
        Route::get('deletecart/{campaignCost}', 'deletecart')->name('customer.shopcart.deletecart');
        Route::delete('delete/{id}', [\App\Http\Controllers\ShopcartController::class, 'destroy'])->name('customer.shopcart.destroy');
        Route::get('increaseCount/{id}', 'increaseCount')->name('customer.shopcart.increaseCount');
        Route::get('decreaseCount/{id}', 'decreaseCount')->name('customer.shopcart.decreaseCount');
        Route::put('updateProductCount/{id}', 'updateProductCount')->name('customer.shopcart.updateProductCount');
        Route::get('getCampaigns/{id}', 'getCampaigns')->name('customer.shopcart.getCampaigns');
    });
});

Route::prefix('customer/orders')->group(function () {
    Route::controller(\App\Http\Controllers\Orders\OrdersController::class)->group(function () {
        //Route::get('create', 'create')->name('customer.orders.create');
        //Route::post('store', 'store')->name('customer.orders.store');
        //Route::put('update/{order}', 'update')->name('customer.orders.update');
        //Route::delete('delete/{order}', 'destroy')->name('customer.orders.destroy');
        Route::get('index', 'index')->name('customer.orders.index');
        //Route::get('edit/{order}', 'edit')->name('customer.orders.edit');
        //Route::get('show/{order}', 'show')->name('customer.orders.show');

    });
});

Route::prefix('customer/orderDetails')->group(function () {
    Route::controller(\App\Http\Controllers\Orders\OrderDetailsController::class)->group(function () {
        //Route::get('create', 'create')->name('customer.orders.create');
        //Route::post('store', 'store')->name('customer.orders.store');
        //Route::put('update/{orderDetail}', 'update')->name('customer.orders.update');
        //Route::delete('delete/{orderDetail}', 'destroy')->name('customer.orders.destroy');
       // Route::get('index', 'index')->name('customer.orderDetails.index');
        //Route::get('edit/{orderDetail}', 'edit')->name('customer.orders.edit');
        Route::get('show/{orderDetail}', 'show')->name('customer.orderDetails.show');

    });
});
Route::prefix('admin/orders')->group(function () {
    Route::controller(\App\Http\Controllers\Orders\AdminOrdersController::class)->group(function () {
        Route::get('index', 'index')->name('admin.orders.index');
        Route::put('update/{order}', 'update')->name('admin.orders.update');
    });
});

Route::prefix('admin/orderDetails')->group(function () {
    Route::controller(\App\Http\Controllers\Orders\AdminOrderDetailsController::class)->group(function () {
        Route::get('show/{orderDetail}', 'show')->name('admin.orderDetails.show');
    });
});

Route::prefix('admin/campaigns')->group(function () {
    Route::controller(\App\Http\Controllers\campaigns\CampaignsController::class)->group(function () {
        Route::get('index', 'index')->name('admin.campaigns.index');
        Route::get('create', 'create')->name('admin.campaigns.create');
        Route::post('store', 'store')->name('admin.campaigns.store');
        Route::put('update/{campaign}', 'update')->name('admin.campaigns.update');
        Route::get('edit/{id}', 'edit')->name('admin.campaigns.edit');
        Route::delete('delete/{id}', 'destroy')->name('admin.campaigns.destroy');
    });
});

Route::prefix('customer/campaigns')->group(function () {
    Route::controller(\App\Http\Controllers\campaigns\CustomercampaignsController::class)->group(function () {
        Route::get('index', 'index')->name('customer.campaigns.index');
    });
});

Route::prefix('customer/returnproduct')->group(function () {
    Route::controller(\App\Http\Controllers\ReturnOrdersController::class)->group(function () {
        Route::get('index', 'index')->name('customer.returnproduct.index');
        Route::get('create/{id}', 'create')->name('customer.returnproduct.create');
        Route::post('store/{id}', 'store')->name('customer.returnproduct.store');
        Route::get('feedback/{id}', 'feedback')->name('customer.returnproduct.feedback');
        Route::post('storefeedback/{id}', 'storefeedback')->name('customer.returnproduct.storefeedback');

    });
});

Route::prefix('admin/returnproduct')->group(function () {
    Route::controller(\App\Http\Controllers\AdminReturnOrderController::class)->group(function () {
        Route::get('index', 'index')->name('admin.returnproduct.index');
        Route::get('completedReturn/{id}', 'completedReturn')->name('admin.returnproduct.completedReturn');
        Route::get('startReturn/{id}', 'startReturn')->name('admin.returnproduct.startReturn');
        Route::get('feedback/{id}', 'feedback')->name('admin.returnproduct.feedback');
        Route::post('store/{id}', 'store')->name('admin.returnproduct.store');

    });
});
