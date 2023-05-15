<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfHasRole
{

    public function handle(Request $request, Closure $next, $type)
    {

        if (auth()->check() && auth()->user()->userType == $type) {
            return $next($request);
        }

        return redirect(route('home'))->withErrors([$type. ' erişiminiz yok.', 'Kullanıcı: ' . auth()->user()->id]);
    }
}
