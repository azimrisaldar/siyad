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


Route::resource('category', 'CategoryController');

Route::get('view-page/{slug}',['as' => 'page-category','uses' => 'CategoryController@viewPage'], function($slug) {
    
})->where('slug', '(.*)');


Route::get('get-all-pages','CategoryController@testTree');


