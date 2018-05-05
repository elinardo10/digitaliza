<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
  $breadcrumbs->push('Inicio', route('folders.listar'));
});

Breadcrumbs::register('usuarios', function ($breadcrumbs) {

  $breadcrumbs->parent('home');  
  $breadcrumbs->push('Usuários', route('user.list'));
});

Breadcrumbs::register('add_usuarios', function ($breadcrumbs) { 
  $breadcrumbs->parent('usuarios');  
  $breadcrumbs->push('+ Usuários', route('user.create'));
});

Breadcrumbs::register('edite_user', function ($breadcrumbs, $id) { 

  $user = App\User::find($id);
  $breadcrumbs->parent('usuarios');  
  $breadcrumbs->push('Editar Usuário', route('user.edit', $user->id));
});


// inicio > nome da pasta dinamicamente
Breadcrumbs::register('show.pastas', function ($breadcrumbs, $pasta) {
	  //$pasta = App\Pasta::find($id);
  $pasta = App\Pasta::where('pasta', $pasta)->first();
  $breadcrumbs->parent('home');
  $breadcrumbs->push( $pasta->pasta, route('subpasta.lista', $pasta->id));
});
// inicio > nome dos meses
Breadcrumbs::register('meses', function ($breadcrumbs, $subpastas, $pasta) {
  $pasta = Pasta::with('subpasta')->find($id);
  $subpastas = App\SubPasta::where('subpasta', $subpastas)->first();
  $breadcrumbs->parent('show.pastas', $pasta);
  $breadcrumbs->push( $subpastas->subpasta, route('meses.lista', $subpastas->id));
});

// Home > nome da pasta dinamicamente > subpasta dincamica
Breadcrumbs::register('show.links', function ($breadcrumbs, $id) {
 $subpasta = App\SubPasta::find($id);

 $breadcrumbs->parent('home');

 $breadcrumbs->push($subpasta->subpasta, route('listar.links', $subpasta->id));

       // $breadcrumbs->push('listar links', route('listar.links', $subpasta->id));
});

Breadcrumbs::register('addlink', function ($breadcrumbs) {

  $breadcrumbs->parent('home');  
  $breadcrumbs->push('Cadastrar Links', route('new.link'));
});



/* Breadcrumbs::register('links', function ($breadcrumbs, $pasta, $subpasta, $link) {
    $link = App\Link::where('link', 'id')->first();
    $breadcrumbs->parent('show.links', $pasta, $subpasta);
    $breadcrumbs->push($link->link, route('listar.links', ['link' => $link->id]));
});


  	   


Home > Blog > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});*/