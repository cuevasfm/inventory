<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Inventory;
use App\Http\Controllers\InventoryController;
use App\Models\Employee;
use GuzzleHttp\Middleware;
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
/* Route::middleware(['auth:sanctum', 'verified'])->get('/inventory', [Inventory::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/inventory/new', [Inventory::class, 'new']);
Route::middleware(['auth:sanctum', 'verified'])->post('/inventory/new', [Inventory::class, 'store']);
Route::get('inventory/{id}/edit', [Inventory::class, 'edit'])->Middleware('auth'); */
//invenrories
Route::resource('/inventories', InventoryController::class)->middleware('auth');
Route::post('/inventories/{id}/uploadphoto', [InventoryController::class, 'uploadphoto'])->middleware('auth');
Route::get('/inventories/delete/image/{id}/{img}', [InventoryController::class, 'deletephoto'])->middleware('auth');
Route::get('/inventories/deploy/{id}', [InventoryController::class, 'deploy'])->middleware('auth');
//activity_log
Route::get('/inventories/activitylog/all', [InventoryController::class, 'activitylog_all'])->middleware('auth');
Route::get('/inventories/activitylog/{id}/create', [InventoryController::class, 'activitylog_create'])->middleware('auth');
Route::post('/inventories/activitylog/{id}/create', [InventoryController::class, 'activitylog_store'])->middleware('auth');
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
//employees
Route::middleware(['auth:sanctum', 'verified'])->get('/employee', [EmployeeController::class, 'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/employee/create', [EmployeeController::class, 'create']);
Route::middleware(['auth:sanctum', 'verified'])->post('/employee', [EmployeeController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->get('/employee/{id}/edit', [EmployeeController::class, 'edit']);
Route::middleware(['auth:sanctum', 'verified'])->put('/employee/{id}', [EmployeeController::class, 'update']);
Route::middleware(['auth:sanctum', 'verified'])->get('/employee/{id}/assignment', [EmployeeController::class, 'assignment']);
Route::get('employee/{id}/toassign', [EmployeeController::class, 'toassign'])->middleware('auth');
Route::put('employee/{id}/toassign', [EmployeeController::class, 'toAssignStore'])->middleware('auth');
Route::get('employee/{id}/{employee}/unassign', [EmployeeController::class, 'unAssign'])->middleware('auth');
Route::get('employee/{id}/deploy', [EmployeeController::class, 'deploy'])->middleware('auth');

//json
Route::get('/inventories/data/json', [InventoryController::class, 'inventories_json'])->middleware('auth');


//Route::middleware(['auth:sanctum', 'verified'])->resource('/config/categories', [CategoryController::class, '']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
