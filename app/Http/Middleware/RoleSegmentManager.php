<?php
/**
 * This <konseling-1> project created by :
 * Name         : syafiq
 * Date / Time  : 29 November 2017, 6:31 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Http\Middleware;


use Illuminate\Http\Request;

trait RoleSegmentManager
{
    /**
     * @param Request $request
     * @return string
     */
    private function getRole(Request $request)
    {
        return $request->segment(1, null);
    }
}

?>
