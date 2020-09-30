<?php

namespace App\Http\Middleware;

use Closure;
use carbon\carbon;

use Auth;

class mainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles){

        //cara Ke 1
        
    //         $roles = $this->checkRoute($request->route());
            
    //         if($request->user()->userRole($roles) || !$roles)
    //         {
    //             return $next($request);
    //         }
    //         return abort(403, 'Anda tidak memiliki hak akses');
    //     }

    // private function checkRoute($route)
    // {
    //     $actions = $route->getAction();
    //     return isset($actions['mainMiddleware']) ? $actions['mainMiddleware'] : null;
    // }
    // dd($roles);
    //uncomment sampai sini

    //cara ke-2
    foreach ($roles as $role) {

        // dd($role);
        if ($request->user()->hasRole($role)  || !$roles) {
        return $next($request);
        }
    }
    return abort(403, 'Anda tidak memiliki hak akses');
}
//uncomment sampai sini
}
    


