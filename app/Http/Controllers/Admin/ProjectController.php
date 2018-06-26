<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    //

    public function index(){

        //obteniendo todos los projectos incluyendo los eliminados de forma logica
        $projects=Project::withTrashed()->get();

        return view('admin.projects.index',['projects'=>$projects]);
    }

    public function store(Request $request){

        $rules=[
            'name'=>'required',
            //'description'=>'',
            'start'=>'date'
        ];

        $messages=[
            'name.required'=>'es necesario ingresar un nombre para el projecto',
            'start.date'=>'el campo de fecha debe ser una fecha valdia'
        ];

        $this->validate($request,$rules,$messages);

        $project=new Project();
        $project->name=$request->input('name');
        $project->description=$request->input('description');
        $project->start=$request->input('start');
        $project->save();

        return back()->with('notification','El projecto se cargo correctamente');


    }

    public function edit($id){
        $project=Project::findOrFail($id);
        return view('admin.projects.edit',['project'=>$project]);

    }

    public function update($id, Request $request){
        $project=Project::findOrFail($id);
        $rules=[
            'name'=>'required',
            //'description'=>'',
            'start'=>'date'
        ];

        $messages=[
            'name.required'=>'es necesario ingresar un nombre para el projecto',
            'start.date'=>'el campo de fecha debe ser una fecha valdia'
        ];

        $this->validate($request,$rules,$messages);

        $project->name=$request->input('name');
        $project->description=$request->input('description');
        $project->start=$request->input('start');
        $project->update();

        return back()->with('notification','El projecto se actualizo correctamente');


    }

    public function delete($id){
        Project::find($id)->delete();

        return back()->with('notification','El Projecto se elimino Correctamente');
    }

    public function restore($id){
        Project::withTrashed()->find($id)->restore();
        return back()->with('notification','El Projecto se Restauro Correctamente');

    }
}
