<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/5/30
 * Time: 22:23
 */

class L401_BinaryWatch
{
    /**
     * @param Integer $turnedOn
     * @return String[]
     */
    public $minRes = array();
    public $hourRes = array();

    function readBinaryWatch($turnedOn) {
        $allot = array();
        for($i = 0;$i <= $turnedOn;$i ++){
            if($i > 4 || ($turnedOn - $i) > 6){
                continue;
            }
            $allot[] = [$i,$turnedOn - $i];
        }

        $res = [];
        foreach($allot as $v){
            $this->minRes = [];
            $this->hourRes = [];

            $this->getHour($v[0]);
            $this->getMin($v[1]);

            $this->hourRes = array_unique($this->hourRes);
            $this->minRes = array_unique($this->minRes);

            foreach($this->hourRes as $v0){
                foreach($this->minRes as $v1){
                    $res[] = "{$v0}:{$v1}";
                }
            }
        }

        return $res;
    }

    function getHour($num,$hour = 0,$hourArr = [8,4,2,1]){
        if($num == 0){
            $this->hourRes[] = '0';
        }

        foreach($hourArr as $k => $v){
            $temp = $v + $hour;
            if($temp > 11){
                continue;
            }

            if($num == 1){
                $this->hourRes[] = $temp;
            }else{
                unset($hourArr[$k]);
                $this->getHour($num - 1,$temp,$hourArr);
            }
        }
    }

    function getMin($num,$min = 0,$minArr = [32,16,8,4,2,1]){
        if($num == 0){
            $this->minRes[] = '00';
        }

        foreach($minArr as $k => $v){
            $temp = $v + $min;
            if($temp > 59){
                continue;
            }

            if($num == 1){
                $this->minRes[] = str_pad($temp,2,'0',STR_PAD_LEFT);
            }else{
                unset($minArr[$k]);
                $this->getMin($num - 1,$temp,$minArr);
            }
        }
    }
}

$turnedOn = 2;
$m = new L401_BinaryWatch();
print_r($m->readBinaryWatch($turnedOn));
