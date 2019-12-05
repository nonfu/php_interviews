<?php
/**
 * 剑指 Offer 系列：二叉树中和为某一值的路径
 * Author：学院君
 */

require "./binary_tree_node.php";

/**
 * 实现函数
 * @param BinaryTreeNode $root
 * @param int $expectedSum
 */
function FindPathInTree(BinaryTreeNode $root, int $expectedSum): void
{
    if ($root == null) {
        return;
    }

    $path = new SplStack();
    $currentSum = 0;
    FindPath($root, $expectedSum, $path, $currentSum);
}

/**
 * 核心实现代码
 * @param BinaryTreeNode $node
 * @param int $expectedSum
 * @param SplStack $stack
 * @param int $currentSum
 */
function FindPath(BinaryTreeNode $node, int $expectedSum, SplStack $path, int $currentSum): void
{
    $currentSum += $node->data;
    $path->push($node->data);

    // 如果是叶子结点，判断路径上结点的和是否等于输入的值
    // 如果相等，则打印这条路径
    $isLeaf = $node->left == null && $node->right == null;
    if ($isLeaf && $currentSum == $expectedSum) {
        printf("满足条件的路径找到了: ");
        $path->rewind();
        while ($path->valid()) {
            printf("%d\t", $path->current());
            $path->next();
        }
        printf("\n");
    }

    // 如果不是叶子结点，则继续遍历其子结点
    if ($node->left) {
        FindPath($node->left, $expectedSum, $path, $currentSum);
    }
    if ($node->right) {
        FindPath($node->right, $expectedSum, $path, $currentSum);
    }

    // 返回父节点前，在路径上删除当前结点
    $path->pop();
}

$root = new BinaryTreeNode();
$root->data = 10;
$root->left = new BinaryTreeNode();
$root->left->data = 5;
$root->right = new BinaryTreeNode();
$root->right->data = 12;
$root->left->left = new BinaryTreeNode();
$root->left->left->data = 4;
$root->left->right = new BinaryTreeNode();
$root->left->right->data = 7;

FindPathInTree($root, 22);

