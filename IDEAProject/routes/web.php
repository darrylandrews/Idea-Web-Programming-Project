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

Route::get('/', 'viewController@mainview');

Route::get('/login', 'AuthController@loginPage');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/register', 'AuthController@registerPage');
Route::post('/register', 'AuthController@register');

Route::get('/item/{id}', 'viewController@itemview');

Route::get('/addT', 'viewController@addTPage');
Route::post('/addT', 'viewController@addT');

Route::get('/updateT/{id}', 'viewController@updateTPage');
Route::post('/updateT/{id}', 'viewController@updateT');

Route::get('/deleteT/{id}', 'viewController@deleteT');

Route::get('/addP', 'viewController@addPPage');
Route::post('/addP', 'viewController@addP');

Route::get('/updateP/{id}', 'viewController@updatePPage');
Route::post('/updateP/{id}', 'viewController@updateP');

Route::get('/deleteP/{id}', 'viewController@deleteP');

Route::get('/detailsP/{id}', 'viewController@productDetailsView');
Route::post('/detailsP/{id}', 'viewController@productDetails');

Route::get('/cart', 'viewController@shoppingCart');
Route::post('/cart/{id}', 'viewController@shoppingCartUpdate');

Route::get('/cartD/{id}', 'viewController@cartD');

Route::get('/transaction', 'viewController@transaction');

Route::get('/transactionH', 'viewController@history');

Route::get('/updateM', 'AuthController@updateMPage');
Route::post('/updateM', 'AuthController@updateM');