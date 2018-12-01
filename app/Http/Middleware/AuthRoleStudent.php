<?php namespace App\Http\Middleware;

class AuthRoleStudent extends AuthRole
{
    public function getRole()
    {
        return 'student';
    }
}
