<?php
/**
给定一个二叉树，检查它是否是镜像对称的。

例如，二叉树 [1,2,2,3,4,4,3] 是对称的。

1
/ \
2   2
/ \ / \
3  4 4  3
但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:

1
/ \
2   2
\   \
3    3

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/symmetric-tree
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L101_SymmetricTree
{
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        return $this->isMirror($root,$root);
    }

    function isMirror($t1,$t2){
        if($t1 === null && $t2 === null) return true;
        if($t1 === null || $t2 === null ) return false;
        return ($t1->val == $t2->val) && $this->isMirror($t1->left,$t2->right) && $this->isMirror($t1->right,$t2->left);
    }
}

$rootStr = '1(2(6,),2(,6))';
$rootStr = '1(2(,3),2(3,))';
$rootStr = '1(0,)';
$rootStr = '5(4(,1(2,)),1(,4(2,)))';
$m = new L101_SymmetricTree();

$root = ToolUtil::initBinaryNode($rootStr);
var_dump($m->isSymmetric($root));
