<?php
/**
 * 剑指 Offer 系列：二叉搜索树的后序遍历序列
 * Author：学院君
 */

/**
 * 判断指定数组是否是某个二叉搜索树的后序遍历序列
 * @param array $sequence
 * @return bool
 */
function VerifySequenceOfBinarySearchTree(array $sequence): bool
{
    $len = count($sequence);
    if (empty($sequence) || $len <= 0) {
        return false;
    }

    // 当前二叉搜索子树的根节点
    $root = $sequence[$len - 1];

    // 根节点的左子树部分
    for ($i = 0; $i < $len -1; $i++) {
        if ($sequence[$i] > $root) {
            break;
        }
    }

    // 根节点的右子树部分
    for ($j = $i; $j < $len - 1; $j++) {
        // 如果发现右子树的值比根节点小，说明不符合二叉搜索树的条件，直接返回 false
        if ($sequence[$j] < $root) {
            return false;
        }
    }

    // 通过递归继续对左子树进行细分判断
    $left = true;
    if ($i > 0) {
        $left_sequence = array_slice($sequence, 0, $i);
        $left = VerifySequenceOfBinarySearchTree($left_sequence);
    }

    // 通过递归继续对右子树进行细分判断
    $right = true;
    if ($i < $len - 1) {
        $right_sequence = array_slice($sequence, $i, $len - 1 - $i);
        $right = VerifySequenceOfBinarySearchTree($right_sequence);
    }

    return $left && $right;
}

// 验证代码
$sequence = [5, 7, 6, 9, 11, 10, 8];
var_dump(VerifySequenceOfBinarySearchTree($sequence));
