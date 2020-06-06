<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;
use Illuminate\Support\Facades\Auth as auth;
class isAdmin
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
        // session_start();

        if ($_SESSION['id_level'] === 2) {
            return redirect(url('logout'));
        }
        
        return $next($request);
    }
}
