<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/7
 * Time: 15:41
 */

class L290_WordPattern
{
    /**
     * @param String $pattern
     * @param String $str
     * @return Boolean
     */
    function wordPattern($pattern, $str) {
        $strArr = explode(' ',$str);
        $patternArr = str_split($pattern);
        if(count($strArr) != count($patternArr) || empty($pattern) || empty($str)){
            return false;
        }
        $patternMap = array();
        $strMap = array();

        foreach($patternArr as $k => $v){

            if(isset($patternMap[$v]) && $patternMap[$v] != $strArr[$k]){
                return false;
            }

            if(isset($strMap[$strArr[$k]]) && $strMap[$strArr[$k]] != $v){
                return false;
            }

            $patternMap[$v] = $strArr[$k];
            $strMap[$strArr[$k]] = $v;
        }
        return true;
    }
}

$pattern = "abba";
$str = "dog cat cat dog";

$m = new L290_wordPattern();
var_dump($m->wordPattern($pattern,$str));
