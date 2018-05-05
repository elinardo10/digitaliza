<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormFoldersRequest;
use Auth;
Use App\Pasta;
Use App\SubPasta;
Use App\Month;
Use App\User;
Use App\Link;
use Session;
use Gate;
use Illuminate\Support\Facades\Response;


class ArquivoController extends Controller{
	
	private $pastaModel;
	private $subpastaModel;
  private $monthModel;

  public function __construct(Pasta $pasta, SubPasta $subpasta, Month $mes){

    $this->pastaModel = $pasta;
    $this->subpastaModel = $subpasta;
    $this->monthModel = $mes;
    $this->middleware('auth');

  }

  public function list(){
    $pastas = $this->pastaModel->all();

    return view('files.listarFolders', compact('pastas'));
  }


  public function create(){


    return view('files.newFolder');
  }

  public function store(FormFoldersRequest $request, Pasta $pasta){

    $insert = $pasta->create($request->all());
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
