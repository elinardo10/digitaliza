<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('folders.listar'));
});

// inicio > nome da pasta dinamicamente
Breadcrumbs::register('show.pastas', function ($breadcrumbs, $id) {
	  $pasta = App\Pasta::find($id);

    $breadcrumbs->parent('home');
    $breadcrumbs->push( $pasta->pasta, route('subpasta.lista', $pasta->id));
});

// Home > nome da pasta dinamicamente > subpasta dincamica
Breadcrumbs::register('show.links', function ($breadcrumbs, $id, $pasta) {
	$subpasta = App\SubPasta::find($id);
	
    $breadcrumbs->parent('show.pastas', $pasta);
  	$breadcrumbs->push($subpasta->subpasta, route('listar.links', $subpasta->id));
   	
   
       // $breadcrumbs->push('listar links', route('listar.links', $subpasta->id));
});

/* Home > Blog > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('blog');
    $breadcrumbs->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::register('post', function ($breadcrumbs, $post) {
    $breadcrumbs->parent('category', $post->category);
    $breadcrumbs->push($post->title, route('post', $post));
});*/