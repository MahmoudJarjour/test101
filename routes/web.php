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
Route::get('/mood',function(){
    return view('master');

});
Route::group(['prefix' =>LaravelLocalization::setLocale() ,
    'middleware' =>  'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],function() {


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');




Route::get('fillable','CroudController@getvalues');



    Route::group(['prefix' => 'offers'], function () {
        // Route::get('store','CroudController@store'); // store data Manually (controller data as associative array)

        Route::get('create', 'CroudController@create')->name('create');
        Route::post('store', 'CroudController@store')->name("offers.store");


        Route::get('Edit/{id}', 'CroudController@editOffer');
        Route::post('Update/{id}', 'CroudController@updateOffer')->name("offers.update");
        Route::get('delete/{id}', 'CroudController@deleteOffer')->name("offers.delete");



        Route::get('all', 'CroudController@getAllOffers');

        Route::get('youtube','EventListenerVideo@getVideo');


    });



});
