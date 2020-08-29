<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/14
 * Time: 19:17
 */

class L326_PowerOfThree
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPowerOfThree($num) {
        if($num == 3 || $num == 1){
            return true;
        }

        if($num < 3){
            return false;
        }

        while($num >= 1){
            $num = (int)$num / 3;
            if(floor($num) != $num){
                return false;
            }

            if($num == 1){
                return true;
            }
        }
        return true;
    }
}

$num = 4;
$m = new L326_PowerOfThree();
var_dump($m->isPowerOfThree($num));
