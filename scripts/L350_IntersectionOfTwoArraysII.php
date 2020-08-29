<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/27
 * Time: 19:46
 */

class L350_IntersectionOfTwoArraysII
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersection($nums1, $nums2) {
        $intersect  = array();
        foreach($nums1 as $k => $v){
            $k2 = array_search($v,$nums2);
            if(is_numeric($k2)){
                $intersect[] = $v;
                unset($nums2[$k2]);
            }
        }
        return $intersect;
    }
}

$nums1 = [2,2,1];
$nums2 = [2];
$m = new L350_IntersectionOfTwoArraysII();
print_r($m->intersection($nums1,$nums2));
