<?php
/**
 * 剑指 Offer 系列：两个链表的第一个公共结点
 * Author：学院君
 */

class ListNode
{
    /**
     * @var int
     */
    public $data;

    /**
     * @var ListNode
     */
    public $next;
}

/**
 * 获取两个链表的第一个公共结点
 * @param ListNode $head1
 * @param ListNode $head2
 * @return ListNode
 */
function findFirstCommonNode(ListNode $head1, ListNode $head2): ListNode
{
    // 获取链表长度
    $len1 = getListLength($head1);
    $len2 = getListLength($head2);

    // 长度差
    $lenDiff = 0;
    if ($len2 > $len1) {
        $longListHead = $head2;
        $shortListHead = $head1;
        $lenDiff = $len2 - $len1;
    } else {
        $longListHead = $head1;
        $shortListHead = $head2;
        $lenDiff = $len1 - $len2;
    }

    // 长链表先遍历到与短链表对对齐的位置，如果两者长度相等，则跳过
    for ($i = 0; $i < $lenDiff; $i++) {
        $longListHead = $longListHead->next;
    }

    while ($longListHead != null && $shortListHead != null && $longListHead !== $shortListHead) {
        $longListHead = $longListHead->next;
        $shortListHead = $shortListHead->next;
    }

    // 第一个相等的结点就是公共结点
    $firstCommonNode = $longListHead;
    return $firstCommonNode;
}

/**
 * 获取给定链表长度
 * @param ListNode $head
 * @return int
 */
function getListLength(ListNode $head): int
{
    $len = 0;
    $node = $head;
    while ($node != null) {
        $len++;
        $node = $node->next;
    }
    return $len;
}

// 测试代码
$data = [1, 2, 3, 6, 7];
$head1 = new ListNode();
$head1->data = 1;
$node1 = new ListNode();
$node1->data = 2;
$head1->next = $node1;
$node2 = new ListNode();
$node2->data = 3;
$node1->next = $node2;
$node3 = new ListNode();
$node3->data = 6;
$node2->next = $node3;
$node4 = new ListNode();
$node4->data = 7;
$node3->next = $node4;

$data = [4, 5, 6, 7];
$head2 = new ListNode();
$head2->data = 4;
$node21 = new ListNode();
$node21->data = 5;
$head2->next = $node21;
$node21->next = $node3;

$node = findFirstCommonNode($head1, $head2);
var_dump($node->data);  // 6

