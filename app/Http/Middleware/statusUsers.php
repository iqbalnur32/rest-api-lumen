<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Closure;
use App\Models\UsersPetani;
use App\ResponseHandler;

class statusUsers
{
    public function __construct(Request $request)
    {
        $this->respHandler = new ResponseHandler;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $check = UsersPetani::where('status', 'Tidak Aktif')->get();

        if ($check) {

            return $this->respHandler->resError(401, 'Error', 'Status Anda Tidak Aktif');
        }   

        return $next($request);
    }
}
