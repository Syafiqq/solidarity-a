<?php
/**
 * This nepal-trace-1.com project created by :
 * Name         : IT DEV
 * Date / Time  : 02 Mei 2018, 8:54.
 * Email        : jasuindo.co.id
 */
if (!function_exists('___d'))
{
    function ___d($data)
    {
        $data = str_replace('January', 'Januari', $data);
        $data = str_replace('February', 'Februari', $data);
        $data = str_replace('March', 'Maret', $data);
        $data = str_replace('May', 'Mei', $data);
        $data = str_replace('June', 'Juni', $data);
        $data = str_replace('July', 'Juli', $data);
        $data = str_replace('August', 'Agustus', $data);
        $data = str_replace('October', 'Oktober', $data);
        $data = str_replace('December', 'Desember', $data);
        $data = str_replace('january', 'januari', $data);
        $data = str_replace('february', 'februari', $data);
        $data = str_replace('march', 'maret', $data);
        $data = str_replace('may', 'mei', $data);
        $data = str_replace('june', 'juni', $data);
        $data = str_replace('july', 'juli', $data);
        $data = str_replace('august', 'agustus', $data);
        $data = str_replace('october', 'oktober', $data);
        $data = str_replace('december', 'desember', $data);

        return $data;
    }
}
?>
