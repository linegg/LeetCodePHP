<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/6
 * Time: 17:16
 */

class L219_ContainsDuplicateII
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {

        $tArr = array();
        foreach($nums as $i => $v){
            $existKey = array_search($v,$tArr);
            if($existKey !== false){
                if(($i - $existKey) <= $k){
                    return true;
                }else{
                    unset($tArr[$existKey]);
                    $tArr[$i] = $v;
                }
            }
            $tArr[$i] = $v;
        }
        return false;
    }
}

$nums = [1,2,3,1,2,3];
$k = 2;

$m = new L219_ContainsDuplicateII();
var_dump($m->containsNearbyDuplicate($nums,$k));
