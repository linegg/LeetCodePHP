<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/1/12
 * Time: 17:24
 */

class BTreeUtil
{
    //前序遍历 根->左->右
    function preorder($tree,&$treeArr){
        if($tree != null){
            $treeArr[] = $tree->val;
            if($tree->left || $tree->right){
                if($tree->left){
                    $this->preorder($tree->left,$treeArr);
                }else{
                    $treeArr[] = null;
                }

                if($tree->right){
                    $this->preorder($tree->right,$treeArr);
                }else{
                    $treeArr[] = null;
                }
            }
        }
    }

    //中序遍历 左->根->右
    function inorder($tree,&$treeArr){
        if($tree != null){
            if(!is_null($tree->left) || !is_null($tree->right)){
                if(!is_null($tree->left)){
                    $this->inorder($tree->left,$treeArr);
                }else{
                    $treeArr[] = null;
                }
                $treeArr[] = $tree->val;
                if(!is_null($tree->right)){
                    $this->inorder($tree->right,$treeArr);
                }else{
                    $treeArr[] = null;
                }
            }else{
                $treeArr[] = $tree->val;
            }
        }
    }

    //后序遍历 右->根->左
    function postorder($tree,&$treeArr){
        if($tree != null){
            if(!is_null($tree->left) || !is_null($tree->right)){
                if(!is_null($tree->right)){
                    $this->inorder($tree->right,$treeArr);
                }else{
                    $treeArr[] = null;
                }
                $treeArr[] = $tree->val;
                if(!is_null($tree->left)){
                    $this->inorder($tree->left,$treeArr);
                }else{
                    $treeArr[] = null;
                }
            }else{
                $treeArr[] = $tree->val;
            }
        }
    }
}
