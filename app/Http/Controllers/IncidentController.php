<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Category;

class IncidentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report(){
        $categories=Category::where('project_id','=',1)->get();
        return view('report',['categories'=>$categories]);
    }

    public function postReport(Request $request){
        //el primer parametro es la peticion,el segundo son las reglas y el tercero los mensajes
        $this->validate($request,[
            //que el id de la categoria exista en la base de datos(columna id)
            //nullable cuando category_id este vacio(si pasa un 0 o 100 no pasara la valid) lo dejara pasar para que le asignemos un valor
            'category_id'=>'nullable|exists:categories,id',
            'severity'=>'required|in:M,N,A',
            'title'=>'required|min:5',
            'description'=>'required|min:15'

        ],[
            'category_id.exists'=>'La Categoria Seleccionada no es valida',
            'severity.required'=>'el capo Severidad es Requerido',
            'title.required'=>'el campo titulo es requerido',
            'title.min'=>'el capo titutlo debe ser minimo es de 5 caracteres',
            'description.required'=>'el campo descripcion es requerido'
        ]);


        $incident=new Incident();
        $incident->title=$request->input('title');
        $incident->severity=$request->input('severity');
        //si el valor de la categoria es 0 que sea null
        $incident->category_id=$request->input('category_id') ?: null;
        $incident->description=$request->input('description');

        $incident->client_id=auth()->user()->id;
        $incident->save();

        return back();

    }
}
