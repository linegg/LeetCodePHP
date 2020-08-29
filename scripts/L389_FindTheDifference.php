<?php
/**
给定两个字符串 s 和 t，它们只包含小写字母。

字符串 t 由字符串 s 随机重排，然后在随机位置添加一个字母。

请找出在 t 中被添加的字母。

 

示例:

输入：
s = "abcd"
t = "abcde"

输出：
e

解释：
'e' 是那个被添加的字母。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/find-the-difference
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L389_FindTheDifference
{
    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t) {

        $s = str_split($s);
        $t = str_split($t);

        sort($t);
        sort($s);
        $temp = array_diff_assoc($t,$s);

        return array_shift($temp);
    }
}

$s = "leet";
$t = "leeta";
$m = new L389_FindTheDifference();
echo $m->findTheDifference($s,$t);
