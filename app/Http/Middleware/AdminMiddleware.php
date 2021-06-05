<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next)
    {
        $admin=Role::where('name', 'مسئول')->orWhere('name', 'admin')->first();
        $user=Auth::user();
        if($user->role_id==$admin->id){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
