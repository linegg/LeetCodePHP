<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/4/18
 * Time: 23:49
 */

class L191_NumberOf1Bits
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {
        $bStr = decbin($n);
        $arr = str_split($bStr);
        $r = array_count_values($arr);
        return isset($r[1]) ? $r[1] : 0;
    }
}

$n = 3;
$m = new L191_NumberOf1Bits();
echo $m->reverseBits($n);
