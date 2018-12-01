<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class AnswerDetail extends Model
{

    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    protected $table = 'answer_details';
    /**
     * @var array
     */
    protected $dates = ['answered_at', 'updated_at'];
    /**
     * @var array
     */
    protected $guarded = ['id', 'answer_code', 'favour', 'scale', 'answered_at', 'updated_at'];
    /**
     * @var array
     */
    protected $fillable = ['question', 'answer'];
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

    public function question()
    {
        return $this->belongsTo('App\Eloquent\Question', 'question', 'id');
    }

    /**
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
