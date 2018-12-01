<?php namespace App\Eloquent;

use App\Generators\CouponGenerator;
use App\Generators\DefaultAvatarGenerator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use DefaultAvatarGenerator, CouponGenerator
    {
        DefaultAvatarGenerator::generate insteadof CouponGenerator;
        DefaultAvatarGenerator::generate as generateAvatar;
        CouponGenerator::generate as generateCoupon;
    }
    /**
     * @var bool
     */
    public $timestamps = true;
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * @var array
     */
    protected $dates = [];
    /**
     * @var array
     */
    protected $guarded = ['id', 'credential', 'role', 'password', 'remember_token', 'created_at', 'updated_at'];
    /**
     * @var array
     */
    protected $fillable = ['name', 'gender', 'avatar'];
    /**
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->{'id'};
    }

    /**
     * @return null|string
     */
    public function getGenderTranslation()
    {
        switch ($this->{'gender'})
        {
            case 'male' :
                $translatedGender = 'Laki - Laki';
            break;
            case 'female' :
                $translatedGender = 'Wanita';
            break;
            default :
                $translatedGender = null;
            break;
        }

        return $translatedGender;
    }

    public function coupon()
    {
        return $this->hasMany('App\Eloquent\Coupon', 'assignee', 'id');
    }

    public function counselor()
    {
        return $this->hasOne('App\Eloquent\UserCounselors', 'user', 'id');
    }

    public function student()
    {
        return $this->hasOne('App\Eloquent\UserStudents', 'user', 'id');
    }

    /**
     * @return bool
     */
    public function isDetailReportValid()
    {
        return $this->answer()->whereNotNull('finished_at')->count() > 0;
    }

    public function answer()
    {
        return $this->hasMany('App\Eloquent\Answer', 'user', 'id');
    }

    public function hasOpenedCourse()
    {
        $answer = $this->{'answer'}->where('finished_at', null)->count();

        if ($answer > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->{'password'};
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * @return User
     * @throws \Exception
     */
    public function generateRecoveryCode()
    {

        $this->setAttribute('lost_password', $this->generateCoupon());

        return $this;
    }

    public function GetAnswerDetail($question)
    {
        return $this->{'answer'}->where('finished_at', null)->first()->answer_detail()->where('order', $question)->first();
    }

    public function getUnfinishedQuestion()
    {
        $questions = $this->{'answer'}->where('finished_at', null)->first()->answer_detail()->pluck('answer');
        $qArr      = [];
        foreach ($questions as $k => &$v)
        {
            if (is_null($v))
            {
                array_push($qArr, $k + 1);
            }
        }

        return $qArr;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    protected function getDateFormat()
    {
        return 'Y-m-d H:i:s';
    }
}
