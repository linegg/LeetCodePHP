<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2019/12/1
 * Time: 19:58
 */

namespace app\lib;

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

    public static function listNodeToArray($head,$array = []){
        if(isset($head->val)){
            $array[] = $head->val;
            $head = $head->next;
            return self::listNodeToArray($head,$array);
        }
        return $array;
    }

    public static function listNodeToStr($head){
        $arr = self::listNodeToArray($head);
        if(!empty($arr)){
            return implode(',',$arr);
        }
        return '';
    }
}
