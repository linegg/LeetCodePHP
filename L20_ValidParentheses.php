<?php
/**
给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。

有效字符串需满足：

左括号必须用相同类型的右括号闭合。
左括号必须以正确的顺序闭合。
注意空字符串可被认为是有效字符串。

示例 1:

输入: "()"
输出: true
示例 2:

输入: "()[]{}"
输出: true
示例 3:

输入: "(]"
输出: false
示例 4:

输入: "([)]"
输出: false
示例 5:

输入: "{[]}"
输出: true

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/valid-parentheses
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L20_ValidParentheses
{
    public $left = ['(' => 1,'{' => 2,'[' => 3];
    public $right = [')' => 1,'}' => 2,']' => 3];

    function isValid($s) {
        $sArr = str_split($s);
        $leftSet = array();
        $leftKey = array_keys($this->left);
        foreach($sArr as $k => $v){
            //逐个
            //如果是左括号
            if(in_array($v,$leftKey)){
                //压入括号值进入左集合头部
                array(array_unshift($leftSet,$this->left[$v]));
            }else{
                //如果是右括号
                //如果第一个就不对
                if($k == 0){
                    if(in_array($v,array_keys($this->right))){
                        return false;
                    }
                    return true;
                }
                //无法匹配
                if($this->right[$v] != $leftSet[0]){
                    return false;
                }else{
                    //成功匹配一对括号,推走左集合头部
                    array_shift($leftSet);
                }
            }
        }

        //左括号未清除完毕
        if($leftSet){
            return false;
        }
        return true;
    }
}

$s = '{]';
$m = new L20_ValidParentheses();
var_dump($m->isValid($s));
