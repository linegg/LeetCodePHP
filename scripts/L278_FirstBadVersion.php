<?php
/**
你是产品经理，目前正在带领一个团队开发新的产品。不幸的是，你的产品的最新版本没有通过质量检测。由于每个版本都是基于之前的版本开发的，所以错误的版本之后的所有版本都是错的。

假设你有 n 个版本 [1, 2, ..., n]，你想找出导致之后所有版本出错的第一个错误的版本。

你可以通过调用 bool isBadVersion(version) 接口来判断版本号 version 是否在单元测试中出错。实现一个函数来查找第一个错误的版本。你应该尽量减少对调用 API 的次数。

示例:

给定 n = 5，并且 version = 4 是第一个错误的版本。

调用 isBadVersion(3) -> false
调用 isBadVersion(5) -> true
调用 isBadVersion(4) -> true

所以，4 是第一个错误的版本。 

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/first-bad-version
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class VersionControl{

    private $x;

    public function __construct($n){
        $this->x = mt_rand(1,$n);
        $this->x = 1;
        echo "badVersion:{$this->x}\n";
    }

    public function isBadVersion($n){
        if($n >= $this->x){
            return true;
        }
        return false;
    }
}

class L278_FirstBadVersion extends VersionControl
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $x = ceil($n/2);
        $lastX = $n;
        $i = 0;
        while(true) {
            $sRange = abs($lastX - $x);
            $isBad = $this->isBadVersion($x);
            if($isBad){
                if($x == 1){
                    return $x;
                }

                if(abs($lastX - $x) == 1 && $i > 1){
                    return $x;
                }
                $lastX = $x;
                $x = $x - ceil($sRange/2);
            }else{
                if($x == $n){
                    return null;
                }

                if(abs($lastX - $x) == 1){
                    return $x + 1;
                }

                $lastX = $x;
                $x = $x + ceil($sRange/2);
            }
            $i ++;
        }
    }


}

$n = 3;
$m = new L278_FirstBadVersion($n);
echo $m->firstBadVersion($n);
