<?php
/**
判断一个整数是否是回文数。回文数是指正序（从左向右）和倒序（从右向左）读都是一样的整数。

示例 1:

输入: 121
输出: true
示例 2:

输入: -121
输出: false
解释: 从左向右读, 为 -121 。 从右向左读, 为 121- 。因此它不是一个回文数。
示例 3:

输入: 10
输出: false
解释: 从右向左读, 为 01 。因此它不是一个回文数。
进阶:

你能不将整数转为字符串来解决这个问题吗？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/palindrome-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L9_PalindromeNumber
{
    static public function isPalindromeNumber($x){
        $rx = strrev($x);
        if($rx == $x){
            return true;
        }
        return false;
    }

    //不转换字符串
    static public function isPalindromeNumber2($x){
        if($x < 0){
            return false;
        }

        $count = floor(log10($x) + 1);

        for($i = 1;$i < $count;$i ++){
            $n0 = $x % (pow(10,$i));
            $n1 = intval($x / (pow(10,($count - $i))));
            if(self::sFindNum($n0,$i) != self::eFindNum($n1)){
                return false;
            }
        }
        return true;
    }

    //取最左位
    static public function sFindNum($x,$i){
        //左侧是0
        if($x < pow(10,$i - 1)){
            return 0;
        }

        //个位数
        if($i == 1){
            return $x;
        }

        return intval($x / pow(10,$i - 1));
    }

    //取最右位
    static public function eFindNum($x){
        if($x < 10){
            return $x;
        }
        return $x % 10;
    }
}

$x = 1001;
var_dump(L9_PalindromeNumber::isPalindromeNumber2($x));

