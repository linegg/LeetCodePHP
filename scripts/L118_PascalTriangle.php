<?php
/**
给定一个非负整数 numRows，生成杨辉三角的前 numRows 行。
在杨辉三角中，每个数是它左上方和右上方的数的和。

示例:

输入: 5
输出:
[
[1],
[1,1],
[1,2,1],
[1,3,3,1],
[1,4,6,4,1]
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/pascals-triangle
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L118_PascalTriangle
{
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if($numRows == 0){
            return array();
        }

        if($numRows == 1){
            return array([1]);
        }

        return $this->helper(array([1]),1,$numRows);
    }

    function helper($arr,$rows,$numRows){
        $num = $rows + 1;
        if($num > $numRows){
            return $arr;
        }
        $tempArr = array();
        $lastRow = $rows - 1;

        for($i = 0;$i < $num ;$i ++){
            $l = isset($arr[$lastRow][$i - 1]) ? $arr[$lastRow][$i - 1] : 0;
            $r = isset($arr[$lastRow][$i]) ? $arr[$lastRow][$i] : 0;
            $tempArr[$i] = $l + $r;
        }
        $arr[] = $tempArr;
        return $this->helper($arr,++$rows,$numRows);
    }
}

$numRows = 5;
$m = new L118_PascalTriangle();
print_r($m->generate($numRows));
