<?php

use App\Eloquent\User;
use App\Eloquent\UserCounselors;
use App\Generators\DefaultAvatarGenerator;
use Illuminate\Database\Seeder;

/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2018, 6:48 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
class UserCounselorsSeeder extends Seeder
{
    use DefaultAvatarGenerator;

    public function run()
    {
        $nip = '120111409964';
        /** @var \Illuminate\Database\Query\Builder $user */
        $user = new User();
        if (!$user->where('credential', '=', $nip)->first())
        {
            $user->setAttribute('credential', $nip);
            $user->setAttribute('email', null);
            $user->setAttribute('name', 'Husni Hanafi');
            $user->setAttribute('gender', 'male');
            $user->setAttribute('role', 'counselor');
            $user->setAttribute('avatar', $this->generate($user->getAttribute('gender')));
            $user->setAttribute('password', bcrypt('12345678'));
            $user->save();

            $counselor = new UserCounselors();
            $counselor->setAttribute('school', 'SMA Negeri 0 Malang');
            $counselor->setAttribute('school_head', 'Sutidjo, S.Pd, M.Pd');
            $counselor->setAttribute('school_head_credential', '19451708199008230002');

            $user->counselor()->save($counselor);
        }
    }
}

?>
