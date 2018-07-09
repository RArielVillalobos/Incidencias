<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //subscribiendo la funcion authenticated (se ejecuta luego d iniciar sesion)

    public function authenticated(Request $request, $user)

    {
        $user=auth()->user();
        //si es admin o cliente(osea no es de soporte) no hacemos nada
        if($user->is_admin||$user->is_client){
            return;

         // si es de soporte
        }if(!$user->selected_project_id){
            $user->selected_project_id=$user->projects->first()->id;
            $user->save();


        }

    }
}
