<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/7
 * Time: 18:40
 */

class L342_PowerOfFour
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPowerOfFour($num) {
        if($num <= 0){
            return false;
        }

        while($num > 1){
            $num = $num/4;
            if(floor($num) != $num){
                return false;
            }
        }
        return true;
    }
}

$num = 2147483648;
$m = new L342_PowerOfFour();
var_dump($m->isPowerOfFour($num));
