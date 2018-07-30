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
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {


    Route::post('/companies/export', 'CompanyController@export');
    Route::resource('companies', 'CompanyController');
    Route::get('/employees/datatable', 'EmployeeController@datatable')->name('employees.datatable');
    Route::get('/employees/datatable/getdata','EmployeeController@getdata')->name('employees.getdata');
    Route::get('/employees/export', 'EmployeeController@export');
    Route::resource('employees', 'EmployeeController');

});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/{name?}', 'HomeController@index')->name('home');
