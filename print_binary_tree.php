<?php
/**
 * 剑指 Offer 系列：从上到下打印二叉树
 * Author：学院君
 */

require_once "./binary_tree_node.php";

/**
 * 打印函数
 * @param BinaryTreeNode $root
 */
function PrintFromTopToBottom(BinaryTreeNode $root)
{
    if ($root == null) {
        return;
    }

    $queue = new SplQueue();
    $queue->enqueue($root);

    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();
        printf("%d ", $node->data);
        if ($node->left) {
            $queue->enqueue($node->left);
        }
        if ($node->right) {
            $queue->enqueue($node->right);
        }
    }
}


// 测试代码
$root = new BinaryTreeNode();
$root->data = 8;
$left = new BinaryTreeNode();
$left->data = 6;
$right = new BinaryTreeNode();
$right->data = 10;
$root->left = $left;
$root->right = $right;

$left_1 = new BinaryTreeNode();
$left_2 = new BinaryTreeNode();
$left_1->data = 5;
$left_2->data = 7;
$left->left = $left_1;
$left->right = $left_2;

$right_1 = new BinaryTreeNode();
$right_2 = new BinaryTreeNode();
$right_1->data = 9;
$right_2->data = 11;
$right->left = $right_1;
$right->right = $right_2;

PrintFromTopToBottom($root);
exit("\n程序执行完毕退出!\n");
