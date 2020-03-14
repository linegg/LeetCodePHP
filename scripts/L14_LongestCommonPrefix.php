<?php
/**
编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串 ""。

示例 1:

输入: ["flower","flow","flight"]
输出: "fl"
示例 2:

输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。
说明:

所有输入只包含小写字母 a-z 。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-common-prefix
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L14_LongestCommonPrefix
{
    function longestCommonPrefix($strs) {
        $commonPrefix = '';
        $newCommonPrefix = '';

        //取第一个字符串作为基准
        $firstStr = $strs[0];
        if(empty($firstStr)){
            return '';
        }
        //第一个字符串转数组
        $firstStrArr = str_split($firstStr);
        //去掉第一个
        unset($strs[0]);
        foreach($firstStrArr as $k => $firstStrWord){
            //第一个字符串逐位拼接前缀
            $newCommonPrefix .= $firstStrWord;

            foreach($strs as $str){
                if($newCommonPrefix != substr($str,0,$k + 1)){
                    return $commonPrefix;
                }
            }
            //通过上述循环即说明前缀有效
            $commonPrefix = $newCommonPrefix;
        }
        return $commonPrefix;
    }
}

$strs = ['fff','ff1'];
$m = new L14_LongestCommonPrefix();
echo $m->longestCommonPrefix($strs);
