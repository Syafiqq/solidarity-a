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
            ['name' => 'Kategori 1', 'description' => 'Nilai Kejujuran'],
            ['name' => 'Kategori 2', 'description' => 'Nilai ikhlas'],
            ['name' => 'Kategori 3', 'description' => 'Nilai ketulusan'],
            ['name' => 'Kategori 4', 'description' => 'Keyakinan'],
            ['name' => 'Kategori 5', 'description' => 'Pengamalan'],
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
