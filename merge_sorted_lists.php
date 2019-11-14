<?php
/**
 * 剑指 Offer 系列：合并已排序链表
 * Author：学院君
 */

/**
 * Class LinkedListNode
 * 单链表结点类
 */
class LinkedListNode
{
    /**
     * 结点值
     */
    public $data;
    /**
     * 结点指针，指向下一个结点
     * @var LinkedListNode
     */
    public $next;
}

/**
 * 合并两个已排序链表，并返回合并后链表，要求合并后的链表仍然是有序的
 * @param LinkedListNode $list1 链表1头结点
 * @param LinkedListNode $list2 链表2头结点
 * @return LinkedListNode 合并后链表头结点
 */
function merge(LinkedListNode $list1 = null, LinkedListNode $list2 = null): LinkedListNode
{
    if ($list1 == null) {
        return $list2;
    }
    if ($list2 == null) {
        return $list1;
    }

    $merged = null;
    if ($list1->data < $list2->data) {
        $merged = $list1;
        $merged->next = merge($list1->next, $list2);
    } else {
        $merged = $list2;
        $merged->next = merge($list1, $list2->next);
    }

    return $merged;
}

/**
 * 初始化链表
 * @param array $values
 * @return LinkedListNode
 */
function init(array $values): LinkedListNode
{
    if (empty($values)) {
        return null;
    }
    $head = new LinkedListNode();
    $prev = $head;
    foreach ($values as $value) {
        $node = new LinkedListNode();
        $node->data = $value;
        $prev->next = $node;
        $prev = $node;
    }
    return $head;
}

// 初始化链表1
$list1 = init([2, 4, 6, 8]);
// 初始化链表2
$list2 = init([1, 3, 5, 7]);

// 合并链表
$list3 = new LinkedListNode();
$list3->next = merge($list1->next, $list2->next);

// 打印合并链表结点值
$node = $list3->next;
$values = [];
while ($node) {
    array_push($values, $node->data);
    $node = $node->next;
}
var_dump('[' . implode(',', $values). ']');  // [1,2,3,4,5,6,7,8]
