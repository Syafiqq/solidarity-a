<?php

use App\Eloquent\CounselorAccount;
use App\Eloquent\Coupon;
use App\Eloquent\User;
use App\Generators\CouponGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2018, 5:21 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class CouponSeeder extends Seeder
{
    use CouponGenerator;

    public function run()
    {
        $nip = '120111409964';
        /** @var \Illuminate\Database\Query\Builder $model */
        $model = new User;
        /** @var User $admin */
        if ($admin = $model->where('credential', '=', $nip)->first())
        {
            $role  = ['student', 'counselor'];
            $count = 11;
            while (--$count)
            {
                while (1)
                {
                    try
                    {
                        $coupon = new Coupon(['coupon' => $this->generate(), 'usage' => $role[rand(0, 5) % 2]]);
                        $admin->coupon()->save($coupon);
                        break;
                    }
                    catch (Illuminate\Database\QueryException $ignored)
                    {
                    }
                }
            }
        }
    }
}

?>
