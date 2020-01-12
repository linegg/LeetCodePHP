<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/1/12
 * Time: 18:00
 */

require_once './lib/ToolUtil.php';
class L102_BinaryTreeLevelOrderTraversal
{
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        $levels = array();
        if(empty($root)){
            return $levels;
        }
        $this->helper($root,$levels);
        return $levels;
    }

    function helper($tree,&$levels,$level = 0){
        if(empty($tree)){
            return $levels;
        }
        $levels[$level][] = $tree->val;
        $level ++;
        $this->helper($tree->left,$levels,$level);
        $this->helper($tree->right,$levels,$level);
    }
}
$rootStr = '5(4(,1(2,)),1(,4(2,)))';
$root = ToolUtil::initBinaryNode($rootStr);

$m = new L102_BinaryTreeLevelOrderTraversal();
print_r($m->levelOrder($root));
