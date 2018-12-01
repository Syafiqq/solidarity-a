<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;

abstract class ValidUser
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
        $id = $request->route()->getParameter('id', 0);
        /** @var User $user */
        $user = User::where('id', '=', $id)->first();
        if (is_null($user) || (strcmp(strval($user->getAttribute('role')), $this->getRole()) !== 0))
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ["{$this->getRoleDescription()} Tidak Dikenali"]]);
        }

        return $next($request);
    }

    /**
     * @return string
     */
    public abstract function getRole();

    /**
     * @return string
     */
    public abstract function getRoleDescription();
}
