<?php
/**
给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。

你可以假设数组中无重复元素。

示例 1:

输入: [1,3,5,6], 5
输出: 2
示例 2:

输入: [1,3,5,6], 2
输出: 1
示例 3:

输入: [1,3,5,6], 7
输出: 4
示例 4:

输入: [1,3,5,6], 0
输出: 0

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/search-insert-position
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L35_SearchInsertPosition
{
    function searchInsert($nums, $target) {
        $k = array_search($target,$nums);
        if($k !== false){
            return $k;
        }

        $count = count($nums);
        //shit
        foreach($nums as $k => $v){
            $nextKey = $k + 1;
            if($k == 0 && $v > $target){
                return 0;
            }elseif($v < $target && isset($nums[$nextKey]) && $nums[$nextKey] > $target){
                return $nextKey;
            }elseif($k == ($count - 1) && $target > $v){
                return $count;
            }
        }
    }
}

$nums = [1];
$target = 1;
$m = new L35_SearchInsertPosition();
echo $m->searchInsert($nums,$target);
