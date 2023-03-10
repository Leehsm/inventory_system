<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SizingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SkincareController;
use App\Http\Controllers\ClothingController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [FrontendController::class, 'index']);
Route::post('/ordersearch', [FrontendController::class, 'frontendsearch'])->name('frontend.search');

//product
Route::get('/product', [ProductController::class, 'product'])->name('product');
Route::get('/productadd', [ProductController::class, 'productAdd'])->name('product.add');
Route::post('/productstore', [ProductController::class, 'productStore'])->name('product.store');
Route::get('/productedit/{id}', [ProductController::class, 'productEdit'])->name('product.edit');
Route::post('product/update', [ProductController::class, 'productUpdate'])->name('product.update');
Route::get('/productdelete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
Route::post('/productsearch', [ProductController::class, 'productsearch'])->name('product.search');

//Inventory
Route::get('/inventory', [InventoryController::class, 'inventory'])->name('inventory');
Route::get('/inventoryadd', [InventoryController::class, 'inventoryAdd'])->name('inventory.add');
Route::post('/inventorystore', [InventoryController::class, 'inventoryStore'])->name('inventory.store');
Route::get('/inventoryedit/{id}', [InventoryController::class, 'inventoryEdit'])->name('inventory.edit');
Route::post('inventory/update', [InventoryController::class, 'inventoryUpdate'])->name('inventory.update');
Route::get('/inventorydelete/{id}', [InventoryController::class, 'inventoryDelete'])->name('inventory.delete');
Route::post('/inventorysearch', [InventoryController::class, 'inventorysearch'])->name('inventory.search');

//product's size
Route::get('/size', [SizingController::class, 'size'])->name('size');
Route::get('/sizeadd', [SizingController::class, 'sizeAdd'])->name('size.add');
Route::post('/sizestore', [SizingController::class, 'sizeStore'])->name('size.store');
Route::get('/size-edit/{id}', [SizingController::class, 'sizeEdit'])->name('size.edit');
Route::post('/sizeupdate', [SizingController::class, 'sizeUpdate'])->name('size.update');
Route::get('/sizedelete/{id}', [SizingController::class, 'sizeDelete'])->name('size.delete');
Route::post('/sizesearch', [SizingController::class, 'sizesearch'])->name('size.search');


//DIIQS Customer DB
Route::get('/skincare', [SkincareController::class, 'skincare'])->name('skincare');
Route::get('/skincareadd', [SkincareController::class, 'skincareAdd'])->name('skincare.add');
Route::post('/skincarestore', [SkincareController::class, 'skincareStore'])->name('skincare.store');
Route::get('/skincareedit/{id}', [SkincareController::class, 'skincareEdit'])->name('skincare.edit');
Route::post('/skincareupdate', [SkincareController::class, 'skincareUpdate'])->name('skincare.update');
Route::get('/skincaredelete/{id}', [SkincareController::class, 'skincareDelete'])->name('skincare.delete');
Route::post('/skincaresearch', [SkincareController::class, 'skincaresearch'])->name('skincare.search');


//Clothing Customer DB
Route::get('/clothing', [ClothingController::class, 'clothing'])->name('clothing');
Route::get('/clothingadd', [ClothingController::class, 'clothingAdd'])->name('clothing.add');
Route::post('/clothingstore', [ClothingController::class, 'clothingStore'])->name('clothing.store');
Route::get('/clothingedit/{id}', [ClothingController::class, 'clothingEdit'])->name('clothing.edit');
Route::post('/clothingupdate', [ClothingController::class, 'clothingUpdate'])->name('clothing.update');
Route::get('/clothingdelete/{id}', [ClothingController::class, 'clothingDelete'])->name('clothing.delete');
Route::post('/clothingsearch', [ClothingController::class, 'clothingsearch'])->name('clothing.search');



//Order DB
// Route::get('/order', [OrderController::class, 'order'])->name('order');


//cart 
Route::get('/order', [OrderController::class, 'orderList'])->name('order');
Route::post('/order-store', [OrderController::class, 'addToCart'])->name('order.store');
Route::post('/update-order', [OrderController::class, 'updateCart'])->name('order.update');
Route::post('/remove', [OrderController::class, 'removeCart'])->name('order.remove');
Route::post('/clear', [OrderController::class, 'clearAllCart'])->name('order.clear');
Route::post('/save', [OrderController::class, 'saveAllCart'])->name('order.save');
Route::get('/saved-order', [OrderController::class, 'savedOrder'])->name('saved-order');


Route::get('/order-detail/{id}', [OrderController::class, 'orderDetail'])->name('order-detail');
Route::get('/invoice/download/{id}', [OrderController::class, 'InvoiceDownload'])->name('invoice-download'); 