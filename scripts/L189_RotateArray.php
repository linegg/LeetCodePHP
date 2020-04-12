<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/4/12
 * Time: 21:41
 */

class L189_RotateArray
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        $len = count($nums);
        $endIndex = $len - 1;
        if($k > $len){
            $k = $k%$len;
        }

        $tempArr = array();
        for($i = 0;$i <= $endIndex;$i ++){
            $replace = $i + $k;
            if($replace > $endIndex){
                $replace = $replace - $endIndex - 1;
            }
            $tempArr[$replace] = $nums[$replace];
            $nums[$replace] = isset($tempArr[$i]) ? $tempArr[$i] : $nums[$i];
        }
    }
}

$nums = [1,2,3];
$k = 4;
$m = new L189_RotateArray();
$m->rotate($nums,$k);
print_r($nums);
