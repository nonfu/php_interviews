<?php
/**
 * 剑指 Offer 系列：复制复杂链表
 * Author：学院君
 */

class ComplexListNode
{
    /**
     * 结点值
     * @var string
     */
    public $value;

    /**
     * 指向下一个结点
     * @var ComplexListNode
     */
    public $next = null;

    /**
     * @var ComplexListNode
     */
    public $sibling = null;
}

/**
 * 复制复杂链表实现函数
 * @param ComplexListNode $sourceHead
 * @return ComplexListNode
 */
function CloneComplexList(ComplexListNode $sourceHead): ComplexListNode
{
    // 映射原始结点和目标结点
    $map = [];

    // 第一步：复制结点值和next指针
    $node = $sourceHead;
    $cloneHead = null;
    while ($node != null) {
        $clone = new ComplexListNode();
        $clone->value = $node->value;
        if ($node->next) {
            $clone->next = clone $node->next;
        }
        $clone->sibling = null;
        $map[$node->value] = $clone;
        $node = $node->next;
        if ($cloneHead == null) {
            $cloneHead = $clone;
        }
    }

    // 第二步：复制subling指针
    $node = $sourceHead;
    while ($node != null) {
        $clone = $map[$node->value];
        // 如果拷贝过来链表结点sibling指针收到next指针污染，将其清空
        if ($clone->sibling != null) {
            $clone->sibling = null;
        }
        if ($node->sibling != null) {
            $clone->sibling = clone $map[$node->sibling->value];
        }
        $node = $node->next;
    }
    return $cloneHead;
}

// 测试代码
$nodeA = new ComplexListNode();
$nodeA->value = 'A';
$nodeB = new ComplexListNode();
$nodeB->value = 'B';
$nodeC = new ComplexListNode();
$nodeC->value = 'C';
$nodeD = new ComplexListNode();
$nodeD->value = 'D';
$nodeE = new ComplexListNode();
$nodeE->value = 'E';
$nodeA->next = $nodeB;
$nodeA->sibling = $nodeC;
$nodeB->next = $nodeC;
$nodeB->sibling = $nodeE;
$nodeC->next = $nodeD;
$nodeD->next = $nodeE;
$nodeD->sibling = $nodeB;

$head = $nodeA;

$cloneHead = CloneComplexList($head);
$cloneNode = $cloneHead;
while ($cloneNode != null) {
    var_dump([
        "value" => $cloneNode->value,
        "next"  => $cloneNode->next ? $cloneNode->next->value : "NULL",
        "sibling" => $cloneNode->sibling ? $cloneNode->sibling->value : "NULL"
    ]);
    $cloneNode = $cloneNode->next;
}
