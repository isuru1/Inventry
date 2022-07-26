<?php

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
Route::group(['middleware' => 'web'], function () {

    Auth::routes();
    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('dashboard', 'App\Http\Controllers\backend\HomeController@loadpage'); 
    
});

Route::group(['middleware' => 'auth'], function () {

    //products
    Route::get('products', 'App\Http\Controllers\backend\ProductsController@ProductsList');
    Route::get('products/add', 'App\Http\Controllers\backend\ProductsController@getProducts');
    Route::post('products/add', 'App\Http\Controllers\backend\ProductsController@postProducts');
    Route::get('products/{id}/edit','App\Http\Controllers\backend\ProductsController@getProductsById');
    Route::post('products/{id}/edit','App\Http\Controllers\backend\ProductsController@postProductsById');
    Route::post('products/delete','App\Http\Controllers\backend\ProductsController@delete');
    Route::get('products/search', 'App\Http\Controllers\backend\ProductsController@Search');
    Route::post('products/search', 'App\Http\Controllers\backend\ProductsController@Search');

   //customers
    Route::get('customers', 'App\Http\Controllers\backend\CustomersController@CustomersList');
    Route::get('customers/add', 'App\Http\Controllers\backend\CustomersController@getCustomers');
    Route::post('customers/add', 'App\Http\Controllers\backend\CustomersController@postCustomers');
    Route::get('customers/{id}/edit','App\Http\Controllers\backend\CustomersController@getCustomersById');
    Route::post('customers/{id}/edit','App\Http\Controllers\backend\CustomersController@postCustomersById');
    Route::post('customers/delete','App\Http\Controllers\backend\CustomersController@delete');
    Route::get('customers/search', 'App\Http\Controllers\backend\CustomersController@Search');
    Route::post('customers/search', 'App\Http\Controllers\backend\CustomersController@Search');
     Route::get('customers/status', 'App\Http\Controllers\backend\CustomersController@Status');
    Route::post('customers/status', 'App\Http\Controllers\backend\CustomersController@Status');

    //sale order
    Route::get('saleorder', 'App\Http\Controllers\backend\SaleOrderController@SaleOrderList');
    Route::get('saleorder/add', 'App\Http\Controllers\backend\SaleOrderController@getSaleOrders');
    Route::post('saleorder/add', 'App\Http\Controllers\backend\SaleOrderController@postSaleOrders');
    Route::get('saleorder/{id}/edit','App\Http\Controllers\backend\SaleOrderController@getSaleOrdersById');
    Route::post('saleorder/{id}/edit','App\Http\Controllers\backend\SaleOrderController@postSaleOrdersById');
    Route::post('saleorder/delete','App\Http\Controllers\backend\SaleOrderController@delete');
    Route::get('saleorder/search', 'App\Http\Controllers\backend\SaleOrderController@Search');
    Route::post('saleorder/search', 'App\Http\Controllers\backend\SaleOrderController@Search');

    //sale order details
    Route::get('saleorderdetails', 'App\Http\Controllers\backend\SaleOrderDetailsController@SaleOrderDetailsList');
    Route::get('saleorderdetails/add', 'App\Http\Controllers\backend\SaleOrderDetailsController@getSaleOrderDetails');
    Route::post('saleorderdetails/add', 'App\Http\Controllers\backend\SaleOrderDetailsController@postSaleOrderDetails');
    Route::get('saleorderdetails/{id}/edit','App\Http\Controllers\backend\SaleOrderDetailsController@getSaleOrderDetailsById');
    Route::post('saleorderdetails/{id}/edit','App\Http\Controllers\backend\SaleOrderDetailsController@postSaleOrderDetailsById');
    Route::post('saleorderdetails/delete','App\Http\Controllers\backend\SaleOrderDetailsController@delete');
    Route::get('saleorderdetails/search', 'App\Http\Controllers\backend\SaleOrderDetailsController@Search');
    Route::post('saleorderdetails/search', 'App\Http\Controllers\backend\SaleOrderDetailsController@Search');   

});