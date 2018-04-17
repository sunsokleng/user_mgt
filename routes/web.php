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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index');

Route::get('/treasury', 'TreasuryController@index');
Route::get('/treasury/form/{id?}', 'TreasuryController@form');
Route::post('/treasury/save', 'TreasuryController@save');
Route::get('/treasury/delete/{id}', 'TreasuryController@delete');

Route::get('/linedepartment', 'LineDepartmentController@index');
Route::get('/linedepartment/form/{id?}', 'LineDepartmentController@form');
Route::post('/linedepartment/save', 'LineDepartmentController@save');
Route::get('/linedepartment/delete/{id}', 'LineDepartmentController@delete');

Route::get('/lineministry', 'LineMinistryController@index');
Route::get('/lineministry/form/{id?}', 'LineMinistryController@form');
Route::post('/lineministry/save', 'LineMinistryController@save');
Route::get('/lineministry/delete/{id}', 'LineMinistryController@delete');

Route::get('/national', 'NationalController@index');
Route::get('/national/form/{id?}', 'NationalController@form');
Route::post('/national/save', 'NationalController@save');
Route::get('/national/delete/{id}', 'NationalController@delete');


Route::get('/nationaluser', 'NationalUserController@index');
Route::get('/nationaluser/form/{id?}', 'NationalUserController@form');
Route::post('/nationaluser/save', 'NationalUserController@save');
Route::get('/nationaluser/delete/{id}', 'NationalUserController@delete');

Route::get('/module', 'ModuleController@index');
Route::get('/module/form/{id?}', 'ModuleController@form');
Route::post('/module/save', 'ModuleController@save');
Route::get('/module/delete/{id}', 'ModuleController@delete');

Route::get('/role', 'RoleController@index');
Route::get('/role/form/{id?}', 'RoleController@form');
Route::post('/role/save', 'RoleController@save');
Route::get('/role/delete/{id}', 'RoleController@delete');

Route::get('/position', 'PositionController@index');
Route::get('/position/form/{id?}', 'PositionController@form');
Route::post('/position/save', 'PositionController@save');
Route::get('/position/delete/{id}', 'PositionController@delete');

Route::get('/officename', 'OfficeNameController@index');
Route::get('/officename/form/{id?}', 'OfficeNameController@form');
Route::post('/officename/save', 'OfficeNameController@save');
Route::get('/officename/delete/{id}', 'OfficeNameController@delete');

Route::get('/history', 'HistoryController@index');
Route::get('/history/form/{id?}', 'HistoryController@form');
Route::post('/history/save', 'HistoryController@save');
Route::get('/history/delete/{id}', 'HistoryController@delete');

Auth::routes();

//Route::get('/home', 'HomeController@index');
