<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
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
		$users = $this->userModel->paginate(10);


		return view('usuarios.index', compact('users'));
	}

	public function create()
	{
		$roles = Role::orderBy('name')->pluck('name', 'id');
		return view('usuarios.create', compact('roles'));
	}

	public function store(UserRequest $request )
	{	
		$insert = $request->only('name', 'email','password', 'role');

		$user = User::create([
			'name' => $insert['name'],
			'email' => $insert['email'],
			'password' => bcrypt($insert['password']),

		]);
		$user->roles()->attach($insert['role']);
         //return $user;

		Session::flash('msgsuccess', 'Usuário Cadastrado com Sucesso!');
		return redirect()->route('user.list');
	}

	public function edit($id)
	{
		$roles = Role::select('id', 'name', 'label')->get();
		$roles = $roles->pluck('label', 'name');
		$user = User::with('roles')->select('id', 'name', 'email')->findOrFail($id);
		$user_roles = [];
		foreach ($user->roles as $role) {
			$user_roles[] = $role->name;
		}

		return view('usuarios.edit', compact('user', 'roles', 'user_roles'));
	}

	public function update(UserRequest $request, $id)
	{   
		$data = $request->only('name', 'email','password', 'role');
		$data = $request->except('password');
		if ($request->has('password')) {
			$data['password'] = bcrypt($request->password);
		}
		$user = User::findOrFail($id);
		$user->update($data);


		 $user->roles()->detach();
		 
        foreach ($request->role as $role) {
            $user->assignRole($role);
        }

		
		

		Session::flash('msgsuccess', 'Usuário alterado com sucesso!');
		return redirect()->route('user.list');
	}

	public function destroy($id){
		$user = $this->userModel->find($id);

		if(empty($user)) {

			return redirect()->route('user.list', $user->id)->withErrors(['Usuário não encontrado']);
		}

		$user->delete();

		return redirect()->route('user.list' )->with('msgsuccess', 'Usuário deletado com sucesso');
	}
}
