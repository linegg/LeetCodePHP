<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/1
 * Time: 0:50
 */

class L169_MajorityElement
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = count($nums);
        $x = floor($count/2) + 1;
        $tArr = [];

        foreach($nums as $v){
            if(isset($tArr[$v])){
                $tArr[$v] ++;
            }else{
                $tArr[$v] = 1;
            }

            if($tArr[$v] >= $x){
                return $v;
            }
        }

        return null;
    }
}

$nums = [3,2,3];

$m = new L169_MajorityElement();
echo $m->majorityElement($nums);
