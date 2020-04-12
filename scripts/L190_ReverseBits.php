<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/4/12
 * Time: 22:21
 */

class L190_ReverseBits
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function reverseBits($n) {
        $bin = decbin($n);
        $bin = str_pad($bin,32,'0',STR_PAD_LEFT);
        $binArr = str_split($bin);
        $binArr = array_reverse($binArr);
        $bin = implode('',$binArr);
        return bindec($bin);
    }
}

$n = 43261596;
$m = new L190_ReverseBits();
echo $m->reverseBits($n);

