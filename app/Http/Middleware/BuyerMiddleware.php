<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerMiddleware
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
        $buyer=Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $user=Auth::user();
        if($user->role_id==$buyer->id&&$user->status>0){
            return $next($request);
        }else{
            return redirect()->route('home');
        }
    }
}
