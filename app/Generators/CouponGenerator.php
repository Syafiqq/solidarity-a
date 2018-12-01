<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 19 November 2017, 4:49 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Generators;


trait CouponGenerator
{
    /**
     * @param int $value
     * @return string
     */
    public function generate($value = 6)
    {
        return strtoupper(bin2hex(openssl_random_pseudo_bytes($value)));
    }
}

?>
