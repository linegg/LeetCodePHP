<?php
/**
给定一个字符串，请你找出其中不含有重复字符的 最长子串 的长度。

示例 1:

输入: "abcabcbb"
输出: 3
解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
示例 2:

输入: "bbbbb"
输出: 1
解释: 因为无重复字符的最长子串是 "b"，所以其长度为 1。
示例 3:

输入: "pwwkew"
输出: 3
解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3。
     请注意，你的答案必须是 子串 的长度，"pwke" 是一个子序列，不是子串。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-substring-without-repeating-characters
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L3_LongestSubString
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        if(empty($s)){
            return 0;
        }
        $sArr = str_split($s);
        $count = count($sArr);
        $activeLen = 0;
        $maxLen = 0;
        $maxArr = array();

        for($i = 0;$i < $count;$i ++){
            $j = array_search($sArr[$i],$maxArr);
            if(is_numeric($j)){
                $maxArr = [];
                $i = $j + 1;
                $maxArr[$i] = $sArr[$i];
                $activeLen = 1;
                continue;
            }

            $maxArr[$i] = $sArr[$i];
            $activeLen ++;
            if($activeLen > $maxLen){
                $maxLen = $activeLen;
            }
        }

        return $maxLen;
    }
}

$s = 'dvdf';
$s = 'abcabcbb';
$m = new L3_LongestSubString();
echo $m->lengthOfLongestSubstring($s);
