<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use const http\Client\Curl\AUTH_ANY;

class OrganizerMiddleware
{
    public function handle($request, Closure $next)
    {

        if (Auth::check() && Auth::user()->is_sponsor == 1) {
            return $next($request);
        }

        abort(404);
        // сюда перенаправляется неавторизованный пользователь
        // если хочет указать закрытый маршрут
	    //return redirect()->route('login');
    }
}
