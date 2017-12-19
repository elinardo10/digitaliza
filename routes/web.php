<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
		Route::group(['prefix' => 'sistema', 'where'=>['id'=>'[0-9]+']], function(){
		route::get('',     ['as'=> 'home', 'uses' => 'HomeController@index']);
		route::get('folders',     ['as'=> 'folders.listar', 'uses' => 'ArquivoController@list']);
		route::get('subfolders/{id}',     ['as'=> 'subpasta.listar', 'uses' => 'ArquivoController@subpasta']);
		route::get('newkink',     ['as'=> 'new.link', 'uses' => 'ArquivoController@formLink']);
		
 	});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
