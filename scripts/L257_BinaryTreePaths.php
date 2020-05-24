<?php
/**
给定一个二叉树，返回所有从根节点到叶子节点的路径。

说明: 叶子节点是指没有子节点的节点。

示例:

输入:

1
/   \
2     3
\
5

输出: ["1->2->5", "1->3"]

解释: 所有根节点到叶子节点的路径为: 1->2->5, 1->3

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/binary-tree-paths
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L257_BinaryTreePaths
{
    /**
     * @param TreeNode $root
     * @return String[]
     */

    public $resSet = [];

    function binaryTreePaths($root) {
        if(empty($root)){
            return array();
        }
        $this->helper($root);
        $r = [];
        foreach($this->resSet as $v){
            $r[] = implode('->',$v);
        }
        return $r;
    }

    function helper($root,$path = []){
        $path[] = $root->val;
        //判断是否为叶子节点
        if(empty($root->left) && empty($root->right)){
            $this->resSet[] = $path;
            return;
        }

        if($root->left){
            if($t = $this->helper($root->left,$path)){
                $this->resSet[] = $t;
            }
        }

        if($root->right){
            if($t = $this->helper($root->right,$path)){
                $this->resSet[] = $t;
            }
        }
        return;
    }
}

$nums = '1(2(1,5),3)';
$root = ToolUtil::initBinaryNode($nums);
$m = new L257_BinaryTreePaths();
print_r($m->binaryTreePaths($root));

