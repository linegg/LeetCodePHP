<?php
/**
给定一个字符串，验证它是否是回文串，只考虑字母和数字字符，可以忽略字母的大小写。

说明：本题中，我们将空字符串定义为有效的回文串。

示例 1:

输入: "A man, a plan, a canal: Panama"
输出: true
示例 2:

输入: "race a car"
输出: false

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/valid-palindrome
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L125_ValidPalindrome
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {

        $sArr = str_split($s);
        $count = count($sArr);
        $endIndex = $count - 1;
        $halfIndex = ceil($endIndex/2);
        $i2 = $endIndex;

        for($i = 0;$i < $halfIndex;$i ++){
            if(!preg_match_all('/[A-Za-z0-9]/',$sArr[$i])){
                continue;
            }
            $i2 = $this->isEqual($sArr,$i,$i2);

            if($i2 === false){
                return false;
            }
        }
        return true;
    }

    function isEqual($arr,$i1,$i2){
        if(strtoupper($arr[$i1]) == strtoupper($arr[$i2])){
            return --$i2;
        }else{
            if(!preg_match_all('/[A-Za-z0-9]/',$arr[$i2])){
                return $this->isEqual($arr,$i1,-- $i2);
            }
        }
        return false;
    }
}

$s = 'aba';
$m = new L125_ValidPalindrome();
var_dump($m->isPalindrome($s));
