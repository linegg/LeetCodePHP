<?php
/**
 * 链表结构
 */
namespace app\lib;
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
