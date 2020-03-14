<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2019/12/1
 * Time: 20:04
 */

namespace app\lib;

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value) {
        $this->val = $value;
    }
}
