<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * //el handle maneja las solicitues que estan llegando
     * //el middleware podemos decir que es un gestor de solicitudes
     * //se ubica entre la peticion del usuario y el controlador, es como un punto intermedio
     * Handle an incoming request.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(auth()->user()->role !=0){
            return redirect('/home');

        } else{
            return $next($request);
        }


    }
}
