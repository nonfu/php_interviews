<?php
/**
 * 剑指 Offer 系列：在 O(1) 时间内删除单链表结点
 * Author：学院君
 */

/**
 * 结点类
 */
class Node
{
    public $data;
    /**
     * @var Node
     */
    public $next;
}

/**
 * 删除结点实现代码
 * @param Node $head
 * @param Node $delete
 */
function deleteLinkedListNode(Node $head, Node $delete)
{
    if (empty($head) || empty($delete)) {
        return;
    }
    // 如果待删除结点是尾结点，则还是要遍历所有结点，此时时间复杂度为O(n)
    if ($delete->next == null) {
        $node = $head;
        while ($node->next !== $delete) {
            $node = $node->next;
        }
        $node->next = null;
        $delete = null;
        return;
    }

    // 如果待删除结点是头结点，处理最简单，此时时间复杂度为 O(1)
    if ($delete === $head) {
        $delete = null;
        $head->next = null;
        return;
    }

    // 既不是头结点也不是尾结点，则将下一个结点拷贝到待删除结点，再将下一个结点删除，此时时间复杂度为 O(1)
    $nextNode = $delete->next;
    $delete->data = $nextNode->data;
    $delete->next = $nextNode->next;
    $nextNode = null;
}

// 初始化单链表
$headNode = new Node();
$firstNode = new Node();
$firstNode->data = 0;
$headNode->next = $firstNode;
$secondNode = new Node();
$secondNode->data = 1;
$firstNode->next = $secondNode;
$thirdNode = new Node();
$thirdNode->data = 2;
$secondNode->next = $thirdNode;
$thirdNode->next = null;

// 测试删除某个结点并遍历打印删除结点后的单链表
deleteLinkedListNode($headNode, $secondNode);
$node = $headNode;
while (($node = $node->next) != null) {
    var_dump($node->data);
}
