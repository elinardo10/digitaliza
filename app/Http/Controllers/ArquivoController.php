<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Pasta;
Use App\SubPasta;
Use App\User;
Use App\Link;
use Session;

class ArquivoController extends Controller{
	
	private $pastaModel;

	public function __construct(Pasta $pasta){

		$this->pastaModel = $pasta;
        $this->middleware('auth');

    }

      public function list(){
      	 $pastas = Pasta::all();

    	return view('files.listarFolders', compact('pastas'));
    }

     public function subpasta($idPasta){

     	$pasta = $this->pastaModel->find($idPasta);
        $subpastas = $pasta->subpasta()->getQuery()->get(['id', 'subpasta']);
        return Response::json($subpastas);
      	//$pasta = Pasta::with('subpasta')->find($id);
      	//$pastas = Pasta::with('subpasta')->get();

    	return view('files.listSubpasta', ['pasta'=>$pasta, 'subpastas'=>$subpastas]);
    }

    public function formLink(){
    	$pastas = $this->pastaModel->all();
    	$usuario = User::all();

      	

    	return view('files.newLink')->with(compact('pastas','usuario'));
    }

    public function storeLink(Request $request, Link $link){
    	
    	 $insert = $link->create($request->all());

    	 if ($insert)
        return redirect()
                    ->route('folders.listar')
                    ->with('msgsuccess', 'Dados inserido com sucesso!');
 
        // Redireciona de volta com uma mensagem de erro
    	return redirect()
                ->back()
                ->with('error', 'Falha ao inserir');
      	

    }

    public function listarLink(){



    	return view('files.listLinks', ['pastas'=>$pastas]);
    }
}
