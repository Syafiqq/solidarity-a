<?php namespace App\Http\Controllers\Student;

use App\Eloquent\User;
use App\Http\Controllers\AuthFlow;
use App\Http\Controllers\Controller;

class Auth extends Controller
{
    use AuthFlow
    {
        registerStore as private _registerStore;
    }

    private $role = 'student';

    public function getLogin()
    {
        return view("layout.student.auth.login.student_auth_login_$this->theme");
    }

    public function registerCreate()
    {
        return view("layout.student.auth.register.student_auth_register_$this->theme");
    }

    public function getLost()
    {
        return view("layout.student.auth.lost.student_auth_lost_$this->theme");
    }

    public function getRecover($role, User $user)
    {
        return view("layout.student.auth.recover.student_auth_recover_$this->theme", compact('user'));
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
        return redirect()->route('student.auth.login.get', [$this->role]);
    }

    /**
     * @param User $user
     * @return string
     */
    public function defaultRecoverPath(User $user)
    {
        return route('student.auth.recover.get', ['credential' => $user->getAttribute('credential'), 'token' => $user->getAttribute('lost_password')]);
    }


}
