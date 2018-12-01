<?php namespace App\Http\Controllers\Counselor;

use App\Eloquent\User;
use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    use AuthFlow
    {
        registerStore as private _registerStore;
    }

    private $role = 'counselor';

    public function getLogin()
    {
        return view("layout.counselor.auth.login.counselor_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.counselor.auth.register.counselor_auth_register_$this->theme");
    }

    public function getLost()
    {
        return view("layout.counselor.auth.lost.counselor_auth_lost_$this->theme");
    }

    public function getRecover($role, User $user)
    {
        return view("layout.counselor.auth.recover.counselor_auth_recover_$this->theme", compact('user'));
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    public function defaultRedirectPath()
    {
        return "/{$this->role}/dashboard";
    }

    /**
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|string
     */
    public function defaultLoginPath()
    {
        return redirect()->route('counselor.auth.login.get', [$this->role]);
    }

    /**
     * @param User $user
     * @return string
     */
    public function defaultRecoverPath(User $user)
    {
        return route('counselor.auth.recover.get', ['credential' => $user->getAttribute('credential'), 'token' => $user->getAttribute('lost_password')]);
    }
}
