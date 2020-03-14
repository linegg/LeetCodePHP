<?php
/**
将两个有序链表合并为一个新的有序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 

示例：

输入：1->2->4, 1->3->4
输出：1->1->2->3->4->4

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/merge-two-sorted-lists
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L21_MergeTwoSortedLists
{
    function mergeTwoLists($l1, $l2) {

        if(empty($l1)){
            return $l2;
        }

        if(empty($l2)){
            return $l1;
        }

        //以更小的头作为排序初始链表
        if($l1->val < $l2->val){
            $l3 = clone $l1;
            $l1 = $l1->next;
        }else{
            $l3 = clone $l2;
            $l2 = $l2->next;
        }

        //p作类似于l3的指针,使用p去改变l3链表的值
        $p = $l3;
        //l3此时是入参的原l1
        //入参 l1:126 l2:45
        //入循环时： l3:126 p:126 l1:26 l2:45
        //一次循环后:l3:126 p:26 l1：6 l2:45
        //二次循环后:l3:1245 p:45 l1：6 l2:5
        //三次循环后:l3:1245 p:5 l1:6 l2:null
        while(!empty($l1) && !empty($l2)){
            if($l1->val < $l2->val){
                //赋值next,实际此时只需要第一个节点，但链表特性,后续的节点也会过来,实际没用
                //用new ListNode($l1->val)也行,多占点内存
                $p->next = $l1;
                //l1缩短,移动
                $l1 = $l1->next;
                //p移动
                //此处注意,p和l3是两个不同的变量,指向同一个真正内容
                //借用p改变"真正内容"的值,此处p被重新赋值,并不会导致l3被赋值成与p一样的值
                $p = $p->next;
            }else{
                $p->next = $l2;
                $l2 = $l2->next;
                $p = $p->next;
            }
        }

        if($l1){
            $p->next = $l1;
        }

        if($l2){
            $p->next = $l2;
        }

        return $l3;
    }
}

//题目提供的数据结构
class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val) {
         $this->val = $val;
     }

     //多加个尾插用于初始化
     public function add($num){
        $node = $this;
        while($node->next){
            $node = $node->next;
        }
        $node->next = new ListNode($num);
     }
}


//为了程序能运行调试，先初始化l1和l2
function initListNode($initNumArr){
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

$l1 = initListNode([1,2,6]);
$l2 = initListNode([4,5]);
$m = new L21_MergeTwoSortedLists();
print_r($m->mergeTwoLists($l1,$l2));
