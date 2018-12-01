<?php

use App\Eloquent\Question;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 01 December 2018, 2:55 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['id' => 1, 'category' => 1, 'favour' => 1, 'question' => 'Saya membantu teman untuk memahami materi diskusi'],
            ['id' => 2, 'category' => 1, 'favour' => 1, 'question' => 'Saya menunggu teman ketika akan memulai sesuatu'],
            ['id' => 3, 'category' => 1, 'favour' => 1, 'question' => 'Saya senang mengerjakan piket bersama teman '],
            ['id' => 4, 'category' => 1, 'favour' => 1, 'question' => 'Saya melakukan kerja bakti di sekolah dengan tulus dan ikhlas '],
            ['id' => 5, 'category' => 1, 'favour' => 1, 'question' => 'Saya melakukan pemilihan ketua kelas dengan cara musyawarah'],
            ['id' => 6, 'category' => 1, 'favour' => 1, 'question' => 'Saya ikut mengambil keputusan di kelas'],
            ['id' => 7, 'category' => 1, 'favour' => 1, 'question' => 'Saya melaksanakan piket kelas yang sudah dibuat '],
            ['id' => 8, 'category' => 2, 'favour' => 1, 'question' => 'Saya menyelesaikan tugas sesuai pembagian'],
            ['id' => 9, 'category' => 2, 'favour' => 1, 'question' => 'Saya mempertahankan pendapat ketika berdiskusi '],
            ['id' => 10, 'category' => 2, 'favour' => 1, 'question' => 'Saya menggunakan hak bertanya dalam setiap berdiskusi'],
            ['id' => 11, 'category' => 2, 'favour' => 1, 'question' => 'Saya senang mengerjakan tugas kelompok sendiri tanpa bantuan teman'],
            ['id' => 12, 'category' => 2, 'favour' => 1, 'question' => 'Saya memilih menjadi  pengurus kelas karena lebih dominan'],
            ['id' => 13, 'category' => 2, 'favour' => 1, 'question' => 'Saya melakukan komunikasi hanya  untuk membahas tugas saja'],
            ['id' => 14, 'category' => 2, 'favour' => 1, 'question' => 'Saya menjaga dan merawat fasilitas sekolah'],
            ['id' => 15, 'category' => 2, 'favour' => 1, 'question' => 'Saya bersikap sopan santun kepada guru di kelas'],
            ['id' => 16, 'category' => 3, 'favour' => 1, 'question' => 'Saya bekerja dalam kelompok membuat saya tertekan'],
            ['id' => 17, 'category' => 3, 'favour' => 1, 'question' => 'Saya kesulitan bergaul dengan teman'],
            ['id' => 18, 'category' => 3, 'favour' => 1, 'question' => 'Saya kesulitan menyampaikan pendapat dalam forum'],
            ['id' => 19, 'category' => 3, 'favour' => 1, 'question' => 'Saya menunduk saat berjalan'],
            ['id' => 20, 'category' => 3, 'favour' => 1, 'question' => 'Saya menggunakan waktu libur  untuk tidur dari pada bermain dengan teman'],
            ['id' => 21, 'category' => 3, 'favour' => 1, 'question' => 'Saya kesulitan membagi cerita dengan teman '],
            ['id' => 22, 'category' => 3, 'favour' => 1, 'question' => 'Saya bersikap tak acuh terhadap nasihat teman'],
            ['id' => 23, 'category' => 3, 'favour' => 1, 'question' => 'Saya berdiam diri dalam kelas daripada keluar'],
            ['id' => 24, 'category' => 3, 'favour' => 1, 'question' => 'Saya menghabiskan waktu sendiri'],
            ['id' => 25, 'category' => 3, 'favour' => 1, 'question' => 'Saya memilih memendam rasa marah '],
            ['id' => 26, 'category' => 3, 'favour' => 1, 'question' => 'Saya kesulitan menunjukkan rasa empati'],
        ];

        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new Question();
        foreach ($data as $category)
        {
            if (!$model->where('question', '=', $category['question'])->first())
            {
                $model->insert($category);
            }
        }
    }
}

?>
