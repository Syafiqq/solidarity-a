<?php namespace App\Http\Middleware;

use Closure;

class Debug
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!config('app.debug', false))
        {
            return abort(404);
        }

        return $next($request);
    }

}
