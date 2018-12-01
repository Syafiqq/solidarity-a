<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class FinishedOpenedQuestion
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
        /** @var Collection $summary */
        $summary = Auth::user()->getAttribute('answer')->last()->answer_detail()->whereNull('answer')->lists('question');

        if (count($summary) !== 0)
        {
            $summary = json_encode($summary);

            return redirect()->back()->with('cbk_msg', ['notify' => ["Pertanyaan ${summary} Belum Terjawab"]]);
        }

        return $next($request);
    }

}
