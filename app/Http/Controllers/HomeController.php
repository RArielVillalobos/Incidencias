<?php

namespace App\Http\Controllers;


use App\Incident;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $incidencias=Incident::where('project_id',$user->selected_project_id)->where('support_id',$user->id)->get();



        return view('home',['incidencias'=>$incidencias]);
    }



    public function selectProject($id){
        //podemos validar
        $user=auth()->user();
        $user->selected_project_id=$id;
        $user->save();

        return back();

    }
}
