<?php
/**
运用你所掌握的数据结构，设计和实现一个  LRU (最近最少使用) 缓存机制。它应该支持以下操作： 获取数据 get 和 写入数据 put 。

获取数据 get(key) - 如果密钥 (key) 存在于缓存中，则获取密钥的值（总是正数），否则返回 -1。
写入数据 put(key, value) - 如果密钥已经存在，则变更其数据值；如果密钥不存在，则插入该组「密钥/数据值」。当缓存容量达到上限时，它应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。

 

进阶:

你是否可以在 O(1) 时间复杂度内完成这两种操作？

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/lru-cache
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

class L146_LRUCache
{
    private $usedData = array();
    private $data = array();
    private $currentLength = 0;
    private $capacity = 0;
    private $doTimes = 0;
    private $_key = '_LRU';
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        $key = $this->buildKey($key);
        if(empty($this->data[$key])){
            return -1;
        }
        $this->doTimes ++;
        $this->usedData[$key] = $this->doTimes;
        return $this->data[$key];
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        $this->currentLength ++;
        $key = $this->buildKey($key);

        if($this->currentLength > $this->capacity){
            if(!isset($this->data[$key])){
                $this->autoRemove();
            }
        }

        if(isset($this->data[$key])){
            $this->currentLength --;
        }

        $this->doTimes ++;
        $this->data[$key] = $value;
        $this->usedData[$key] = $this->doTimes;
    }

    private function autoRemove(){
        asort($this->usedData);
        foreach($this->usedData as $k => $v){
            unset($this->data[$k]);
            unset($this->usedData[$k]);
            break;
        }
        $this->currentLength --;
    }

    private function buildKey($key){
        return (string)$key.$this->_key;
    }
}

$capacity = 10;
$arr = [[10,13],[3,17],[3,11],[10],[4,10],[4,10],[3],[10]];
$m = new L146_LRUCache($capacity);
foreach($arr as $v){
    if(count($v) == 1){
        echo (string)$m->get($v[0]).',';
    }else{
        echo $m->put($v[0],$v[1]).',';
    }
}
