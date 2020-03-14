<?php
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;

/**
 * 给定一个二叉树，找出其最小深度。
 *
 * 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 *
* 说明: 叶子节点是指没有子节点的节点。
 *
* 示例:
 *
* 给定二叉树 [3,9,20,null,null,15,7],
 *
* 3
* / \
* 9  20
  * /  \
 * 15   7
* 返回它的最小深度  2.
 *
* 来源：力扣（LeetCode）
* 链接：https://leetcode-cn.com/problems/minimum-depth-of-binary-tree
* 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
class L111_MinimumDeptOfBinaryTree
{
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDepth($root) {

        return $this->TreeMinDepth($root);
    }

    function TreeMinDepth($root)
    {
        if (null === $root) {
            return 0;
        }

        if (null === $root->left && null === $root->right) {
            return 1;
        }

        if (!empty($root->left)) {
            $lm = $this->TreeMinDepth($root->left);
        }

        if (!empty($root->right)) {
            $rm = $this->TreeMinDepth($root->right);
        }

        if (isset($lm) && isset($rm)) {
            $m = min($lm, $rm);
        } elseif (isset($lm)) {
            $m = $lm;
        } elseif(isset($rm)) {
            $m = $rm;
        }else{
            $m = 1;
        }
        return $m + 1;
    }
}

$rootStr = '1(2(,3),3(3,))';
$root = ToolUtil::initBinaryNode($rootStr);

$m = new L111_MinimumDeptOfBinaryTree();
echo $m->minDepth($root);
