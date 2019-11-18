<?php
/**
 * 剑指 Offer 系列：求一个二叉树的镜像
 * Author：学院君
 */

require_once './binary_tree_node.php';

/**
 * 输出一棵二叉树，返回这棵二叉树的镜像
 * @param BinaryTreeNode $node
 */
function mirrorTree(BinaryTreeNode $node)
{
    if ($node == null) {
        return;
    }
    if ($node->left == null && $node->right == null) {
        return;
    }

    $temp = $node->left;
    $node->left = $node->right;
    $node->right = $temp;

    if ($node->left) {
        mirrorTree($node->left);
    }

    if ($node->right) {
        mirrorTree($node->right);
    }
}

// 测试代码
$root = new BinaryTreeNode();
$root->data = 8;
$left_1 = new BinaryTreeNode();
$left_1->data = 10;
$right_1 = new BinaryTreeNode();
$right_1->data = 6;
$root->left = $left_1;
$root->right = $right_1;
$left_1_1 = new BinaryTreeNode();
$left_1_1->data = 5;
$left_1_2 = new BinaryTreeNode();
$left_1_2->data = 7;
$left_1->left = $left_1_1;
$left_1->right = $left_1_2;
$right_1_1 = new BinaryTreeNode();
$right_1_1->data = 9;
$right_1_2 = new BinaryTreeNode();
$right_1_2->data = 11;
$right_1->left = $right_1_1;
$right_1->right = $right_1_2;

mirrorTree($root);
var_dump($root);
