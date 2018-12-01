<?php namespace App\Http\Middleware;

use App\Eloquent\Answer;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidSelfReportPublish
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
        $answer = $request->route()->getParameter('answer', 0);

        /** @var Answer $answer */
        $answer = Auth::user()->answer()->where('id', '=', $answer)->first();
        if (is_null($answer))
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['Data Tidak Ditemukan']]);
        }
        else if (is_null($answer->getAttribute('finished_at')))
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['Data Belum Diselesaikan']]);
        }
        else
        {
            return $next($request);
        }
    }
}
