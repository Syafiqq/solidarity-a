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
            ['id' => 1, 'category' => 1, 'favour' => 1, 'question' => 'Bila ditanya sesuatu saya menjawab berdasarkan fakta'],
            ['id' => 2, 'category' => 1, 'favour' => 1, 'question' => 'Saya mengakui jika kurang mengerti terhadap suatu materi'],
            ['id' => 3, 'category' => 1, 'favour' => 1, 'question' => 'Saya mengungkapkan perasaan sukaterhadap sesuatu'],
            ['id' => 4, 'category' => 1, 'favour' => 1, 'question' => 'Saya bangga dengan hasil yang saya peroleh dengan usaha sendiri'],
            ['id' => 5, 'category' => 1, 'favour' => 1, 'question' => 'Saya jujur menyampaikan alasan yang ada'],
            ['id' => 6, 'category' => 1, 'favour' => 1, 'question' => 'Apa yang saya sampaikan sesuai dengan apa yang saya kerjakan'],
            ['id' => 7, 'category' => 1, 'favour' => 1, 'question' => 'Memberitahukan sesuatu sesuai dengan kenyataan'],
            ['id' => 8, 'category' => 1, 'favour' => 1, 'question' => 'Saya mengembalikan barang yang bukan hak/milik saya'],
            ['id' => 9, 'category' => 1, 'favour' => 1, 'question' => 'Saya berusaha menjawab seadanya walaupun nantinya mendapatkan nilai jelek'],
            ['id' => 10, 'category' => 1, 'favour' => 1, 'question' => 'Saya mengembalikan barang milik teman setelah meminjamnya'],
            ['id' => 11, 'category' => 1, 'favour' => 1, 'question' => 'Saya melaporkan barang yang saya temukan di lingkungan sekolah'],
            ['id' => 12, 'category' => 1, 'favour' => 1, 'question' => 'Saya meminta maaf atas kesalahan yang saya perbuat'],
            ['id' => 13, 'category' => 1, 'favour' => 1, 'question' => 'Saya berkata terus terang ketika melakukan kesalahan'],
            ['id' => 14, 'category' => 1, 'favour' => 1, 'question' => 'Saya menanyakan tugas dari guru yang belum dimengerti'],
            ['id' => 15, 'category' => 1, 'favour' => 1, 'question' => 'Saya patuh terhadap peraturan di sekolah'],
            ['id' => 16, 'category' => 1, 'favour' => 1, 'question' => 'Ketika tidak masuk, saya berterus terang alasan saya tidak mengikuti pelajaran'],
            ['id' => 17, 'category' => 1, 'favour' => 1, 'question' => 'Saya membantu kegiatan di sekolah dengan senang hati'],
            ['id' => 18, 'category' => 2, 'favour' => 1, 'question' => 'Saya menerima segala kekurangan serta kelebihan dalam diri saya'],
            ['id' => 19, 'category' => 2, 'favour' => 1, 'question' => 'Saya menolong orang tanpa balasan'],
            ['id' => 20, 'category' => 2, 'favour' => 1, 'question' => 'Saya ikhlas berbagi makanan dengan teman'],
            ['id' => 21, 'category' => 2, 'favour' => 1, 'question' => 'Saya menghapus tulisan di papan tulis meskipun bukan jadwal piket saya'],
            ['id' => 22, 'category' => 2, 'favour' => 1, 'question' => 'Saya tidak keberatan membayar khas kelas di detiap minggu'],
            ['id' => 23, 'category' => 2, 'favour' => 1, 'question' => 'Saya dengan senang hati menjelaskan tugas yang kurang dimengerti teman saya'],
            ['id' => 24, 'category' => 2, 'favour' => 1, 'question' => 'Saya mengambil keputusan berdasarkan pendapat teman-teman kelompok'],
            ['id' => 25, 'category' => 2, 'favour' => 1, 'question' => 'Saya menerima akibat dari tindakan yang saya perbuat'],
            ['id' => 26, 'category' => 2, 'favour' => 1, 'question' => 'Saya ikhlas apabila dimintai sumbangan untuk teman yang kesusahan'],
            ['id' => 27, 'category' => 2, 'favour' => 1, 'question' => 'Saya berusaha untuk netral jika ada teman saya yang berselisih'],
            ['id' => 28, 'category' => 2, 'favour' => 1, 'question' => 'Saya menerima kritik dari teman tentang kinerja saya'],
            ['id' => 29, 'category' => 2, 'favour' => 1, 'question' => 'Saya menerima pendapat saya ditolak dalam kelompok saya'],
            ['id' => 30, 'category' => 3, 'favour' => 1, 'question' => 'Saya yakin semua yang saya lakukan untuk mencari ridho Tuhan YME'],
            ['id' => 31, 'category' => 3, 'favour' => 1, 'question' => 'Selalu  menebar senyum dalam kondisi apapun'],
            ['id' => 32, 'category' => 3, 'favour' => 1, 'question' => 'Saya percaya bahwa Tuhan melihat apapun yang saya perbuat'],
            ['id' => 33, 'category' => 3, 'favour' => 1, 'question' => 'Saya yakin bahwa Tuhan akan menolong ketika saya kesulitan'],
            ['id' => 34, 'category' => 3, 'favour' => 1, 'question' => 'Saya bersikap apa adanya ketika bersama teman saya'],
            ['id' => 35, 'category' => 3, 'favour' => 1, 'question' => 'Saya dengan senang hati meminjamkan alat tulis kepada teman yang membutuhkan'],
            ['id' => 36, 'category' => 3, 'favour' => 1, 'question' => 'Saya dengan  senang hati  meminjamkan catatan kepada teman yang  tidak masuk'],
            ['id' => 37, 'category' => 3, 'favour' => 1, 'question' => 'Saya selalu siap sedia dalam  membantu teman yang membutuhkan'],
            ['id' => 38, 'category' => 3, 'favour' => 1, 'question' => 'Saya senang melihat teman saya yang meraih rangking satu di kelas'],
            ['id' => 39, 'category' => 3, 'favour' => 1, 'question' => 'Saya bahagia melihat teman saya memenangkan perlombaan'],
            ['id' => 40, 'category' => 3, 'favour' => 1, 'question' => 'Saya dengan senang hati menyumbangkan tenaga serta pikiran dalam kerja kelompok'],
            ['id' => 41, 'category' => 4, 'favour' => 1, 'question' => 'Saya yakin dengan bersyukur dapat menambah nikmat'],
            ['id' => 42, 'category' => 4, 'favour' => 1, 'question' => 'Hati saya menjadi tentram dan damai ketika mengingat Tuhan dimanapun saya berada'],
            ['id' => 43, 'category' => 4, 'favour' => 1, 'question' => 'Saya  menghormati keyakinan yang  dianut  oleh teman saya'],
            ['id' => 44, 'category' => 4, 'favour' => 1, 'question' => 'Saya menghormati ketika pada jum\'at teman yang beragama Islam membaca Yasin'],
            ['id' => 45, 'category' => 4, 'favour' => 1, 'question' => 'Kebaikan yang diajarkan oleh Tuhan, akan saya amalkan dalam kehidupan sehari-hari'],
            ['id' => 46, 'category' => 4, 'favour' => 1, 'question' => 'Saya bertingkah laku baik dimanapun'],
            ['id' => 47, 'category' => 4, 'favour' => 1, 'question' => 'Saya menerima akibat dari tindakan yang saya perbuat.'],
            ['id' => 48, 'category' => 4, 'favour' => 1, 'question' => 'Menyempatkan waktu untuk ibadah ditengah padatnya jadwal di sekolah'],
            ['id' => 49, 'category' => 4, 'favour' => 1, 'question' => 'Saya menjalankan perintah agama sesuai dengan apa yang diyakini'],
            ['id' => 50, 'category' => 4, 'favour' => 1, 'question' => 'Saya menjauhi apa yang dilarang oleh Tuhan'],
            ['id' => 51, 'category' => 5, 'favour' => 1, 'question' => 'Saya yakin  bahwa  usaha tidak menghianati hasil'],
            ['id' => 52, 'category' => 5, 'favour' => 1, 'question' => 'Saya berusaha  untuk memperjuangkan sesuatu'],
            ['id' => 53, 'category' => 5, 'favour' => 1, 'question' => 'Saya percaya setiap perbuatan pasti ada balasannya'],
            ['id' => 54, 'category' => 5, 'favour' => 1, 'question' => 'Saya menerima atau  memberikan sesuatu dengan  tangan  kanan.'],
            ['id' => 55, 'category' => 5, 'favour' => 1, 'question' => 'Saya bergaul dan memperlakukan orang secara baik'],
            ['id' => 56, 'category' => 5, 'favour' => 1, 'question' => 'Saya menghindari sikap sombong'],
            ['id' => 57, 'category' => 5, 'favour' => 1, 'question' => 'Saya setia kawan atas dasar kebenaran'],
            ['id' => 58, 'category' => 5, 'favour' => 1, 'question' => 'Saya mengikuti yasinan setiap Jumat pagi'],
            ['id' => 59, 'category' => 5, 'favour' => 1, 'question' => 'Saya sabar dalam menghadapi kesusahan'],
            ['id' => 60, 'category' => 5, 'favour' => 1, 'question' => 'Saya menepati janji yang sudah disepakati'],
            ['id' => 61, 'category' => 5, 'favour' => 1, 'question' => 'Saya menjauhi perbuatan yang kurang berguna'],
            ['id' => 62, 'category' => 5, 'favour' => 1, 'question' => 'Saya menahan amarah dan tidak emosional'],
            ['id' => 63, 'category' => 5, 'favour' => 1, 'question' => 'Saya berbicara  dengan sopan sesuai dengan akidah agama'],
            ['id' => 64, 'category' => 5, 'favour' => 1, 'question' => 'Saya berdoa sebelum makan'],
            ['id' => 65, 'category' => 5, 'favour' => 1, 'question' => 'Saya berdoa sebelum melakukan kegiatan apapun'],
            ['id' => 66, 'category' => 5, 'favour' => 1, 'question' => 'Saya mencuci tangan sebelum makan'],
            ['id' => 67, 'category' => 5, 'favour' => 1, 'question' => 'Saya mencuci tangan sesudah makan'],
            ['id' => 68, 'category' => 5, 'favour' => 1, 'question' => 'Saya bertutur kata  santun kepada orang  yang  lebih tua'],
            ['id' => 69, 'category' => 5, 'favour' => 1, 'question' => 'Saya ikut aktif dalam kerja bakti di sekolah'],
            ['id' => 70, 'category' => 5, 'favour' => 1, 'question' => 'Saya menjaga kebersihan lingkungan'],
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
