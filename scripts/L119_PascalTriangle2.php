<?php
/**
给定一个非负索引 k，其中 k ≤ 33，返回杨辉三角的第 k 行。
在杨辉三角中，每个数是它左上方和右上方的数的和。

示例:

输入: 3
输出: [1,3,3,1]
进阶：

你可以优化你的算法到 O(k) 空间复杂度吗？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/pascals-triangle-ii
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L119_PascalTriangle2
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex) {
        if($rowIndex == 0){
            return [1];
        }

        return $this->helper([1],1,$rowIndex);
    }

    function helper($lastRowArr,$cIndex,$rowIndex){
        $num = $rowIndex + 1;
        if($cIndex > $rowIndex){
            return $lastRowArr;
        }
        $tempArr = array();
        for($i = 0;$i < $num;$i ++){
            $l = isset($lastRowArr[$i - 1]) ? $lastRowArr[$i - 1] : 0;
            $r = isset($lastRowArr[$i]) ? $lastRowArr[$i] : 0;
            $tempArr[] = $l + $r;
        }
        return $this->helper($tempArr,++$cIndex,$rowIndex);
    }
}

$rowIndex = 3;
$m = new L119_PascalTriangle2();
print_r($m->getRow($rowIndex));
