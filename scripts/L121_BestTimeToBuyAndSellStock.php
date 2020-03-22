<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/3/22
 * Time: 16:14
 */

class L121_BestTimeToBuyAndSellStock
{
    /**
     * @param Integer[] $prices
     * @return Integer
     */

    function maxProfit($prices) {
        $maxProfit = 0;
        $cIndex = count($prices) - 1;
        for($i = $cIndex;$i > 0;$i --){
            $min = min(array_slice($prices,0,$i));
            $diff = $prices[$i] - $min;
            if($diff > $maxProfit){
                $maxProfit = $diff;
            }
        }
        return $maxProfit;
    }

    //超出时间限制了
    function maxProfit2($prices) {
        $maxProfit = 0;
        foreach($prices as $k => $v){
            for($i = $k + 1;isset($prices[$i]);$i ++){
                $diff = $prices[$i] - $prices[$k];
                if($diff <= 0){
                    continue;
                }
                if($diff > $maxProfit){
                    $maxProfit = $diff;
                }
            }
        }
        return $maxProfit;
    }
}

$prices = [7,1,5,3,6,4];
$m = new L121_BestTimeToBuyAndSellStock();
echo $m->maxProfit($prices);
