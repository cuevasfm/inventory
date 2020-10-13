<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Inventory;
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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/inventory', [Inventory::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/inventory/new', [Inventory::class, 'new']);
Route::middleware(['auth:sanctum', 'verified'])->post('/inventory/new', [Inventory::class, 'store']);
//categories
Route::middleware(['auth:sanctum', 'verified'])->get('/config/categories', [CategoryController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/config/categories/new', [CategoryController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->post('/config/categories', [CategoryController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/config/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->put('/config/categories/{id}', [CategoryController::class, 'update']);

//brands
Route::middleware(['auth:sanctum', 'verified'])->get('/config/brands', [BrandController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/config/brands/new', [BrandController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->post('/config/brands', [BrandController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/config/brands/{id}/edit', [BrandController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->put('/config/brands/{id}', [BrandController::class, 'update']);


//Route::middleware(['auth:sanctum', 'verified'])->resource('/config/categories', [CategoryController::class, '']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
