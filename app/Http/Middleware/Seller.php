<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Seller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guest())
        {
            if(!Auth::user()->permission === 2)
            {
                abort(403, 'Unauthorized action.');
            }else{
                return $next($request);
            }
        }else{
            //return redirect('/login');
            var_dump($next($request));
        }
        return $next($request);

    }
}
