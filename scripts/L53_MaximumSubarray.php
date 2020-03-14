<?php
/**
给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。

示例:

输入: [-2,1,-3,4,-1,2,1,-5,4],
输出: 6
解释: 连续子数组 [4,-1,2,1] 的和最大，为 6。
进阶:

如果你已经实现复杂度为 O(n) 的解法，尝试使用更为精妙的分治法求解

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/maximum-subarray
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L53_MaximumSubarray
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    //暴力解法
    function maxSubArray($nums) {
        $maxSum = 0;
        $count = count($nums);
        for($i = 0;$i < $count;$i ++){
            $tempMaxSum = $nums[$i];
            if($i == 0){
                $maxSum = $nums[$i];
            }

            if($maxSum < $nums[$i]){
                $maxSum = $nums[$i];
                $tempMaxSum = $nums[$i];
            }

            for($j = $i + 1;$j < $count;$j ++){
                $tempMaxSum += $nums[$j];
                if($tempMaxSum > $maxSum){
                    $maxSum = $tempMaxSum;
                }
            }
        }
        return $maxSum;
    }

    function maxSubArray2(){

    }
}

$nums = [1,2];
$m = new L53_MaximumSubarray();
print_r($m->maxSubArray($nums));
