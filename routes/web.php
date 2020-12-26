<?php

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
    return view('welcome2');
});
Route::resource('admin_type','AdminTypeController');
Route::resource('user','UserController');
Route::resource('process','ProcessController');
Route::resource('designation','DesignationController');
Route::resource('employee','EmployeeController');



// Excel Import Designation
Route::get('importDesignation', 'ExcelController@importDesignation')->name('importDesignation');
Route::post('product.price.inventory.index', 'ExcelController@storeDesignation')->name('storeDesignation');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');
//Product
Route::resource('product','ProductController');
//Product Price
Route::resource('product.price','PriceController');
//Prodcut Inventory
Route::resource('product.price.inventory','InventoryController');
//Color
Route::resource('color','ColorController');
//Guest User
Route::get('product.guest','GuestController@product')->name('guest.product');
Route::get('{product}/color/','GuestController@color')->name('guest.color');