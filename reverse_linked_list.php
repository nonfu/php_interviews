<?php
/**
 * 反转单链表
 * Author：学院君
 */

/**
 * 单链表结点类
 * Class LinkedListNode
 */
class LinkedListNode
{
    /**
     * 结点值
     */
    public $data;
    /**
     * 下一个结点指针
     * @var LinkedListNode
     */
    public $next = null;
}

/**
 * 反转单链表并返回头结点实现函数
 * @param LinkedListNode $first
 * @return LinkedListNode
 * @throws Exception
 */
function reverseLinkedList(LinkedListNode $first): LinkedListNode
{
    if ($first == null || $first->data == null) {
        throw new Exception("输入的链表为空");
    }

    $reverseHead = null;  // 反转后的头结点
    $node = $first;   // 从头结点开始遍历
    $prev = null;    // 头结点的前驱结点为空

    while ($node != null) {
        $next = $node->next;
        if ($next == null) {
            $reverseHead = $node;  // 尾结点转化为头结点
        }
        $node->next = $prev;  // 反转实现，当前结点的前驱结点变成后驱结点

        $prev = $node;   // 设置下一个结点的前驱结点
        $node = $next;   // 初始化下一个结点
    }

    return $reverseHead;   // 返回反转后的头结点
}

// 测试代码
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

$head->next = $first;

try {
    $first = reverseLinkedList($head->next);
} catch (Exception $exception) {
    echo $exception->getMessage();
    return;
}

$head->next = $first;
var_dump($first->data); // 3

