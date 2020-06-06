<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/6/6
 * Time: 17:02
 */
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L237_DeleteNodeInALinkedList
{
    /**
     * @param ListNode $node
     * @return
     */
    function deleteNode($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }
}

$nums = [1,2,3,4];
$head = ToolUtil::initListNode($nums);
$m = new L237_DeleteNodeInALinkedList();
$m->deleteNode($head);

