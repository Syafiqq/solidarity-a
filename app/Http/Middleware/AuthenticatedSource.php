<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSource
{
    use RoleSegmentManager;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        /** @var User $auth */
        $auth = Auth::user();
        if (strcmp((!$auth ?: $auth->getAttribute('role') ?: null), $this->getRole($request)) != 0)
        {
            abort(404);
        }

        return $next($request);
    }

}
