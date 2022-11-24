<?php

use App\Models\Products;
use App\Models\Sales;
use Illuminate\Support\Facades\App;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('products/delete/{id}', function ($id) {
    $delete_image = Products::where('id', $id)->first();
    @unlink(public_path('/images/products' . $delete_image->image));

    $productDelete = Products::find(intval($id));
    if ($productDelete->delete()) {
        echo 1;
    }
    echo 0;
});
Route::resource('/products', 'App\Http\Controllers\ProductController');




Route::get('/daySales', 'App\Http\Controllers\SaleController@daySales')->name('sales.day');
Route::get('/monthSales', 'App\Http\Controllers\SaleController@monthSales')->name('sales.month');
Route::get('/yearSales', 'App\Http\Controllers\SaleController@yearSales')->name('sales.year');
Route::get('/addsales', 'App\Http\Controllers\SaleController@addSales');


Route::get('sales/delete/{id}', function ($id) {
    $sales = Sales::find(intval($id));
    if ($sales->delete()) {
        echo 1;
    }
    echo 0;
});
Route::resource('/sales', 'App\Http\Controllers\SaleController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
