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

Auth::routes();
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/notifications', 'NotificationController@index')->name('notifications');
Route::get('/students-accounts', 'StudentsAccountsController@index')->name('students-accounts');
Route::get('/sales-and-inventory', 'SalesAndInventoryController@index')->name('sales-and-inventory');

