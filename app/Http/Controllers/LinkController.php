<?php

namespace App\Http\Controllers;
use App\Http\Requests\FormLinkRequest;
use Illuminate\Support\Facades\Input;
Use App\User;
Use App\Link;
Use App\Pasta;
Use App\SubPasta;
Use App\Month;
use Gate;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LinkController extends Controller
{
	private $monthModel;
	private $linkModel;
	private $pastaModel;
	private $subpastaModel;

	public function __construct(Month $mes, Link $link, Pasta $pasta, SubPasta $subpasta )
	{

		$this->monthModel = $mes;
		$this->linkModel = $link;
		$this->pastaModel = $pasta;
		$this->subpastaModel = $subpasta;
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

public function formLink(){


	$pastas = $this->pastaModel->all();
	$usuario = User::all();

	return view('files.newLink')->with(compact('pastas','usuario'));
}

public function store(FormLinkRequest $request, Link $link){
	
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


public function search(Request $request){

	 $links = Link::search($request->search)->get();

	 return view('pesquisar')->with(compact('links'));
    /*  $links = Link::all();
  return response()->json($links);

	
	$term = $request->term;
        $links = Link::where('nome', 'LIKE', '%' . $term . '%')->get();
        //return response()->json($links);
     if (count($links) == 0) {
        	$result[] = 'Nenhum dado encontrado';
        }else{
        	foreach ($links as $key => $value) {
        		$result[] = $value->nome;
        	}
        }
        return $result;
	  return $availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];*/
}

public function pesquisarLink(){
		//$links = Link::all();
		return view('pesquisar');
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
