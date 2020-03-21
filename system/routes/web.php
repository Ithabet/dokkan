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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('persons/customers', 'CustomersController@index');
Route::get('persons/customer/{customer}', 'CustomersController@customer');
Route::get('persons/customers/new', 'CustomersController@newCustomer');
Route::post('persons/customers/new', 'CustomersController@saveCustomer');
Route::get('persons/customers/edit/{id}', 'CustomersController@edit');
Route::post('persons/customers/update/{id}', 'CustomersController@update');
Route::get('persons/customers/delete/{id}', 'CustomersController@destroy');





Route::get('persons/suppliers', 'SuppliersController@index');
Route::get('persons/suppliers/new', 'SuppliersController@newSupplier');
Route::post('persons/suppliers/new', 'SuppliersController@saveSupplier');
Route::get('persons/suppliers/edit/{id}', 'SuppliersController@edit');
Route::post('persons/suppliers/update/{id}', 'SuppliersController@update');
Route::get('persons/suppliers/delete/{id}', 'SuppliersController@destroy');




Route::get('products/', 'ProductsController@index');
Route::post('products/JSON-search', 'ProductsController@jsonsearch');
Route::post('products/getAjaxProducts', 'ProductsController@getAjaxProducts');
Route::post('products/getAjaxPProducts', 'ProductsController@getAjaxPProducts');

Route::get('products/categories', 'ProductsController@newCategory');
Route::post('products/categories/new', 'ProductsController@saveCategory');
Route::get('products/new', 'ProductsController@newProduct');
Route::post('products/new', 'ProductsController@saveProduct');



Route::get('purchases/', 'PurchasesController@index');
Route::get('purchases/new', 'PurchasesController@newPurchase');
Route::post('purchases/new', 'PurchasesController@savePurchase');
Route::get('purchase/print/receipt/{purchase}', 'PurchasesController@receipt');

Route::get('sales/', 'salesController@index');
Route::get('sales/pos', 'salesController@pos');
Route::post('sales/new', 'salesController@saveSales');
Route::get('sales/print/receipt/{sale}', 'salesController@receipt');


Route::get('persons/users', 'UsersController@index');
Route::get('persons/users/new', 'UsersController@newUser');
Route::post('persons/users/new', 'UsersController@saveUser');

Route::get('expenses/', 'expensesController@index');
Route::post('expenses/new', 'expensesController@store');
Route::get('expenses/edit/{id}', 'expensesController@edit');
Route::post('expenses/update/{id}', 'expensesController@update');
Route::get('expenses/delete/{id}', 'expensesController@destroy');


Route::get('withdrawals/', 'WithdrawalsController@index');
Route::post('withdrawals/new', 'WithdrawalsController@store');
Route::get('withdrawals/edit/{id}', 'WithdrawalsController@edit');
Route::post('withdrawals/update/{id}', 'WithdrawalsController@update');
Route::get('withdrawals/delete/{id}', 'WithdrawalsController@destroy');

Route::get('deposits/', 'DepositsController@index');
Route::post('deposits/new', 'DepositsController@store');
Route::get('deposits/edit/{id}', 'DepositsController@edit');
Route::post('deposits/update/{id}', 'DepositsController@update');
Route::get('deposits/delete/{id}', 'DepositsController@destroy');



Route::get('poss/', 'PossController@index');
Route::get('poss/new', 'PossController@newPos');
Route::post('poss/new', 'PossController@savePos');

Route::group(['prefix' => 'reports'], function() {

    Route::get('sales','ReportController@sales');
    Route::post('sales','ReportController@sales');
    Route::get('purchases','ReportController@purchases');
    Route::post('purchases','ReportController@purchases');
    Route::get('expenses','ReportController@expenses');
    Route::post('expenses','ReportController@expenses');
    Route::get('cash','ReportController@cash');
    Route::post('cash','ReportController@cash');



});

