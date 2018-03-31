<?php

namespace App\Http\Controllers;
Use App\User;
Use App\Link;
Use App\Month;
use Gate;
use Session;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    	private $monthModel;
	    private $linkModel;

	    public function __construct(Month $mes, Link $link )
	{

		$this->monthModel = $mes;
		$this->linkModel = $link;
        $this->middleware('auth');

  }

    public function listarLink($id){

  $meses = $this->monthModel->find($id);
  $links = $meses->link()->get();

        /*if(Gate::denies('view_link')) {
        $subpasta = $subpasta->where('user_id', Auth::user()->id);
    }
    $pasta = $subpasta->paginate(10);*/

    return view('files.listLinks')->with(compact('links', 'meses'));
  }

 public function destroy($id){
   $link = Link::find($id);

   if(empty($link)) {

     return redirect()->route('listar.links', $link->id)->withErrors(['O link não foi localizado']);
   }

   if( Gate::denies('delete_link', $link) ){
    return redirect()->route('listar.links', $link->id )->withErrors(['você não tem permissão para excluir esse item.']);
  }

  $link->delete();

  return redirect()->route('folders.listar' )->with('msgsuccess', 'link deletado com sucesso');
}

}
