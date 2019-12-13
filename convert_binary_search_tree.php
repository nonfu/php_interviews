<?php
/**
 * 剑指 Offer 系列：将二叉搜索树转化为排序的双向链表
 * Author：学院君
 */

require_once './binary_tree_node.php';

function Convert(BinaryTreeNode $root): BinaryTreeNode
{
    // $lastNodeInList 指向双向链表的尾结点，也是二叉树最大值对应结点
    $lastNodeInList = null;
    // 调用 ConverNode 递归处理结点转化，从二叉树根结点开始
    ConvertNode($root, $lastNodeInList);

    // $lastNodeInList 指向双向链表的尾结点，最后我们需要返回头结点
    $headOfList = $lastNodeInList;
    // 头结点的设置方式：从尾结点依次往左遍历，直到某个结点前驱结点不存在，将其返回作为头结点
    while ($headOfList != null && $headOfList->left != null) {
        $headOfList = $headOfList->left;
    }

    return $headOfList;
}

// 通过中序遍历二叉搜索树将二叉树结点转化为链表结点
function ConvertNode(BinaryTreeNode $node = null, BinaryTreeNode &$lastNodeInList = null)
{
    if ($node == null) {
        return;
    }
    $current = $node;
    // 递归处理左子树
    if ($current->left != null) {
        ConvertNode($current->left, $lastNodeInList);
    }
    // 转化逻辑核心实现：
    // 1、将当前结点的前驱结点指向上一次处理后的尾结点
    // 2、如果尾结点不为空，则将其后驱结点指向当前结点
    // 3、最后将为当前结点设置为本次处理后的尾结点
    $current->left = $lastNodeInList;
    if ($lastNodeInList != null) {
        $lastNodeInList->right = $current;
    }
    $lastNodeInList = $current;
    // 递归处理右子树
    if ($current->right != null) {
        ConvertNode($current->right, $lastNodeInList);
    }
}

// 测试代码
$root = new BinaryTreeNode();
$root->data = 10;
$left = new BinaryTreeNode();
$left->data = 6;
$right = new BinaryTreeNode();
$right->data = 14;
$left_1 = new BinaryTreeNode();
$left_1->data = 4;
$left_2 = new BinaryTreeNode();
$left_2->data = 8;
$right_1 = new BinaryTreeNode();
$right_1->data = 12;
$right_2 = new BinaryTreeNode();
$right_2->data = 16;
$root->left = $left;
$root->right = $right;
$left->left = $left_1;
$left->right = $left_2;
$right->left = $right_1;
$right->right = $right_2;

$headOfList = Convert($root);
if ($headOfList != null) {
    $node = $headOfList;
    while ($node != null) {
        printf("%d ", $node->data);
        $node = $node->right;
    }
    echo "\n";
}
// 打印结果是 4 6 8 10 12 14 16
