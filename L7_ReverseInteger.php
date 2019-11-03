<?php
/**给出一个 32 位的有符号整数，你需要将这个整数中每位上的数字进行反转。

示例 1:

输入: 123
输出: 321
 示例 2:

输入: -123
输出: -321
示例 3:

输入: 120
输出: 21
注意:

假设我们的环境只能存储得下 32 位的有符号整数，则其数值范围为 [−231,  231 − 1]。请根据这个假设，如果反转后整数溢出那么就返回 0。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reverse-integer
 */

class L7_ReverseInteger
{
    static public function ReverseInteger($x){
        $negative = false;
        if($x < 0){
            $negative = true;
            $x = ltrim($x,'-');
        }
        $rx = $negative ? (int)('-'.strrev($x)) : (int)strrev($x);

        if($rx > pow(2,31) - 1 || $rx < pow(-2,31)){
            return 0;
        }

        return $rx;
    }
}

$x = -123;
print_r(L7_ReverseInteger::ReverseInteger($x));
