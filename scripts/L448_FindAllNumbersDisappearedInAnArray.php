<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/5
 * Time: 13:38
 */

class L448_FindAllNumbersDisappearedInAnArray
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDisappearedNumbers($nums) {
        sort($nums);

        $c = count($nums);
        $x = [];

        for($i = 0;$i < $c;$i ++){
            $x[] = $i + 1;
        }

        return array_diff($x,$nums);
    }
}

$nums = [4,1,1,1,1,1];
$m = new L448_FindAllNumbersDisappearedInAnArray();
print_r($m->findDisappearedNumbers($nums));
