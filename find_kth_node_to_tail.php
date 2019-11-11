<?php
/**
 * 剑指 Offer 系列：获取链表中倒数第 k 个结点
 * Author：学院君
 */

/**
 * 单链表结点类
 */
class LinkedListNode
{
    public $data;
    /**
     * @var LinkedListNode
     */
    public $next = null;
}

/**
 * 版本1：时间复杂度为 O(2n) 的实现
 * @param $first
 * @param $k
 * @return LinkedListNode
 * @throws Exception
 */
function findKthToTailV1($first, $k): LinkedListNode
{
    if ($first == null || $k <= 0) {
        throw new Exception('无效参数');
    }
    $node = $first;
    $n = 1;
    while(($node = $node->next) != null) {
        $n++;
    }
    if ($k > $n) {
        throw new Exception('传入的k超过链表长度');
    }
    if ($k == $n) {
        return $first;
    }
    $target = $n - $k + 1;
    $position = 1;
    $node = $first;
    while (($node = $node->next) != null) {
        if (++$position == $target) {
            return $node;
        }
    }
}

/**
 * 版本2：时间复杂度为 O(n) 的实现
 * @param LinkedListNode $first
 * @param int $k
 * @return LinkedListNode
 * @throws Exception
 */
function findKthToTailV2($first, $k): LinkedListNode
{
    if ($first == null || $k <= 0) {
        throw new Exception('无效参数');
    }

    $ahead = $first;
    $behined = $first;

    for ($i = 0; $i < $k - 1; $i++) {
        $ahead = $ahead->next;
        if ($ahead == null) {
            throw new Exception('传入的k超过链表长度');
        }
    }

    while (($ahead = $ahead->next) != null) {
        $behined = $behined->next;
    }

    return $behined;
}


// 初始化链表
$head = new LinkedListNode();
$first = new LinkedListNode();
$first->data = 1;
$head->next = $first;
$second = new LinkedListNode();
$second->data = 2;
$first->next = $second;
$third = new LinkedListNode();
$third->data = 3;
$second->next = $third;
$fourth = new LinkedListNode();
$fourth->data = 4;
$third->next = $fourth;
$fifth = new LinkedListNode();
$fifth->data = 5;
$fourth->next = $fifth;

// 测试代码
try {
    $node = findKthToTailV1($head->next, 3);
    var_dump($node->data);

    $node = findKthToTailV1($head->next, 2);
    var_dump($node->data);
} catch (Exception $exception) {
    echo $exception->getMessage() . "\n";
}
