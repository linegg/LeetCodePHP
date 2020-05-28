<?php
/**
请判断一个链表是否为回文链表。

示例 1:

输入: 1->2
输出: false
示例 2:

输入: 1->2->2->1
输出: true
进阶：
你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/palindrome-linked-list
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L234_PalindromeLinkedList
{
    /**
     * @param ListNode $head
     * @return Boolean
     */

    public $data = array();

    function isPalindrome($head) {
        $this->helper($head);
        if(array_reverse($this->data) == $this->data){
            return true;
        }
        return false;
    }

    function helper($head){
        if(!isset($head->val) || $head->val === null){
            return;
        }
        $this->data[] = $head->val;
        $p = $head->next;
        return $this->helper($p);
    }
}

$nums = [1,0,0];
$head = ToolUtil::initListNode($nums);
$m = new L234_PalindromeLinkedList();
var_dump($m->isPalindrome($head));
