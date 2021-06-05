<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2021/6/4
 * Time: 21:03
 */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;

class L404_SumOfLeftLeaves
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    public $sum = 0;

    function sumOfLeftLeaves($root) {
        $this->supplement($root);
        return $this->sum;
    }

    function supplement($root,$x = ''){
        if(is_null($root->left) && is_null($root->right)){
            if($x == 'left'){
                echo $this->sum."\n";
                $this->sum += $root->val;
            }
        }else{
            $this->supplement($root->left,'left');
            $this->supplement($root->right,'right');
        }
    }
}

$rootStr = '1';
$root = ToolUtil::initBinaryNode($rootStr);
print_r($root);
$m = new L404_SumOfLeftLeaves();
echo $m->sumOfLeftLeaves($root);
