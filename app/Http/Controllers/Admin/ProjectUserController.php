<?php

namespace App\Http\Controllers\Admin;

use App\ProjectUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectUserController extends Controller
{
    //

    public function store(Request $request){

        $project_id=$request->input('project_id');
        $user_id=$request->input('user_id');
        $level_id=$request->input('level_id');
        $project_user=ProjectUser::where('project_id','=',$project_id)->where('level_id','=',$level_id)->first();

        if($project_user){
            return back()->with('notification','El usuario ya pertenece a ese proyecto');
        }




        $project_user=new ProjectUser();
        $project_user->project_id=$project_id;
        $project_user->user_id=$user_id;
        $project_user->level_id=$level_id;

        $project_user->save();
        return back()->with('notification','Proyecto y Nivel Cargados Correctamente');

    }

    public function editLevel(Request $request){

        $project_user=ProjectUser::where('id','=',$request->input('project-user'))->first();

        $project_user->level_id=$request->input('level-id');
        $project_user->update();

        return back()->with('notification','nivel modificado correctamente');

    }

    public function delete($id){
        $project_user=ProjectUser::findOrFail($id);
        $project_user->delete();

        return back()->with('notification','Se elimino Correctamente');


    }
}
