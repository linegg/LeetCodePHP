<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/5
 * Time: 15:10
 */

class L453_MinimumMovesToEqualArrayElements
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves($nums) {
        $min = min($nums);
        $time = 0;
        foreach($nums as $v){
            $time += $v - $min;
        }
        return $time;
    }
}

$nums = [1,2,3];
$m = new L453_MinimumMovesToEqualArrayElements();
echo $m->minMoves($nums);
