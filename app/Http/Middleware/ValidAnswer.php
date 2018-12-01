<?php namespace App\Http\Middleware;

use App\Eloquent\QuestionOption;
use Closure;

class ValidAnswer
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
        $option = $request->get('answer', 0);
        $answer = QuestionOption::where('id', '=', $option)->count();
        if ($answer <= 0)
        {
            return redirect()->back()->with('cbk_msg', ['notify' => ['Jawaban Tidak Valid']]);
        }

        return $next($request);
    }

}
