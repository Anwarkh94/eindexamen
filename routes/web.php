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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/'         , 'HomeController@index')->name('home');
Route::get('game/{id}' , 'HomeController@game')->name('game');

Route::prefix('/')->group(function() {

    Route::prefix('categorieën')->group(function () {
        Route::get('/'              , 'categorieenController@index')->name('categorieenController@index');
        Route::get('create'         , 'categorieenController@create')->name('categorieenController@create');
        Route::post('create'        , 'categorieenController@postCreate')->name('categorieenController@postCreate');
        Route::get('update/{model}' , 'categorieenController@update')->name('categorieenController@update');
        Route::post('update'        , 'categorieenController@postUpdate')->name('categorieenController@postUpdate');
        Route::get('delete/{model}' , 'categorieenController@postDelete')->name('categorieenController@postDelete');
    });
    // Route::prefix('gebruikers')->group(function () {
    //     Route::get('/'              , 'gebruikersController@index')->name('gebruikersController@index');
    //     Route::get('create'         , 'gebruikersController@create')->name('gebruikersController@create');
    //     Route::post('create'        , 'gebruikersController@postCreate')->name('gebruikersController@postCreate');
    //     Route::get('update/{model}' , 'gebruikersController@update')->name('gebruikersController@update');
    //     Route::post('update'        , 'gebruikersController@postUpdate')->name('gebruikersController@postUpdate');
    //     Route::get('delete/{model}' , 'gebruikersController@postDelete')->name('gebruikersController@postDelete');
    // });
    Route::prefix('spellen')->group(function () {
        Route::get('/'              , 'spellenController@index')->name('spellenController@index');
        Route::get('create'         , 'spellenController@create')->name('spellenController@create');
        Route::post('create'        , 'spellenController@postCreate')->name('spellenController@postCreate');
        Route::get('update/{model}' , 'spellenController@update')->name('spellenController@update');
        Route::post('update'        , 'spellenController@postUpdate')->name('spellenController@postUpdate');
        Route::get('delete/{model}' , 'spellenController@postDelete')->name('spellenController@postDelete');
    });
    Route::prefix('spellendev')->group(function () {
        Route::get('/'              , 'spellendevController@index')->name('spellendevController@index');
        Route::get('create'         , 'spellendevController@create')->name('spellendevController@create');
        Route::post('create'        , 'spellendevController@postCreate')->name('spellendevController@postCreate');
        Route::get('update/{model}' , 'spellendevController@update')->name('spellendevController@update');
        Route::post('update'        , 'spellendevController@postUpdate')->name('spellendevController@postUpdate');
        Route::get('delete/{model}' , 'spellendevController@postDelete')->name('spellendevController@postDelete');
    });

    










});










