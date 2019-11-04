<?php
/**
报数序列是一个整数序列，按照其中的整数的顺序进行报数，得到下一个数。其前五项如下：

1.     1
2.     11
3.     21
4.     1211
5.     111221
1 被读作  "one 1"  ("一个一") , 即 11。
11 被读作 "two 1s" ("两个一"）, 即 21。
21 被读作 "one 2",  "one 1" （"一个二" ,  "一个一") , 即 1211。

给定一个正整数 n（1 ≤ n ≤ 30），输出报数序列的第 n 项。

注意：整数顺序将表示为一个字符串。

 

示例 1:

输入: 1
输出: "1"
示例 2:

输入: 4
输出: "1211"

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/count-and-say
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L38_CountAndSay
{
    function countAndSay($n) {
        if($n == 1){
            return "1";
        }

        if($n < 1 || $n > 30){
            return 0;
        }

        $nSay = "1";
        for($i = 1;$i <= 30;$i ++){
            if($n == $i){
                return $nSay;
            }
            $nSay = $this->say($nSay);
        }
    }

    public function say($str){
        $strArr = str_split($str);
        $sequence = 0;
        $lastWord = null;
        $say = '';

        $preWord = $strArr[0];
        $strLen = strLen($str);

        for($i = 0;$i <= $strLen;$i ++){
            if($i == $strLen){
                $say .= ($sequence.$preWord);
                break;
            }

            if($strArr[$i] == $preWord){
                $sequence ++ ;
            }else{
                //终止连续值
                $say .= ($sequence.$preWord);
                $sequence = 1;
            }
            $preWord = $strArr[$i];
        }
        return $say;
    }
}
//这题简单描述为
//通过一定规律从上一个字符串得到下一个字符串
//上一字符串A的连续X个相同数字M，在下一字符串中为XM
//任意输入一串如：1112211221
//3个1,2个2,2个1,2个2,1个1--->31 22 21 22 11

$n = 6;
$m = new L38_CountAndSay();
echo $m->countAndSay($n);
