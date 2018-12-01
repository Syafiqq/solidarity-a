<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use App\Eloquent\UserStudents;

class StudentProfileCompletion extends ProfileCompletion
{
    /**
     * @param User $user
     * @return bool
     */
    protected function isProfileComplete(User $user)
    {
        /** @var UserStudents $student */
        $student = $user->getAttribute('student');

        return ((!empty(strval($student->getAttribute('school')))) && (!empty(strval($student->getAttribute('grade')))));
    }
}
