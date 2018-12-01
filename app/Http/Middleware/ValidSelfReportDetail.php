<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidSelfReportDetail
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
        if (!$user->isDetailReportValid())
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['Anda Belum Memiliki Data']]);
        }
        else
        {
            return $next($request);
        }
    }

}
