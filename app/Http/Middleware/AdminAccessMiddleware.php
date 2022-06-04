<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAccessMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) return response()->redirectToRoute('login');

        if (!$user->is_admin) {
            $request->session()->put('error', 'У вас нет доступа к этому ресурсу');
            return response()->redirectToRoute('profile');
        }
        return $next($request);
    }
}
