<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class ValidOpenedCourseQuestion
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
        $question = $request->route()->getParameter('question', 0);

        /** @var User $user */
        $user   = Auth::user();
        $answer = $user->GetAnswerDetail($question);
        if (is_null($answer))
        {
            abort(404);
        }
        $request->route()->setParameter('answer', $answer);

        return $next($request);
    }

}
