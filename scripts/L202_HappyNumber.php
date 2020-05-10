<?php
/**
编写一个算法来判断一个数 n 是不是快乐数。

「快乐数」定义为：对于一个正整数，每一次将该数替换为它每个位置上的数字的平方和，然后重复这个过程直到这个数变为 1，也可能是 无限循环 但始终变不到 1。如果 可以变为  1，那么这个数就是快乐数。

如果 n 是快乐数就返回 True ；不是，则返回 False 。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/happy-number
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L202_HappyNumber
{
    public $nSet = array();
    /**
     * @param Integer $n
     * @return Boolean
     */
    function isHappy($n) {
        return $this->helper($n);
    }

    function helper($n){
        $nArr = str_split($n);
        if(array_sum($nArr) == 1){
            return true;
        }else{
            $nn = 0;
            foreach($nArr as $v){
                $nn += ($v * $v);
            }

            if(in_array($nn,$this->nSet)){
                return false;
            }else{
                array_push($this->nSet,$nn);
            }

            return $this->helper($nn);
        }
    }
}

$n = 11;
$m = new L202_HappyNumber();
var_dump($m->isHappy($n));
