<?php
/**
编写一个函数，以字符串作为输入，反转该字符串中的元音字母。

示例 1:

输入: "hello"
输出: "holle"
示例 2:

输入: "leetcode"
输出: "leotcede"
说明:
元音字母不包含字母"y"。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/reverse-vowels-of-a-string
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L345_ReverseVowelsOfAString
{
    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        $vowel = ['a','e','i','o','u','A','E','I','O','U'];
        $sArr = str_split($s);
        $map = array();
        foreach($sArr as $k => $v){
            if(in_array($v,$vowel)){
                $map[$k] = $v;
            }
        }

        if(count($map) > 1){
            foreach($map as $mk => $mv){
                end($map);
                $last = key($map);
                $s[$last] = $mv;
                $s[$mk] = $map[$last];
                unset($map[$last]);
            }
        }

        return $s;
    }
}

$s = "hello";
$m = new L345_ReverseVowelsOfAString();

echo $m->reverseVowels($s);
