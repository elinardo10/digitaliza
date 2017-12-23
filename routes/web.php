<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
		Route::group(['prefix' => 'sistema', 'where'=>['id'=>'[0-9]+']], function(){
		route::get('',     ['as'=> 'home', 'uses' => 'HomeController@index']);
		route::get('folders',     ['as'=> 'folders.listar', 'uses' => 'ArquivoController@list']);
		route::get('subfolders/{idPasta}',     ['as'=> 'subpasta.listar', 'uses' => 'ArquivoController@selectsub']);
		route::get('subfolder/{id}',     ['as'=> 'subpasta.lista', 'uses' => 'ArquivoController@subpasta']);
		route::get('newkink',     ['as'=> 'new.link', 'uses' => 'ArquivoController@formLink']);
		route::post('storelink',     ['as'=> 'store.link', 'uses' => 'ArquivoController@storeLink']);
		route::get('listar-links/{id}',     ['as'=> 'listar.links', 'uses' => 'ArquivoController@listarLink']);
		
 	});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
