<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2019/12/1
 * Time: 19:58
 */
require_once 'ListNode.php';
require_once 'TreeNode.php';

class ToolUtil
{
    public static function initListNode($initNumArr){
        $listNode = null;
        foreach($initNumArr as $num){
            if(empty($listNode)){
                $listNode = new ListNode($num);
                continue;
            }
            $listNode->add($num);
        }
        return $listNode;
    }

    public static function initBinaryNode(string $str)
    {
        $strArr = str_split($str);
        $stack = [];
        $p = NULL; // 指针
        $top = -1;
        $k = $j = 0;
        $root = NULL;
        foreach ($strArr as $ch) {
            switch ($ch) {
                case '(':
                    $top ++;
                    array_push($stack, $p);
                    $k = 1;
                    break;
                case ')':
                    array_pop($stack);
                    break;
                case ',':
                    $k = 2;
                    break;
                default:
                    $p = new TreeNode($ch);
                    if($root == NULL) {
                        $root = $p;
                    } else {
                        switch ($k) {
                            case 1:
                                end($stack)->left = $p;
                                break;
                            case 2:
                                end($stack)->right = $p;
                                break;
                        }
                    }
                    break;
            }
        }

        return $root;
    }
}