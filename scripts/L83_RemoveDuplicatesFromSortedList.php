<?php
/**
给定一个排序链表，删除所有重复的元素，使得每个元素只出现一次。

示例 1:

输入: 1->1->2
输出: 1->2
示例 2:

输入: 1->1->2->3->3
输出: 1->2->3

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/remove-duplicates-from-sorted-list
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L83_RemoveDuplicatesFromSortedList
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head) {
        $p = $head;
        while(!empty($p->next)){
            if($p->val == $p->next->val){
                $p->next = $p->next->next;
            }else{
                $p = $p->next;
            }
        }
        return $head;
    }
}

$head = ToolUtil::initListNode([1,1,1,1,2,2]);
$m = new L83_RemoveDuplicatesFromSortedList();
print_r($m->deleteDuplicates($head));
