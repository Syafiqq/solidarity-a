<?php

use App\Eloquent\QuestionCategory;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 1:35 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionCategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Kategori 1', 'description' => 'Solidaritas Mekanik'],
            ['name' => 'Kategori 2', 'description' => 'Solidaritas Organik'],
            ['name' => 'Kategori 3', 'description' => 'Solidaritas Marginal'],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new QuestionCategory();
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
