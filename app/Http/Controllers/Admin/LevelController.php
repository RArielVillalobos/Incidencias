<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    //
    public function store(Request $request){
        $mensajes=['name.required'=>'el campo nombre es requerido'];
        $this->validate($request,[
            'name'=>'required'
        ],$mensajes);

        $level=new Level();
        $level->name=$request->input('name');
        $level->project_id=$request->input('project_id');

        $level->save();

        return back()->with('notification','Nivel cargado correctamente');


    }

    public function update(Request $request){

        $level_id=$request->input('level_id');
        $level_name=$request->input('name');
        $level=Level::findOrFail($level_id);
        $level->name=$level_name;
        $level->update();

        return back();
    }

    public function delete($id){

        $level=Level::findOrFail($id);

        $level->delete();

        return back();

    }

    public function byProject($id){
        //laravel automaticamente devolvera un JSON para el ajax
        return Level::where('project_id','=',$id)->get();

    }
}
