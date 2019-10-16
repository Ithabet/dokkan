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
Route::get('persons/customers/new', 'CustomersController@newCustomer');
Route::post('persons/customers/new', 'CustomersController@saveCustomer');


Route::get('persons/suppliers', 'SuppliersController@index');
Route::get('persons/suppliers/new', 'SuppliersController@newSupplier');
Route::post('persons/suppliers/new', 'SuppliersController@saveSupplier');

Route::get('products/', 'ProductsController@index');
Route::post('products/JSON-search', 'ProductsController@jsonsearch');

Route::get('products/categories', 'ProductsController@newCategory');
Route::post('products/categories/new', 'ProductsController@saveCategory');
Route::get('products/new', 'ProductsController@newProduct');
Route::post('products/new', 'ProductsController@saveProduct');



Route::get('purchases/', 'purchasesController@index');
Route::get('purchases/new', 'purchasesController@newPurchase');
Route::post('purchases/new', 'purchasesController@savePurchase');

Route::get('sales/', 'salesController@index');
Route::get('sales/pos', 'salesController@pos');
Route::post('sales/new', 'salesController@saveSales');

Route::get('persons/users', 'UsersController@index');
Route::get('persons/users/new', 'UsersController@newUser');
Route::post('persons/users/new', 'UsersController@saveUser');

Route::get('expenses/', 'expensesController@index');
Route::post('expenses/new', 'expensesController@saveExpenses');


Route::get('poss/', 'PossController@index');
Route::get('poss/new', 'PossController@newPos');
Route::post('poss/new', 'PossController@savePos');
