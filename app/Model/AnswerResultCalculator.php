<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 02 December 2017, 6:53 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Model;


use App\Eloquent\Answer;
use App\Eloquent\AnswerDetail;
use App\Eloquent\AnswerResult;
use App\Eloquent\Question;
use Illuminate\Support\Facades\DB;

trait AnswerResultCalculator
{
    public function calculate(Answer $answer)
    {
        /** @var AnswerResult $answer_results */
        $answer_results = $answer->getAttribute('answer_result');
        /** @var AnswerDetail $answer_scope */
        /** @var AnswerResult $answer_result */
        foreach ($answer_results as $answer_result)
        {
            $answer_scope = DB::table('answer_details')
                ->leftJoin('questions', 'questions.id', '=', 'answer_details.question')
                ->where('questions.category', '=', $answer_result->getAttribute('category'))
                ->where('answer_details.answer_code', '=', $answer->getAttribute('id'))
                ->get([DB::raw("COUNT(`answer_details`.`id`) AS 'count'"), DB::raw("MAX(`answer_details`.`scale`) AS 'max'")])[0];

            $answer_details = AnswerDetail::where('answer_code', '=', $answer->getAttribute('id'))->whereIn('question', Question::where('category', '=', $answer_result->getAttribute('category'))->lists('id'))->get();
            $result         = 0.0;
            /** @var AnswerDetail $answer_detail */
            foreach ($answer_details as $answer_detail)
            {
                $result += is_null($answer_detail->getAttribute('answer')) ? 0 : (intval($answer_detail->getAttribute('favour')) === 1 ? doubleval($answer_detail->getAttribute('answer')) : (doubleval($answer_detail->getAttribute('scale')) - doubleval($answer_detail->getAttribute('answer')) + 1));
            }
            try
            {
                $result *= 100.0 / (doubleval($answer_scope['count']) * doubleval($answer_scope['max']));
            }
            catch (\ErrorException $e)
            {
                $result = 0;
            }
            $answer_result->setAttribute('result', $result);
            $answer_result->save();
        }
    }
}

?>
