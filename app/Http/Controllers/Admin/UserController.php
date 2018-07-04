<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\ProjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
        $users=User::where('role','=',1)->get();

        return view('admin.users.index',['users'=>$users]);
    }

    public function store(Request $request){
        $messages=[
          'name.required'=>'El nombre es Requerido',
          'name.max'=>'El nombre no debe superar los 255 caracteres',
          'email.required'=>'El Email es Requerido',
          'email.email'=>'El Campo Email Debe ser un Correo Electronico',
          'email.unique'=>'Ya existe un usuario con ese email',
          'password.required'=>'El Password es Requerido'
        ];
        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],$messages);

        //CREANDO USUARIO DE SOPORTE
        $user=new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('passwod'));
        $user->role=1;
        $user->save();



        return back()->with('notification','El usuario fue creado correctamente');
    }

    public function edit($id){
        $user=User::findorFail($id);
        $projects=Project::all();
        $projects_users=ProjectUser::where('user_id','=',$id)->get();


        return view('admin.users.edit',['user'=>$user,'projects'=>$projects,'projects_users'=>$projects_users]);
    }

    public function update($id,Request $request){
        $messages=[
            'name.required'=>'El nombre es Requerido',
            'password.min'=>'La Contraseña debe tener un minimo de 6 caracteres',


        ];
        $this->validate($request,[
            'name' => 'required|max:255',



        ],$messages);


        $user=User::find($id);
        $user->name=$request->input('name');
        $password=$request->input('password');
        if($password){
            $user->password=bcrypt($password);

        }
        $user->save();




        return back()->with('notification','Usuario Modificado Correctamente');
    }

    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        return back()->with('notification','Usuario Eliminado');

    }
}
