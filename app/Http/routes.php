<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

// Route::get('/home', 'HomeController@index');
Route::get('/home', 'DashboardController@index');

Route::get('/users', 'UserModuleController@index');

#### System Settings Module
Route::get('/views', 'ViewsController@index');
Route::get('/load-views', 'ViewsController@loadViews');
Route::post('/add-view', 'ViewsController@store');
Route::get('/menu', 'MenuController@index');
Route::get('/parent-views', 'ViewsController@parentViews');