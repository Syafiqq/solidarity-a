<?php namespace App\Http\Middleware;

use Closure;

class AuthRole
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
        $role = $this->getRole($request);
        if (empty($role))
        {
            abort(404);
        }
        $request->merge(['role' => $role]);
        $request->route()->setParameter('role', $role);

        return $next($request);
    }
}
