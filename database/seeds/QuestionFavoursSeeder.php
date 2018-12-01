<?php

use App\Eloquent\QuestionFavour;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 2:07 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionFavoursSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'positive', 'description' => 'favourable'],
            ['name' => 'negative', 'description' => 'unfavourable'],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new QuestionFavour();
        foreach ($data as $category)
        {
            if (!$model->where('name', '=', $category['name'])->first())
            {
                $model->insert($category);
            }
        }
    }
}

?>
