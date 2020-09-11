<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('inventory-items', 'ApiController@createInventoryItem');
Route::get('students-account/{id}', 'ApiController@getStudentAccount');
Route::post('students-account/{id}', 'ApiController@updateStudentAccount');
Route::get('create-notifications', 'ApiController@createNotifications');
//Arduino Routes
Route::get('verify-rfid/{rfid}', 'ApiController@verifyRFID');
Route::get('sales-items/{rfid}/{productId}/{quantity}', 'ApiController@createSalesItem');