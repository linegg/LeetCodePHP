<?php
/**
假设你正在爬楼梯。需要 n 阶你才能到达楼顶。

每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？

注意：给定 n 是一个正整数。

示例 1：

输入： 2
输出： 2
解释： 有两种方法可以爬到楼顶。
1.  1 阶 + 1 阶
2.  2 阶
示例 2：

输入： 3
输出： 3
解释： 有三种方法可以爬到楼顶。
1.  1 阶 + 1 阶 + 1 阶
2.  1 阶 + 2 阶
3.  2 阶 + 1 阶

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/climbing-stairs
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L70_ClimbingStairs
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        return $this->dynamicP($n);
    }

    function violence($i,$n,$m){
        if($i > $n){
            return 0;
        }

        if($i == $n){
            return 1;
        }

        if(isset($m[$i]) && $m[$i] > 0){
            return $m[$i];
        }
        $m[$i] = $this->violence($i + 1,$n,$m) + $this->violence($i + 2,$n,$m);

        return $m[$i];
    }

    function dynamicP($n){
        $dp = array();
        $dp[1] = 1;
        $dp[2] = 2;

        for($i = 3;$i <= $n;$i ++){
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }
}

$n = 35;
$m = new L70_ClimbingStairs();
echo $m->climbStairs($n);
