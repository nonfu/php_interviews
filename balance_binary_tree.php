<?php
/**
 * 剑指 Offer：判断一棵树是否是平衡二叉树
 * Author：学院君
 */

include_once 'binary_tree_node.php';

/**
 * @param BinaryTreeNode $root 二叉树根节点
 * @param int $depth 二叉树结点深度
 * @return bool
 */
function isBalanced($root, &$depth): bool
{
    if ($root == null) {
        $depth = 0;
        return true;
    }

    $left = $right = 0;
    if (isBalanced($root->left, $left) && isBalanced($root->right, $right)) {
        $diff = abs($left - $right);
        if ($diff <= 1) {
            $depth = 1 + ($left > $right ? $left : $right);
            return true;
        }
    }

    return false;
}

// 测试代码
$node1 = new BinaryTreeNode();
$node1->data = 1;
$node2 = new BinaryTreeNode();
$node2->data = 2;
$node3 = new BinaryTreeNode();
$node3->data = 3;
$node4 = new BinaryTreeNode();
$node4->data = 4;
$node1->left = $node2;
$node1->right = $node3;
$node3->right = $node4;

$depth = 0;
var_dump(isBalanced($node1, $depth));  // true

$node5 = new BinaryTreeNode();
$node5->data = 5;
$node4->left = $node5;
$depth = 0;
var_dump(isBalanced($node1, $depth));   // false
