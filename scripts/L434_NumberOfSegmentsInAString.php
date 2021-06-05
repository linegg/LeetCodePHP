<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/4
 * Time: 21:30
 */

class L434_NumberOfSegmentsInAString
{
    /**
     * @param String $s
     * @return Integer
     */
    function countSegments($s) {
        $s = trim($s);
        $s = preg_replace("/\s(?=\s)/","\\1",$s);

        if(empty($s)){
            return 0;
        }
        return substr_count(trim($s),' ') + 1;
    }
}


$s = ", , , ,        a, eaefa";
$m = new L434_NumberOfSegmentsInAString();
echo $m->countSegments($s);
