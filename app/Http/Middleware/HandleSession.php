<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;

class HandleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();

        if (empty($_SESSION)) {
               return redirect(url('logout'));
        }   

        return $next($request);
    }
}
