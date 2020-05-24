<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/5/24
 * Time: 23:00
 */

class L263_UglyNumber
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    function isUgly($num) {
        if($num <= 0){
            return false;
        }

        if(abs($num) == 1){
            return true;
        }
        $primeN = [2,3,5];
        foreach($primeN as $v){
            $temp = $num / $v;
            if(abs($temp) == 1){
                return true;
            }
            //如果是整数
            if((float)$temp == floor($temp)){
                return $this->isUgly($temp);
            }
        }
        return false;
    }
}

$num = -1000;
$m = new L263_UglyNumber();
var_dump($m->isUgly($num));
