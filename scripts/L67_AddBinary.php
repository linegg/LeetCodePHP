<?php
/**
给定两个二进制字符串，返回他们的和（用二进制表示）。

输入为非空字符串且只包含数字 1 和 0。

示例 1:

输入: a = "11", b = "1"
输出: "100"
示例 2:

输入: a = "1010", b = "1011"
输出: "10101"

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/add-binary
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L67_AddBinary
{
    function addBinary($a, $b) {
        $aLastIndex = strlen($a) - 1;
        $bLastIndex = strlen($b) - 1;

        if($aLastIndex > $bLastIndex){
            $b = str_pad($b,$aLastIndex + 1,'0',STR_PAD_LEFT);
        }

        if($aLastIndex < $bLastIndex){
            $a = str_pad($a,$bLastIndex + 1,'0',STR_PAD_LEFT);
        }

        $aArray = str_split($a);
        $bArray = str_split($b);

        $resultStr = '';
        $carry = 0;

        $loop = $aLastIndex > $bLastIndex ? $aLastIndex : $bLastIndex;

        for($i = $loop;$i >= 0;$i --){
            if($carry){
                if(($aArray[$i] + $bArray[$i] + 1) == 3){
                    if($i == 0){
                        $resultStr = '11'.$resultStr;
                    }else{
                        $resultStr = '1'.$resultStr;
                        $carry = 2;
                        continue;
                    }
                }elseif(($aArray[$i] + $bArray[$i] + 1) == 2){
                    if($i == 0){
                        $resultStr = '10'.$resultStr;
                    }else{
                        $resultStr = '0'.$resultStr;
                        $carry = 1;
                        continue;
                    }

                }else{
                    $resultStr = (string)($aArray[$i] + $bArray[$i] + 1).$resultStr;
                }
                $carry = 0;
            }else{
                if(($aArray[$i] + $bArray[$i]) == 2){
                    if($i == 0){
                        $resultStr = '10'.$resultStr;
                    }else{
                        $resultStr = '0'.$resultStr;
                        $carry = 1;
                    }
                }else{
                    $resultStr = (string)($aArray[$i] + $bArray[$i]).$resultStr;
                }
            }
        }
        return $resultStr;
    }
}

$a = '101';
$b = '111';
$m = new L67_AddBinary();
echo $m->addBinary($a,$b);


