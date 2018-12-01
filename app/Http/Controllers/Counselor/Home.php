<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\Coupon;
use App\Eloquent\User;
use App\Generators\CouponGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class Home extends Controller
{
    use CouponGenerator;

    //var_dump(Session::get('cbk_msg', null));

    public function index()
    {
        $coupons = Coupon::with(['users' => function ($query) {
            $query->get(['id', 'name']);
        }])->get();

        return view(" layout.counselor.dashboard.index.counselor_dashboard_index_$this->theme", compact('coupons'));
    }

    public function couponGenerator($usage)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        /** @var User $user */
        $user = \Illuminate\Support\Facades\Auth::user();
        $code = $this->generate();
        while (1)
        {
            try
            {
                $coupon = new Coupon(['coupon' => $code]);
                $coupon->setAttribute('usage', $usage);
                $user->coupon()->save($coupon);
                break;
            }
            catch (QueryException $ignored)
            {
            }
            $code = $this->generate();
        }

        return redirect()->back()->with('cbk_msg', ['message' => ["Kode : $code"], 'notify' => ['Kode Berhasil Ditambahkan']]);
    }
}
