<?php
/**
Given a string, find the first non-repeating character in it and return its index. If it doesn't exist, return -1.

Examples:

s = "leetcode"
return 0.

s = "loveleetcode"
return 2.
 

Note: You may assume the string contains only lowercase English letters.

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/first-unique-character-in-a-string
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L387_FirstUniqueCharacterInAString
{
    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        if(empty($s)){
            return -1;
        }
        $sArr = str_split($s);
        $tempArr = [];
        $tempS = $sArr;
        foreach($sArr as $k => $v){
            unset($tempS[$k]);

            if(in_array($v,$tempArr)){
                continue;
            }

            if(in_array($v,$tempS)){
                $tempArr[] = $v;
                continue;
            }

            return $k;
        }
        return -1;
    }
}

$s = 'leetclode';
$m = new L387_FirstUniqueCharacterInAString();
echo $m->firstUniqChar($s);
