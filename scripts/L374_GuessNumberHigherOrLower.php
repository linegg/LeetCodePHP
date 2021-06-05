<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/5/22
 * Time: 15:42
 */

class L374_GuessNumberHigherOrLower
{
    /**
     * @param  Integer  $n
     * @return Integer
     */

    private $pick = 100;

    //累加
    function guessNumber1($guess) {
        if($this->guess($guess) != 0){
            if($this->guess($guess) < 0){
                return $this->guessNumber1(-- $guess);
            }else{
                return $this->guessNumber1(++ $guess);
            }
        }

        return $guess;
    }

    function guessNumber2($guess){
        //猜大了
        if($this->guess($guess) < 0){
            $min = 1;
            $max = $guess;
        }
        //猜小了
        elseif($this->guess($guess) > 0){
            $min = $guess;
            $max = pow(2,31) - 1;
        }else{
            return $guess;
        }

        return $this->supportGuess($min,$max);
    }

    function supportGuess($min,$max){
        $guess = $min + floor(($max - $min)/2);
        echo $guess."\n";
        $v = $this->guess($guess);
        //猜大了
        if($v < 0){
            $max = $guess;
            echo "guess higher {$min}-{$max}\n";
            return $this->supportGuess($min,$max);
        }
        //猜小了
        elseif($v > 0){
            $min = $guess;
            echo "guess lower {$min}-{$max}\n";
            return $this->supportGuess($min,$max);
        }else{
            return $guess;
        }
    }

    function guess($guess){
        if($this->pick > $guess){
            return 1;
        }elseif($this->pick < $guess){
            return -1;
        }else{
            return 0;
        }
    }
}

$guess = 1111;
$m = new L374_GuessNumberHigherOrLower();
var_dump($m->guessNumber2($guess));

