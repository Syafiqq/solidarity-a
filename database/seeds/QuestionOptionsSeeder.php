<?php

use App\Eloquent\QuestionOption;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 2:15 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionOptionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'ts', 'description' => 'Tidak Sesuai'],
            ['name' => 'ks', 'description' => 'Kurang Sesuai'],
            ['name' => 's', 'description' => 'Sesuai'],
            ['name' => 'ss', 'description' => 'Sangat Sesuai'],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new QuestionOption();
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
