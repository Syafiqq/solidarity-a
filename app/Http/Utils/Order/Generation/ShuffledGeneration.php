<?php
/**
 * This <konseling-003-backend> project created by :
 * Name         : syafiq
 * Date / Time  : 27 November 2018, 6:31 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Http\Utils\Order\Generation;


use App\Eloquent\Question;

trait ShuffledGeneration
{
    public function generateCourseOrder()
    {
        $arr = [];
        for ($i = -1, $is = Question::count(); ++$i < $is;)
        {
            array_push($arr, $i + 1);
        }
        shuffle($arr);

        return $arr;
    }
}

?>
