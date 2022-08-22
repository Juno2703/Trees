<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OriginController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewCostomerController;



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
// List Product
Route ::get('list', [ProductController::class, 'index'])->name('index');
Route ::get('add', [ProductController::class, 'add']);
Route ::post('save', [ProductController::class, 'save']);
Route ::get('edit/{id}', [ProductController::class, 'edit']);
Route ::post('update', [ProductController::class, 'update']);
Route ::get('delete/{id}', [ProductController::class, 'delete']);


// List Cate
Route ::get('list_category', [CategoryController::class, 'index']);
Route ::get('add_category', [CategoryController::class, 'add']);
Route ::post('save_category', [CategoryController::class, 'save']);
Route ::get('edit_category/{id}', [CategoryController::class, 'edit']);
Route ::post('update_category', [CategoryController::class, 'update']);
Route ::get('delete_category/{id}', [CategoryController::class, 'delete']);


// List Origin
Route ::get('list_origin', [OriginController::class, 'index']);
Route ::get('add_origin', [OriginController::class, 'add']);
Route ::post('save_origin', [OriginController::class, 'save']);
Route ::get('edit_origin/{id}', [OriginController::class, 'edit']);
Route ::post('update_origin', [OriginController::class, 'update']);
Route ::get('delete_origin/{id}', [OriginController::class, 'delete']);


// List Details
Route ::get('list_details', [DetailController::class, 'index']);
Route ::get('select_product',[DetailController::class,'select_product'])->name('select_product');
Route ::post('add_details', [DetailController::class, 'add']);
Route ::post('save_details', [DetailController::class, 'save']);
Route ::get('edit_details/{id}', [DetailController::class, 'edit']);
Route ::post('update_details', [DetailController::class, 'update']);
Route ::get('delete_details/{id}', [DetailController::class, 'delete']);

Route ::get('list_customer', [CustomerController::class, 'index']);
Route ::get('delete_customer/{id}', [CustomerController::class, 'delete']);

Route::get('/', [ProductController2::class, 'index']);
Route::get('products', [ProductController2::class, 'getProducts']);
Route::get('/details/{id}', [ProductController2::class, 'details']);

Route::get('register', [CustomerController::class, 'register']);
Route::get('login', [CustomerController::class, 'login']);
Route::post('register-process', [CustomerController::class, 'registerProcess'])->name('register-process');
Route::post('login-process', [CustomerController::class, 'loginProcess'])->name('login-process');
Route::get('logout', [CustomerController::class, 'logout']);

Route::get('login_admin', [AdminController::class, 'login_admin']);
Route::get('register_admin', [AdminController::class, 'register_admin']);
Route::post('register-process_admin', [AdminController::class, 'registerProcess_admin'])->name('register-process_admin');
Route::post('login-process_admin', [AdminController::class, 'loginProcess_admin'])->name('login-process_admin');
Route::get('logout_list', [AdminController::class, 'logout_list']);


Route::get('information/{id}', [CustomerController::class, 'information']);
Route::post('saveinformation/', [CustomerController::class, 'saveinformation'])->name('save-information');