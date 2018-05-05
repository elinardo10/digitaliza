<?php

namespace App\Http\Controllers;
Use App\Month;
Use App\Pasta;
Use App\SubPasta;
use Illuminate\Http\Request;
use Session;
use Gate;
use Illuminate\Support\Facades\Response;

class MesesController extends Controller
{
  private $monthModel;
  private $subpastaModel;

  public function __construct(Month $mes, SubPasta $subpasta )
  {

    $this->monthModel = $mes;
    $this->subpastaModel = $subpasta;
    $this->middleware('auth');

  }

  public function index($id){
    //$meses = $this->monthModel->all();
    $pasta = Pasta::all();
    $subpastas = $this->subpastaModel->find($id);
    $meses = $subpastas->month()->getQuery()->get(['id', 'name']);

    return view('meses.index', compact('meses','subpastas','pasta'));
  }

  public function selectMonth($idSubPasta){

    $subpasta = $this->subpastaModel->find($idSubPasta);
    $meses = $subpasta->month()->getQuery()->get(['id', 'name','subpasta_id']);
    return Response::json($meses);

  }

}
