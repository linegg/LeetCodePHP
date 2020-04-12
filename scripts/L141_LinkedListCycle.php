<?php
/**
 * Created by PhpStorm.
 * User: linyz
 * Date: 2020/4/12
 * Time: 21:11
 */
namespace app\scripts;
require_once '../autoload.php';
use app\lib\ToolUtil;
class L141_LinkedListCycle
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function hasCycle($head) {
        $p = $head;
        $arr = array();
        while($p){
            if(in_array($p,$arr)){
                return true;
            }
            array_push($arr,$p);
            $p = $p->next;
        }
        return false;
    }
}

$arr = [3,2,0,-4];
$head = ToolUtil::initListNode($arr);

$m = new L141_LinkedListCycle();
var_dump($m->hasCycle($head));
