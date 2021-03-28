<?php

    namespace App\Http\Middleware;
    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class Admin {
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
                $user = Auth::user();
                if($user->permission === 1)  // label 2 is seller , 1 is admin and also 3 is customer
                {
                    return $next($request);
                }else{
                    abort(403, 'Unauthorized action.');
                }
            }else{
                return redirect('/login');

            }
            return $next($request);
        }
    }
