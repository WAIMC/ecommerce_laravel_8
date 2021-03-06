<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard='adminAuth')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route('admin.login');
        }
        $name = $request->route()->getName();
        if(Auth::guard('adminAuth')->user()->cant($name)){
            abort(403,'Unauthorized');
        }
        return $next($request);
    }
}
