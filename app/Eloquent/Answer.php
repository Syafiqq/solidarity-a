<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public static $exerciseWindow = 7;
    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'answers';
    /**
     * @var array
     */
    protected $dates = ['started_at', 'finished_at'];
    /**
     * @var array
     */
    protected $guarded = ['id', 'user', 'started_at', 'finished_at'];
    /**
     * @var array
     */
    protected $fillable = [];
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->getAttribute('id');
    }

    public function answer_result()
    {
        return $this->hasMany('App\Eloquent\AnswerResult', 'answer_code', 'id');
    }

    public function answer_detail()
    {
        return $this->hasMany('App\Eloquent\AnswerDetail', 'answer_code', 'id');
    }

    public function getResultAnalytics()
    {
        $analytics = [];

        $analytics['rendah']['guard']          = ['min' => -0.1, 'max' => 33.3];
        $analytics['rendah']['interval']       = '0 - 33%';
        $analytics['rendah']['class']          = 'Rendah';
        $analytics['rendah']['recommendation'] = 'Tingkat kejujuran <strong>%s</strong> masih kurang, perlu diperbaiki dan ditingkatkan dengan melakukan tindakan yang mendukung.';
        $analytics['rendah']['description']    = ['key' => 'Siswa masih kurang memiliki keterampilan dalam  : ', 'value' => '(1) Menentukan pencapaian target akademik (2) menentukan tujuan akademik secara objektif (3) menentukan metode/strategi pencapaian tujuan akademik (4) mengelola waktu pelaksanaan akademik (5) mencari sumber yang dibutuhkan untuk mendukung pencapaian tujuan akademik (6) melaksaanakan tanggung jawab akademik'];
        $analytics['sedang']['guard']          = ['min' => 33.3, 'max' => 66.6];
        $analytics['sedang']['interval']       = '34 - 66%';
        $analytics['sedang']['class']          = 'Sedang';
        $analytics['sedang']['recommendation'] = 'Tingkat kejujuran <strong>%s</strong> sudah cukup, perlu ditingkatkan dengan melakukan tindakan yang mendukung.';
        $analytics['sedang']['description']    = ['key' => 'Siswa sudah memiliki keterampilan yang cukup dalam : ', 'value' => '(1) Menentukan pencapaian target akademik (2) menentukan tujuan akademik secara objektif (3) menentukan metode/ strategi pencapaian tujuan akademik (4) mengelola waktu pelaksanaan akademik (5) mencari sumber yang dibutuhkan untuk mendukung pencapaian tujuan akademik (6) melaksaanakan tanggung jawab akademik'];
        $analytics['tinggi']['guard']          = ['min' => 66.6, 'max' => 100.0];
        $analytics['tinggi']['interval']       = '67 - 100%';
        $analytics['tinggi']['class']          = 'Tinggi';
        $analytics['tinggi']['recommendation'] = 'Tingkat kejujuran <strong>%s</strong> sudah tinggi, perlu dipertahankan dan ditingkatkan dengan melakukan tindakan yang mendukung.';
        $analytics['tinggi']['description']    = ['key' => 'Siswa sudah memiliki keterampilan yang baik untuk : ', 'value' => '(1) Menentukan pencapaian target akademik (2) menentukan tujuan akademik secara objektif (3) menentukan metode/ strategi pencapaian tujuan akademik (4) mengelola waktu pelaksanaan akademik (5) mencari sumber yang dibutuhkan untuk mendukung pencapaian tujuan akademik (6) melaksaanakan tanggung jawab akademik'];

        return $analytics;
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }

}
