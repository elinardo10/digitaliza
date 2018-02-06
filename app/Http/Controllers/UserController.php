<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
Use App\Role;
use Session;

class UserController extends Controller
{
    private $userModel;
	

	public function __construct(User $user){

		$this->userModel = $user;
        $this->middleware('auth');

    }

      public function index()
      {
      	$users = $this->userModel->all();

    	return view('usuarios.index', compact('users'));
      }

       public function editform($id)
      {
      	$user = User::with('roles')->find($id);
      	//$user = $this->userModel->find($id);
      	$roles = Role::orderBy('name')->pluck('name', 'id');

    	return view('usuarios.edit', compact('user', 'roles'));
      }

       public function update(Request $request, $id)
      {
      	$user = $this->userModel->find($id);
      	
      	
      
      	

    	Session::flash('msgsuccess', 'Usuário alterado com sucesso!');
	 	return redirect()->route('user.list')->with(compact('user', 'roles'));
      }

        public function destroy($id){
    	$user = $this->userModel->find($id);

    	if(empty($user)) {

    	return redirect()->route('user.list', $user->id)->withErrors(['Usuário não encontrado']);
        }

		$user->delete();

        return redirect()->route('folders.listar' )->with('msgsuccess', 'Usuário deletado com sucesso');
    }
}
