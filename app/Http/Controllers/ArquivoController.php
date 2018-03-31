<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormLinkRequest;
use Auth;
Use App\Pasta;
Use App\SubPasta;
Use App\User;
Use App\Link;
use Session;
use Gate;
use Illuminate\Support\Facades\Response;


class ArquivoController extends Controller{
	
	private $pastaModel;
	private $subpastaModel;

	public function __construct(Pasta $pasta, SubPasta $subpasta){

		$this->pastaModel = $pasta;
		$this->subpastaModel = $subpasta;
    $this->middleware('auth');

  }

  public function list(){
    $pastas = $this->pastaModel->all();

    return view('files.listarFolders', compact('pastas'));
  }

  public function formLink(){


   $pastas = $this->pastaModel->all();
   $usuario = User::all();

   return view('files.newLink')->with(compact('pastas','usuario'));
 }

 public function storeLink(FormLinkRequest $request, Link $link){
   
  $insert = $link->create($request->all());
    	 //$link->pasta()->createMany(Request::all());

  if ($insert)
    return redirect()
  ->route('folders.listar')
  ->with('msgsuccess', 'Dados inserido com sucesso!');
  
        // Redireciona de volta com uma mensagem de erro
  return redirect()
  ->back()
  ->with('error', 'Falha ao inserir');
  

}

public function selectsub($idPasta){
  
  $pasta = $this->pastaModel->find($idPasta);
  $subpastas = $pasta->subpasta()->getQuery()->get(['id', 'subpasta','pasta_id']);
  return Response::json($subpastas);
      	//$pasta = Pasta::with('subpasta')->find($id);
      	//$pastas = Pasta::with('subpasta')->get();*/

  
  
}

public function subpasta($id){
  
  $pasta = $this->pastaModel->find($id);
  $subpastas = $pasta->subpasta()->getQuery()->get(['id', 'subpasta']);
  
      	//$pasta = Pasta::with('subpasta')->find($id);
      	//$pastas = Pasta::with('subpasta')->get();

  return view('files.listSubpasta', ['pasta'=>$pasta, 'subpastas'=>$subpastas]);

}




}
