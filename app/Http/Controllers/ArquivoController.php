<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArquivoController extends Controller
{	   public function __construct(){
        $this->middleware('auth');
    }

      public function list(){

    	return view('files.listarFolders');
    }
}
