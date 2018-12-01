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

        $analytics['1']['rendah']['guard']          = ['min' => -0.1, 'max' => 50];
        $analytics['1']['rendah']['interval']       = '0 - 50%';
        $analytics['1']['rendah']['class']          = 'Rendah';
        $analytics['1']['rendah']['recommendation'] = 'Anda memiliki kesadaran solidaritas sosial yang kurang baik. Hal ini menunjukkan anda kurang mampu  menghargai adanya persamaan prinsip dan persamaan tujuan kepada orang lain';
        $analytics['1']['rendah']['description']    = ['key' => '', 'value' => ''];
        $analytics['1']['sedang']['guard']          = ['min' => 50, 'max' => 75];
        $analytics['1']['sedang']['interval']       = '51 - 75%';
        $analytics['1']['sedang']['class']          = 'Sedang';
        $analytics['1']['sedang']['recommendation'] = 'Anda memiliki kesadaran solidaritas sosial yang baik. Hal ini menunjukkan anda cukup mampu menghargai adanya persamaan prinsip dan persamaan tujuan kepada orang lain';
        $analytics['1']['sedang']['description']    = ['key' => '', 'value' => ''];
        $analytics['1']['tinggi']['guard']          = ['min' => 75, 'max' => 100.0];
        $analytics['1']['tinggi']['interval']       = '76 - 100%';
        $analytics['1']['tinggi']['class']          = 'Tinggi';
        $analytics['1']['tinggi']['recommendation'] = 'Anda memiliki kesadaran solidaritas sosial yang sangat baik. Hal ini menunjukkan anda sudah mampu menghargai adanya persamaan prinsip dan persamaan tujuan kepada orang lain. ';
        $analytics['1']['sedang']['description']    = ['key' => '', 'value' => ''];

        $analytics['2']['rendah']['guard']          = ['min' => -0.1, 'max' => 50];
        $analytics['2']['rendah']['interval']       = '0 - 50%';
        $analytics['2']['rendah']['class']          = 'Rendah';
        $analytics['2']['rendah']['recommendation'] = 'Anda memiliki kesadaran solidaritas organik yang  kurang baik. Hal ini menunjukkan anda memiliki sikap kurang mampu menghargai pembagian kerja dalam kelompok, memilih untuk bekerja kelompok dan menghargai hasil dari kerja kelompok.';
        $analytics['2']['rendah']['description']    = ['key' => '', 'value' => ''];
        $analytics['2']['sedang']['guard']          = ['min' => 50, 'max' => 75];
        $analytics['2']['sedang']['interval']       = '51 - 75%';
        $analytics['2']['sedang']['class']          = 'Sedang';
        $analytics['2']['sedang']['recommendation'] = 'Anda memiliki kesadaran solidaritas organik yang  baik. Hal ini menunjukkan anda memiliki sikap cukup mampu menghargai pembagian kerja dalam kelompok, memilih untuk bekerja kelompok dan menghargai hasil dari kerja kelompok.';
        $analytics['2']['sedang']['description']    = ['key' => '', 'value' => ''];
        $analytics['2']['tinggi']['guard']          = ['min' => 75, 'max' => 100.0];
        $analytics['2']['tinggi']['interval']       = '76 - 100%';
        $analytics['2']['tinggi']['class']          = 'Tinggi';
        $analytics['2']['tinggi']['recommendation'] = 'Anda memiliki kesadaran solidaritas organik yang sangat baik. Hal ini menunjukkan anda sudah mampu memiliki sikap menghargai pembagian kerja dalam kelompok, memilih untuk bekerja kelompok dan menghargai hasil dari kerja kelompok.';
        $analytics['2']['sedang']['description']    = ['key' => '', 'value' => ''];

        $analytics['3']['rendah']['guard']          = ['min' => -0.1, 'max' => 50];
        $analytics['3']['rendah']['interval']       = '0 - 50%';
        $analytics['3']['rendah']['class']          = 'Rendah';
        $analytics['3']['rendah']['recommendation'] = 'Anda memiliki kesadaran solidaritas Marginal yang kurang baik. Hal ini menunjukkan anda tidak mampu memiliki kesadaran bersama akan pembagian kerja dan adanya persamaan prinsip dan tujuan kepada orang lain.';
        $analytics['3']['rendah']['description']    = ['key' => '', 'value' => ''];
        $analytics['3']['sedang']['guard']          = ['min' => 50, 'max' => 75];
        $analytics['3']['sedang']['interval']       = '51 - 75%';
        $analytics['3']['sedang']['class']          = 'Sedang';
        $analytics['3']['sedang']['recommendation'] = 'Anda memiliki kesadaran solidaritas Marginal yang baik. Tidak menutup kemungkinan anda belum mampu memiliki adanya kesadaran bersama akan pembagian kerja dan adanya persamaan prinsip dan tujuan kepada orang lain.';
        $analytics['3']['sedang']['description']    = ['key' => '', 'value' => ''];
        $analytics['3']['tinggi']['guard']          = ['min' => 75, 'max' => 100.0];
        $analytics['3']['tinggi']['interval']       = '76 - 100%';
        $analytics['3']['tinggi']['class']          = 'Tinggi';
        $analytics['3']['tinggi']['recommendation'] = 'Anda memiliki kesadaran solidaritas Marginal yang sangat baik. Hal ini menunjukkan anda masih mampu memiliki adanya kesadaran bersama akan pembagian kerja dan adanya persamaan prinsip dan tujuan kepada orang lain.';
        $analytics['3']['sedang']['description']    = ['key' => '', 'value' => ''];

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
