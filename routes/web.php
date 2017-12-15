<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
		Route::group(['prefix' => 'sistema', 'where'=>['id'=>'[0-9]+']], function(){
		route::get('',     ['as'=> 'home', 'uses' => 'HomeController@index']);
		route::get('arquivos',     ['as'=> 'folders.listar', 'uses' => 'ArquivoController@list']);
		

		Route::get('addimage/{id}', ['as' => 'add_image', 'uses' => 'ImagemController@getForm']);
		Route::post('addimage', array('as' => 'add_image_to_album', 'uses' => 'ImagemController@postAdd'));
		Route::get('deleteimage/{id}', array('as' => 'delete_image', 'uses' => 'ImagemController@getDelete'));
 	});

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
