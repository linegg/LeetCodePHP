<?php
/**
实现 int sqrt(int x) 函数。

计算并返回 x 的平方根，其中 x 是非负整数。

由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。

示例 1:

输入: 4
输出: 2
示例 2:

输入: 8
输出: 2
说明: 8 的平方根是 2.82842...,
     由于返回类型是整数，小数部分将被舍去。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/sqrtx
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L69_SqrtX
{
    /**
     * @param Integer $x
     * @return Integer
     */
    //暴力
    function mySqrt($x) {
        for($i = 0;$i <= $x;$i++){
            if($i * $i > $x){
                return $i - 1;
            }

            if($i * $i == $x){
                return $i;
            }

            if($i * $i < $x){
                continue;
            }
        }
    }

    //二分
    function mySqrtDichotomy($x){
        if(in_array($x,[0,1])){
            return $x;
        }

        return $this->Dichotomy($x,0,$x);
    }

    function Dichotomy($max,$min = 0,$x){
        $diff = (int)(($max - $min)/2);
        if($diff == 0){
            return $min;
        }

        $middle = $min + $diff;

        if(pow($middle,2) > $x){
            return $this->Dichotomy($middle,$min,$x);
        }

        if(pow($middle,2) < $x){
            return $this->Dichotomy($max,$middle,$x);
        }

        if(pow($middle,2) == $x){
            return $middle;
        }
    }
}

$x = 100;
$m = new L69_SqrtX();
//echo $m->mySqrt($x);
echo $m->mySqrtDichotomy($x);
