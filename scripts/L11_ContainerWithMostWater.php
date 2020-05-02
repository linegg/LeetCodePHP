<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/4/18
 * Time: 22:50
 */

class L11_ContainerWithMostWater
{
    /**
     * @param Integer[] $height
     * @return Integer
     */
    //暴力解法，不行
    function maxAreaV($height) {
        $len = count($height);
        $indexLen = $len - 1;
        $maxContainer = 0;
        for($i = 0;$i < $indexLen;$i ++){
            if($i > 0){
                $tempArr = array_slice($height,$i,$len - $i);
                $maxLen = $len - $i - 1;
                if(max($tempArr) * $maxLen < $maxContainer)
                    continue;
            }

            for($j = $indexLen;$j > $i;$j --){
                if($j < $indexLen && $height[$j] < $height[$j + 1]){
                    continue;
                }
                $n1 = [$i,$height[$i]];
                $n2 = [$j,$height[$j]];
                $container = $this->getContainer($n1,$n2);
                if($container > $maxContainer){
                    $maxContainer = $container;
                }
            }
        }
        return $maxContainer;
    }

    function maxArea($height) {
        $len = count($height);
        $indexLen = $len - 1;
        $maxContainer = 0;
        for($i = 0,$j = $indexLen;$i < $j;){
            $n1 = [$i,$height[$i]];
            $n2 = [$j,$height[$j]];
            $container = $this->getContainer($n1,$n2);
            if($container > $maxContainer){
                $maxContainer = $container;
            }
            $height[$i] <= $height[$j] ? $i++ : $j --;
        }
        return $maxContainer;
    }

    function getContainer($n1,$n2){
        return ($n2[0] -  $n1[0]) * min($n1[1],$n2[1]);
    }
}

$height = [1,8,6,2,5,4,8,3,7];
$m = new L11_ContainerWithMostWater();
echo $m->maxArea($height);
