<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;

class ValidStudentReportDetail
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
        if (is_null($user))
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['User Tidak Dikenali']]);
        }
        else if (!$user->isDetailReportValid())
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['User Belum Memiliki Data']]);
        }
        else
        {
            return $next($request);
        }
    }

}
