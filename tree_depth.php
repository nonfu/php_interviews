<?php
/**
 * 剑指 Offer 系列：二叉树的深度
 * Author：学院君
 */

include_once "binary_tree_node.php";

function tree_depth(BinaryTreeNode $root)
{
    if ($root == null) {
        return 0;
    }

    $left = tree_depth($root->left);
    $right = tree_depth($root->right);

    return $left > $right ? $left + 1 : $right + 1;
}
