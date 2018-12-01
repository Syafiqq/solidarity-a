<?php

use App\Eloquent\Answer;
use App\Eloquent\AnswerResult;
use App\Model\AnswerResultCalculator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 7:30 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class AnswerResultsSeeder extends Seeder
{
    use AnswerResultCalculator
    {
        calculate as private _calculate;
    }

    public function run()
    {
        $data = [
            [
                ['answer_code' => 1, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 3, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 4, 'result' => 0.0],
                ['answer_code' => 1, 'category' => 5, 'result' => 0.0],
            ],
            [
                ['answer_code' => 2, 'category' => 1, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 2, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 3, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 4, 'result' => 0.0],
                ['answer_code' => 2, 'category' => 5, 'result' => 0.0],
            ],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new AnswerResult();
        foreach ($data as $c1)
        {
            foreach ($c1 as $c2)
            {
                if (!$model->where('answer_code', '=', $c2['answer_code'])->where('category', '=', $c2['category'])->first())
                {
                    $model->insert($c2);
                }
            }
        }

        $this->calculate();
    }

    private function calculate()
    {
        $data = [1];

        foreach ($data as $answer_code)
        {
            /** @var Answer $answer */
            $answer = Answer::find($answer_code);
            if (!is_null($answer))
            {
                $this->_calculate($answer);
            }
        }
    }
}

?>
