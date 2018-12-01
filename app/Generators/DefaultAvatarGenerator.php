<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 6:29 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Generators;


trait DefaultAvatarGenerator
{
    /**
     * @param $gender string
     * @return string
     */
    public function generate($gender = null)
    {
        switch ($gender)
        {
            case 'male' :
                {
                    $avatar = mt_rand(0, 22);
                    $avatar = "/assets/img/avatar/male/boy-{$avatar}.png";
                }
            break;
            case 'female' :
                {
                    $avatar = mt_rand(0, 26);
                    $avatar = "/assets/img/avatar/female/girl-{$avatar}.png";
                }
            break;
            default :
                {
                    $avatar = '/assets/img/avatar/default/default.png';
                }
        }

        return $avatar;
    }
}

?>
