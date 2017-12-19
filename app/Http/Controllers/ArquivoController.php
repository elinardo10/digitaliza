<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pasta;
Use App\SubPasta;
Use App\User;

class ArquivoController extends Controller
{	   
	public function __construct(){
        $this->middleware('auth');
    }

      public function list(){
      	$pastas = Pasta::all();

    	return view('files.listarFolders', ['pastas'=>$pastas]);
    }

     public function subpasta($id){
      	$pasta = Pasta::with('subpasta')->find($id);
      	$pastas = Pasta::with('subpasta')->get();

    	return view('files.listSubpasta', ['pasta'=>$pasta, 'pastas'=>$pastas]);
    }

    public function formLink(){
    	$pastas = Pasta::all();
    	$usuario = User::all();

      	

    	return view('files.newLink')->with(compact('pastas', 'subpasta','usuario'));
    }
}
