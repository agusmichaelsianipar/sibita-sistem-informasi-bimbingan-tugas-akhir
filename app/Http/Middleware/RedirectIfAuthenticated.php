<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch($guard){
            case 'dosen':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('dosen.dashboard');
                }
            break;
            case 'mahasiswa':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('mahasiswa.dashboard');
                }
            break;
            case 'superadmin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('superadmin.beranda');
                }
            break;
            default:
            if (Auth::guard($guard)->check()) {
                return redirect('/');
            }
        break;
        }
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        return $next($request);
    }
}
