<?php

use App\Eloquent\Answer;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 4:02 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class AnswersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['user' => '2', 'started_at' => '2018-11-30 07:00:00', 'finished_at' => '2018-11-30 08:00:00'],
            ['user' => '2', 'started_at' => '2018-12-02 07:00:00'],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new Answer();
        foreach ($data as $category)
        {
            if (!$model->where('started_at', '=', $category['started_at'])->where('user', '=', $category['user'])->first())
            {
                $model->insert($category);
            }
        }
    }
}

?>
