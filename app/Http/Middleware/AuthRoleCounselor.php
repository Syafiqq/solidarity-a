<?php namespace App\Http\Middleware;

class AuthRoleCounselor extends AuthRole
{
    public function getRole()
    {
        return 'counselor';
    }
}
