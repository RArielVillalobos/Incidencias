<?php

namespace App\Http\Controllers;


use App\Incident;
use App\ProjectUser;
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
        //solamente se deben mostrar mis incidencias y las incidencias pendientes a los usuarios menos a clientes


        if($user->is_support){
            $mis_incidencias=Incident::where('project_id',$user->selected_project_id)->where('support_id',$user->id)->get();

            $projectUser=ProjectUser::where('project_id',$user->selected_project_id)->where('user_id',$user->id)->first();

            $incidencias_pendientes=Incident::where('support_id',null)->where('level_id',$projectUser->level_id)->get();
            $incidencias_report_mi=Incident::where('client_id',auth()->user()->id)->where('project_id',$user->selected_project_id)->get();
            return view('home',['mis_incidencias'=>$mis_incidencias,'incidencias_pendientes'=>$incidencias_pendientes,'incidencias_reportadas_por_mi'=>$incidencias_report_mi]);

        }


        //incidencias que estan en nuestro nivel, pero q la estan atendiendo otros usuarios


            //incidencias reportadas por mi
        $incidencias_report_mi=Incident::where('client_id',auth()->user()->id)->where('project_id',$user->selected_project_id)->get();

        return view('home',['incidencias_reportadas_por_mi'=>$incidencias_report_mi]);

        }



    public function selectProject($id){
        //podemos validar
        $user=auth()->user();
        $user->selected_project_id=$id;
        $user->save();

        return back();

    }
}
