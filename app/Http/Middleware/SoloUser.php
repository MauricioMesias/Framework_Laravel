<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        switch(auth::user()->tipo){
            case ('1'):
                return redirect('home');//Si es administrador continua al HOME
            break;
            case('2'):    
                return $next($request);//Si es un usuario continua USER
            break;
            case('3'):
                return redirect('moderador');//Si el administrador redirige al moderador
            break;    
        }
    }
}
