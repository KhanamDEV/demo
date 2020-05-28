<?php
/**
 * Created by PhpStorm.
 * User: Kha Nam
 * Date: 5/28/2020
 * Time: 1:21 PM
 */

namespace App\Helpers;


class Helpers
{
    public static  function  titleAction($data){
        return array(
            'title' => !empty($data[0]) ? $data[0] : '',
            'flag' => !empty($data[1]) ? $data[1] : ''
        );
    }

    public static function guardSystem($guard)
    {
        if ($guard == 'admin') return 'admins';
    }
}
