<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/3/15
 * Time: 0:33
 */

namespace app\lib;
spl_autoload_register(function($className){
    $arr = explode('\\',$className);
    unset($arr[0]);
    $className = implode(DIRECTORY_SEPARATOR,$arr);
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR.$className.'.php';
    require_once "{$path}";
},true,true);
