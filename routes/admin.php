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
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::post('logouts', 'LoginController@logouts')
    ->name('logouts');


     ######################### Begin Type Route ########################
    Route::group(['prefix' => 'type'], function () {
        Route::get('/','TypeController@index') -> name('admin.type');
        Route::get('create','TypeController@create') -> name('admin.type.create');
        Route::post('store','TypeController@store') -> name('admin.type.store');
        Route::get('edit/{id}','TypeController@edit') -> name('admin.type.edit');
        Route::post('update/{id}','TypeController@update') -> name('admin.type.update');
        Route::get('delete/{id}','TypeController@destroy') -> name('admin.type.delete');
    });

     ######################### Begin Languages Route ########################
     Route::group(['prefix' => 'languages'], function () {
        Route::get('/','LanguagesController@index') -> name('admin.languages');
        Route::get('create','LanguagesController@create') -> name('admin.languages.create');
        Route::post('store','LanguagesController@store') -> name('admin.languages.store');

        Route::get('edit/{id}','LanguagesController@edit') -> name('admin.languages.edit');
        Route::post('update/{id}','LanguagesController@update') -> name('admin.languages.update');

        Route::get('delete/{id}','LanguagesController@destroy') -> name('admin.languages.delete');


    });
    ######################### End Languages Route ########################
     ######################### Begin Main Categoris Routes ########################
     Route::group(['prefix' => 'main_categories'], function () {
        Route::get('/','MainCategoriesController@index') -> name('admin.maincategories');
        Route::get('create','MainCategoriesController@create') -> name('admin.maincategories.create');
        Route::post('store','MainCategoriesController@store') -> name('admin.maincategories.store');
        Route::get('edit/{id}','MainCategoriesController@edit') -> name('admin.maincategories.edit');
        Route::post('update/{id}','MainCategoriesController@update') -> name('admin.maincategories.update');
        Route::get('delete/{id}','MainCategoriesController@destroy') -> name('admin.maincategories.delete');
        Route::get('changeStatus/{id}','MainCategoriesController@changeStatus') -> name('admin.maincategories.status');

    });
    ######################### End  Main Categoris Routes  ########################
    
    ######################### Begin vendors Routes ########################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/','productsController@index') -> name('admin.vendors');
        Route::get('create','productsController@create') -> name('admin.vendors.create');
        Route::post('store','productsController@store') -> name('admin.vendors.store');
        Route::get('edit/{id}','productsController@edit') -> name('admin.vendors.edit');
        Route::post('update/{id}','productsController@update') -> name('admin.vendors.update');
        Route::get('delete/{id}','productsController@destroy') -> name('admin.vendors.delete');
    });
    ######################### End  vendors Routes  ########################

    });
    
   


Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {

    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
 
 });