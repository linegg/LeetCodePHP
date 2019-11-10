<?php
/**
给定一个仅包含大小写字母和空格 ' ' 的字符串，返回其最后一个单词的长度。

如果不存在最后一个单词，请返回 0 。

说明：一个单词是指由字母组成，但不包含任何空格的字符串。

示例:

输入: "Hello World"
输出: 5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/length-of-last-word
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L58_LengthOfLastWord
{
    function lengthOfLastWord($s) {
        if($s == ' '){
            return 0;
        }

        $index = strrpos($s,' ');
        $endIndex = strlen($s) - 1;

        if($index === false){
            return ($endIndex + 1);
        }

        //空格在最后
        if($endIndex == $index){
            return $this->lengthOfLastWord(rtrim($s));exit();
        }

        $i = $endIndex - $index;
        return $i < 0 ? 0 : $i;
    }
}

$s = 'a ';
$m = new L58_LengthOfLastWord();
echo $m->lengthOfLastWord($s);


