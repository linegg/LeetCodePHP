<?php
/**
 * 将一个按照升序排列的有序数组，转换为一棵高度平衡二叉搜索树。

本题中，一个高度平衡二叉树是指一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过 1。

示例:

给定有序数组: [-10,-3,0,5,9],

一个可能的答案是：[0,-3,9,-10,null,5]，它可以表示下面这个高度平衡二叉搜索树：

      0
     / \
   -3   9
   /   /
 -10  5

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/convert-sorted-array-to-binary-search-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 * */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\TreeNode;

class L108_ConvertSortedArraytoBinarySearchTree
{
    /**
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        $root = $this->helper($nums,0,count($nums) - 1);
        return $root;
    }

    function helper($nums,$left,$right){
        if($left > $right){
            return;
        }

        $p = (int)(($left + $right)/2);
        $root = new TreeNode($nums[$p]);
        $root->left = $this->helper($nums,$left,$p - 1);
        $root->right = $this->helper($nums,$p + 1,$right);

        return $root;
    }
}

$nums = [-10,-3,0,5,9];
$m = new L108_ConvertSortedArraytoBinarySearchTree();
print_r($m->sortedArrayToBST($nums));
