<?php
/**
给定一个二叉树，返回其节点值自底向上的层次遍历。 （即按从叶子节点所在层到根节点所在的层，逐层从左向右遍历）

例如：
给定二叉树 [3,9,20,null,null,15,7],

3
/ \
9  20
/  \
15   7
返回其自底向上的层次遍历为：

[
[15,7],
[9,20],
[3]
]

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
namespace app\scripts;
require_once '../autoload.php';
use app\lib\TreeNode;
use app\lib\ToolUtil;
class L107_BinaryTreeLevelOrderTraversal2
{
    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrderBottom($root) {
        if(empty($root)){
            return array();
        }
        $this->levelOrder($root,$rArr);
        return array_reverse($rArr);
    }

    function levelOrder($root,&$rArr,$l = 0){
        if(!empty($root)){
            if(!isset($rArr[$l])){
                $rArr[$l] = array();
            }
            array_push($rArr[$l],$root->val);

            !is_null($root->left) && $this->levelOrder($root->left,$rArr,$l + 1);
            !is_null($root->right) && $this->levelOrder($root->right,$rArr,$l + 1);
        }
    }
}

$rootStr = '5(4(,1(2,)),1(,4(2,)))';
$root = ToolUtil::initBinaryNode($rootStr);

$m = new L107_BinaryTreeLevelOrderTraversal2();
print_r($m->levelOrderBottom($root));
