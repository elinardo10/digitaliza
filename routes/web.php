<?php

Route::get('/', function () {
	return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'sistema', 'where'=>['id'=>'[0-9]+']], function(){
		route::get('',     ['as'=> 'folders.listar', 'uses' => 'ArquivoController@list']);
		route::get('subfolders/{idPasta}', ['as'=> 'subpasta.listar', 'uses' => 'ArquivoController@selectsub']);
		route::get('folder/subfolder/{id}', ['as'=> 'subpasta.lista', 'uses' => 'ArquivoController@subpasta']);
		route::get('folder/novo', ['as'=> 'pasta.new', 'uses' => 'ArquivoController@create'])->middleware('can:create-link');
		route::post('storefolder', ['as'=> 'store.folder', 'uses' => 'ArquivoController@store']);
		// Meses controllers
		route::get('meses/{idSubPasta}', ['as'=> 'meses.listar', 'uses' => 'MesesController@selectMonth']);
		route::get('folder/subfolder/meses/{id}',     ['as'=> 'meses.lista', 'uses' => 'MesesController@index']);


		// links controllers
		route::get('folder/subfolder/meses/listar-links/{id}',     ['as'=> 'listar.links', 'uses' => 'LinkController@listarLink']);
		route::get('newkink',     ['as'=> 'new.link', 'uses' => 'LinkController@formLink'])
		->middleware('can:create-link');
		route::post('storelink', ['as'=> 'store.link', 'uses' => 'LinkController@store'])
		->middleware('can:create-link');
		route::get('search', ['as'=> 'search', 'uses' => 'LinkController@search']);
		route::get('pesquisarlink', ['as'=> 'search.autocomplete', 'uses' => 'LinkController@pesquisarLink']);
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
