<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/7
 * Time: 19:05
 */

class L344_ReverseString
{
    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s) {
        $s = array_reverse($s);
    }
}

$s = ["h","e","l","l","o"];
$m = new L344_ReverseString();
$m->reverseString($s);
print_r($s);
