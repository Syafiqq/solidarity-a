<?php namespace App\Http\Middleware;

class ValidStudent extends ValidUser
{
    /**
     * @return string
     */
    public function getRole()
    {
        return 'student';
    }

    /**
     * @return string
     */
    public function getRoleDescription()
    {
        return 'Siswa';
    }
}
