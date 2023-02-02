<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\FrontendController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SizingController;

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

//product
Route::get('/inventory', [InventoryController::class, 'inventory'])->name('inventory');
Route::get('/inventoryadd', [InventoryController::class, 'inventoryAdd'])->name('inventory.add');
Route::post('/inventorystore', [InventoryController::class, 'inventoryStore'])->name('inventory.store');
Route::get('/inventoryedit/{id}', [InventoryController::class, 'inventoryEdit'])->name('inventory.edit');
Route::post('inventory/update', [InventoryController::class, 'inventoryUpdate'])->name('inventory.update');
Route::get('/inventorydelete/{id}', [InventoryController::class, 'inventoryDelete'])->name('inventory.delete');
Route::get('/inventorysearch', [InventoryController::class, 'inventorysearch'])->name('inventory.search');

//product's size
Route::get('/size', [SizingController::class, 'size'])->name('size');
Route::get('/sizeadd', [SizingController::class, 'sizeAdd'])->name('size.add');
Route::post('/sizestore', [SizingController::class, 'sizeStore'])->name('size.store');
Route::get('/sizeedit/{id}', [SizingController::class, 'sizeEdit'])->name('size.edit');
Route::post('/sizeupdate', [SizingController::class, 'sizeUpdate'])->name('size.update');
Route::get('/sizedelete/{id}', [SizingController::class, 'sizeDelete'])->name('size.delete');
Route::get('/sizesearch', [SizingController::class, 'sizesearch'])->name('size.search');

