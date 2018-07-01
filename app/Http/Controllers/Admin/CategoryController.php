<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    public function store(Request $request){

        $mensajes=['name.required'=>'el campo nombre es requerido'];
        $this->validate($request,[
            'name'=>'required'
        ],$mensajes);

        $category=new Category();
        $category->name=$request->input('name');
        $category->project_id=$request->input('project_id');
        $category->save();

        return back()->with('notification','Categoria cargada correctamente');


    }

    public function update(Request $request){


        $category_id=$request->input('category_id');
        $category_name=$request->input('name');

        $category=Category::findOrFail($category_id);
        $category->name=$category_name;
        $category->update();

        return back();

    }

    public function delete($id){

        $category=Category::findOrFail($id);
        $category->delete();

        return back();


    }
}
