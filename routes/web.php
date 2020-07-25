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

Route::get('/', 'DashboardController@landing');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cms', 'middleware' => 'auth'],function() {
	Route::get('/','DashboardController@index');
	Route::resource('portfolio-category', 'PortfolioCategoryController');
	Route::resource('portfolio', 'PortfolioController');

});
