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


Route::get('persons/users', 'UsersController@index');
Route::get('persons/users/new', 'UsersController@newUser');
Route::post('persons/users/new', 'UsersController@saveUser');


Route::get('poss/', 'PossController@index');
Route::get('poss/new', 'PossController@newPos');
Route::post('poss/new', 'PossController@savePos');
