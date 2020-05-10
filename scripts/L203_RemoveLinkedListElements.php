<?php
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;

/**
删除链表中等于给定值 val 的所有节点。

示例:

输入: 1->2->6->3->4->5->6, val = 6
输出: 1->2->3->4->5
 */

class L203_RemoveLinkedListElements
{
    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function removeElements($head, $val) {
        $p = $head;
        return $this->helper($p,$head,$val);
    }

    function helper($p,$head,$val){

        if(isset($head->val) && $head->val == $val){
            $head = $head->next;
            $p = $head;
            return $this->helper($p,$head,$val);
        }

        if(!isset($p->next->val)){
            return $head;
        }

        if($p->next->val == $val){
            $p->next = $p->next->next;
            return $this->helper($p,$head,$val);
        }

        $p = $p->next;
        return $this->helper($p,$head,$val);
    }
}


$nums = [1,2,2,1];
$head = ToolUtil::initListNode($nums);
$m = new L203_RemoveLinkedListElements();
print_r(ToolUtil::listNodeToStr($m->removeElements($head,2)));

