<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/1/12
 * Time: 16:56
 */

require_once './lib/ToolUtil.php';
class L104_MaximumDepthOfBinaryTree
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if($root === null){
            return 0;
        }else{
            $leftHigh = $this->maxDepth($root->left);
            $rightHigh = $this->maxDepth($root->right);
            return max($leftHigh,$rightHigh) + 1;
        }
    }
}

$rootStr = '5(4(,1(2,)),1(,4(2,)))';

$m = new L104_MaximumDepthOfBinaryTree();
$root = ToolUtil::initBinaryNode($rootStr);

echo $m->maxDepth($root);
