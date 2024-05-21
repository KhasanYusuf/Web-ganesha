<?php

use Illuminate\Support\Facades\Route;
use App\Models\produk;
use App\Models\Order;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReparationController;
use App\Http\Controllers\ShipmentListController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('index',[
        "title" => "Halaman Utama"
    ]);
});
Route::get('/insert', [ProdukController::class, 'insertform'])->middleware('auth');

// Routing untuk halaman registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routing untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/profile', [LoginController::class, 'profile'])->name('profile');

Route::get('/transaksi', [OrderController::class, 'showOrder'])->name('transaksi')->middleware('auth');
Route::get('/status', [ShipmentListController::class, 'userStatus'])->name('status')->middleware('auth');
Route::post('/deleteorder', [OrderController::class, 'deleteItem'])->name('order.delete');


Route::get('/product_view', [ProdukController::class, 'index'])->name('product.view');
Route::post('/product_delete', [ProdukController::class, 'delete'])->name('product.delete');
Route::get('/reparation', [ReparationController::class, 'index']);
// Route::post('/reparation', 'ReparationController@store')->name('reparation.store')->middleware('auth');
Route::post('/reparation', [ReparationController::class, 'store'])->name('reparation.store')->middleware('auth');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/search', [ProdukController::class, 'search'])->name('search');

Route::post('/order/send-whatsapp-message', [OrderController::class, 'sendWhatsAppMessage'])->name('order.send.whatsapp');


// Route::post('/order/{order}', [OrderController::class, 'order']);
// Route::post('/order/{product}', [OrderController::class, 'order'])->name('order');
Route::post('/insert', [ProdukController::class, 'store'])->name('insert.store');
Route::get('/shipmentlist', [ShipmentListController::class, 'index'])->name('shipment-lists.index')->middleware('auth');
Route::post('/shipmentlist', [ShipmentListController::class, 'store'])->name('shipmentlist.store');
Route::post('/shipmentlist/finish', [ShipmentListController::class, 'finish'])->name('shipmentlist.finish');
Route::post('/shipmentlist/get', [ShipmentListController::class, 'get'])->name('shipmentlist.get');
Route::post('/shipmentlist/edit', [ShipmentListController::class, 'editPrice'])->name('shipmentlist.edit');

Route::get('/kategori/{category}', [ProdukController::class, 'category'])->name('kategori.category');

