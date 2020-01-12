<?php
/**
 * 给定两个二叉树，编写一个函数来检验它们是否相同。

如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。

示例 1:

输入:       1         1
/ \       / \
2   3     2   3

[1,2,3],   [1,2,3]

输出: true
示例 2:

输入:      1          1
/           \
2             2

[1,2],     [1,null,2]

输出: false
示例 3:

输入:       1         1
/ \       / \
2   1     1   2

[1,2,1],   [1,1,2]

输出: false

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/same-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 * */


require_once './lib/ToolUtil.php';
class L100_SameTree
{
    function isSameTree($p, $q) {
        $this->preOrder($p,$pTreeArr);
        $this->preOrder($q,$qTreeArr);

        if($pTreeArr != $qTreeArr){
            return false;
        }
        return true;
    }

    function preOrder($tree,&$treeArr){
        if($tree != null){
            $treeArr[] = $tree->val;
            if($tree->left || $tree->right){
                if($tree->left){
                    $this->preOrder($tree->left,$treeArr);
                }else{
                    $treeArr[] = null;
                }

                if($tree->right){
                    $this->preOrder($tree->right,$treeArr);
                }else{
                    $treeArr[] = null;
                }
            }
        }
    }
}

$pStr = '1(2(,6),3(4,5))';
$qStr = '1(,3)';

$m = new L100_SameTree();

$p = ToolUtil::initBinaryNode($pStr);
$q = ToolUtil::initBinaryNode($qStr);

var_dump($m->isSameTree($p,$q));


