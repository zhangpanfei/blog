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
/*Route::any('Admin/login','Admin\LoginController@login');

Route::get('Admin/getCode','Admin\LoginController@getCode');

Route::get('test','Admin\LoginController@test');

Route::get('Admin/Index','Admin\IndexController@index');
Route::get('Admin/Index/info',function(){return view('Admin.info');});

Route::controller('Admin/Index','Admin\IndexController');*/
Route::controller('admin/login','admin\LoginController');
Route::group(['prefix'=>'admin','namespace'=>'admin','middleware'=>['web','login']],function(){
    Route::controller('index','IndexController');
    Route::resource('cate','CategoryController');
});
