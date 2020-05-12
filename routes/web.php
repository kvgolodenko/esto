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
    return view('welcome');
});

Route::get('/getUsers', function () {
    return view('welcome');
});

Route::get('/addUser', 'UserController@add');
Route::get('/getUser/{id}', 'UserController@get');
Route::get('/randomUserName/{lenght}', 'UserController@randomUserName');
Route::get('/getTenLastUsers', 'UserController@getTenLastUsers');
Route::get('/getTransactions/{id}', 'TransactionController@getTransactionsByUserId');
Route::get('/getLastUsersAmounts', 'TransactionController@getLastUsersAmounts');





