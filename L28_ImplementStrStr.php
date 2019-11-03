<?php
/**
实现 strStr() 函数。

给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。如果不存在，则返回  -1。

示例 1:

输入: haystack = "hello", needle = "ll"
输出: 2
示例 2:

输入: haystack = "aaaaa", needle = "bba"
输出: -1
说明:

当 needle 是空字符串时，我们应当返回什么值呢？这是一个在面试中很好的问题。

对于本题而言，当 needle 是空字符串时我们应当返回 0 。这与C语言的 strstr() 以及 Java的 indexOf() 定义相符。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/implement-strstr
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L28_ImplementStrStr
{
    function strStr($haystack, $needle) {
        if(empty($needle)){
            return 0;
        }

        $haystackArr = str_split($haystack);
        $haystackLen = count($haystackArr);

        $needleArr = str_split($needle);
        $needleLen = count($needleArr);

        $tempStr = '';
        $match = 0;
        $tempK = null;

        $mf = false;
        for($i = 0;$i < $haystackLen;$i ++){

            //不处于匹配中
            if(!$mf){
                //剩余长度不足
                if($haystackLen - $i < $needleLen){
                    return -1;
                }

                //匹配到needle首位
                if($haystackArr[$i] == $needleArr[0]){
                    $tempK = $i;
                    $mf = true;
                }
            }

            //处于匹配中
            if($mf){
                $tempStr .= $haystackArr[$i];
                $match ++;
                //匹配长度达到
                if($match == $needleLen){
                    if($tempStr == $needle){
                        return $tempK;
                    }else{
                        //循环跳回tempK + 1位置,出本次循环时$i会+1
                        $i = $tempK;
                        $tempStr = '';
                        $match = 0;
                        $mf = false;
                    }
                }
            }
        }

        return -1;
    }
}

$haystack = 'abccd';
$needle = 'd';
$m = new L28_ImplementStrStr();
echo $m->strStr($haystack,$needle);
