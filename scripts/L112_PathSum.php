<?php
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
/**
给定一个二叉树和一个目标和，判断该树中是否存在根节点到叶子节点的路径，这条路径上所有节点值相加等于目标和。

说明: 叶子节点是指没有子节点的节点。

示例: 
给定如下二叉树，以及目标和 sum = 22，

5
/ \
4   8
/   / \
11  13  4
/  \      \
7    2      1
返回 true, 因为存在目标和为 22 的根节点到叶子节点的路径 5->4->11->2。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/path-sum
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L112_PathSum
{
    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Boolean
     */
    function hasPathSum($root, $sum) {
        if(empty($root)){
            return false;
        }
        return $this->helper($root,0,$sum);
    }

    function helper($root,$cSum,$sum){
        $cSum += $root->val;

        //是叶子节点
        if(empty($root->left) && empty($root->right)){
            if($cSum == $sum){
                return true;
            }else{
                return false;
            }
        }

        if(!empty($root->left)){
            $l_result = $this->helper($root->left,$cSum,$sum);
        }

        if(!empty($root->right)){
            $r_result = $this->helper($root->right,$cSum,$sum);
        }

        if(isset($l_result) && isset($r_result)){
            return $l_result || $r_result;
        }elseif(isset($l_result)){
            return $l_result;
        }elseif(isset($r_result)){
            return $r_result;
        }

    }
}
$sum = 9;
$rootStr = '1(2(4,3),3(3,))';
$root = ToolUtil::initBinaryNode($rootStr);

$m = new L112_PathSum();
var_dump($m->hasPathSum($root,$sum));
