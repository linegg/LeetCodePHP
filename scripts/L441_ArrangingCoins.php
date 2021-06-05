<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/5
 * Time: 11:59
 */

class L441_ArrangingCoins
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function arrangeCoins($n) {
        $i = 1;
        $sum = 0;
        while(true){
            $sum += $i;
            if($sum < $n){
                $i ++;
                continue;
            }elseif($sum > $n){
                return $i - 1;
            }elseif($sum == $n){
                return $i;
            }
        }
    }
}

$n = 11;
$m = new L441_ArrangingCoins();
echo $m->arrangeCoins($n);
