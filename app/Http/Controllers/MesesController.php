<?php

namespace App\Http\Controllers;
Use App\Month;
Use App\SubPasta;
use Illuminate\Http\Request;

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
      $subpastas = $this->subpastaModel->find($id);
      $meses = $subpastas->month()->getQuery()->get(['id', 'name']);

    return view('meses.index', compact('meses'));
  }
}
