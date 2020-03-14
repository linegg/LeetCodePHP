<?php
/**
给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。

例如:
给定二叉树: [3,9,20,null,null,15,7],

3
/ \
9  20
/  \
15   7
返回其层次遍历结果：

[
[3],
[9,20],
[15,7]
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-level-order-traversal
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
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
