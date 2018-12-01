<?php namespace App\Http\Middleware;

use App\Eloquent\User;
use App\Eloquent\UserCounselors;

class CounselorProfileCompletion extends ProfileCompletion
{
    /**
     * @param User $user
     * @return bool
     */
    protected function isProfileComplete(User $user)
    {
        /** @var UserCounselors $counselor */
        $counselor = $user->getAttribute('counselor');

        return ((!empty(strval($counselor->getAttribute('school')))) && (!empty(strval($counselor->getAttribute('school_head')))) && (!empty(strval($counselor->getAttribute('school_head_credential')))));
    }
}
