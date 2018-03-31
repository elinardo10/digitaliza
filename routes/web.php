<?php

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
		Route::group(['prefix' => 'sistema', 'where'=>['id'=>'[0-9]+']], function(){
		//route::get('',     ['as'=> 'home', 'uses' => 'HomeController@index']);
		route::get('folders',     ['as'=> 'folders.listar', 'uses' => 'ArquivoController@list']);
		route::get('subfolders/{idPasta}',     ['as'=> 'subpasta.listar', 'uses' => 'ArquivoController@selectsub']);
		route::get('folder/subfolder/{id}',     ['as'=> 'subpasta.lista', 'uses' => 'ArquivoController@subpasta']);
		// Meses controllers
		route::get('folder/subfolder/meses/{id}',     ['as'=> 'meses.lista', 'uses' => 'MesesController@index']);


		// links controllers
		route::get('folder/subfolder/meses/listar-links/{id}',     ['as'=> 'listar.links', 'uses' => 'LinkController@listarLink']);
		route::get('newkink',     ['as'=> 'new.link', 'uses' => 'ArquivoController@formLink'])
				  ->middleware('can:create-link');
		route::post('storelink',     ['as'=> 'store.link', 'uses' => 'ArquivoController@storeLink'])
				  ->middleware('can:create-link');
		
		route::get('deletarlink/{id}',     ['as'=> 'link.delete', 'uses' => 'LinkController@destroy']);

		
		// usuarios do sistema
		route::get('usuarios',     ['as'=> 'user.list', 'uses' => 'UserController@index'])
				  ->middleware('can:create-link');
	    route::get('usuarios/novo',     ['as'=> 'user.create', 'uses' => 'UserController@create'])
				  ->middleware('can:create-link');
	    route::post('usuarios/store',     ['as'=> 'user.store', 'uses' => 'UserController@store'])
				  ->middleware('can:create-link');
	    route::get('editaruser/{id}/edit',     ['as'=> 'user.edit', 'uses' => 'UserController@edit']);
	    route::post('updateuser/{id}',     ['as'=> 'user.update', 'uses' => 'UserController@update']);
		route::get('deletaruser/{id}',     ['as'=> 'user.delete', 'uses' => 'UserController@destroy']);
 	});

});

Auth::routes();
