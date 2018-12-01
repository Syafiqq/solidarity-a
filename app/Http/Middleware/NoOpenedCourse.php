<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class NoOpenedCourse
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
        /** @var User $user */
        $user = Auth::user();
        if ($user->hasOpenedCourse())
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['Terdapat Pekerjaan yang Belum Terselesaikan']]);
        }

        return $next($request);
    }

}
