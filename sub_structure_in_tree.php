<?php
/**
 * 剑指 Offer 系列：判断一棵二叉树是否是另一棵二叉树的子结构
 * Author：学院君
 */

/**
 * 二叉树结点类
 * Class BinaryTreeNode
 */
class BinaryTreeNode
{
    /**
     * 结点值
     * @var int
     */
    public $data;
    /**
     * 左结点
     * @var BinaryTreeNode
     */
    public $left;
    /**
     * 右结点
     * @var BinaryTreeNode
     */
    public $right;
}

/**
 * 判断二叉树1是否包含二叉树2
 * @param BinaryTreeNode $root1 二叉树1根节点
 * @param BinaryTreeNode $root2 二叉树2根节点
 * @return bool
 */
function hasSubTree(BinaryTreeNode $root1 = null, BinaryTreeNode $root2 = null): bool
{
    $result = false;

    if ($root1 != null && $root2 != null) {
        if ($root1->data == $root2->data) {
            $result = doesTree1ContainTree2($root1, $root2);
        }
        if (!$result) {
            $result = hasSubTree($root1->left, $root2);
        }
        if (!$result) {
            $result = hasSubTree($root1->right, $root2);
        }
    }

    return $result;
}

/**
 * 递归判断二叉树1是否包含二叉树2
 * @param BinaryTreeNode $root1
 * @param BinaryTreeNode $root2
 * @return bool
 */
function doesTree1ContainTree2(BinaryTreeNode $root1 = null, BinaryTreeNode $root2 = null): bool
{
    if ($root2 == null) {
        return true;
    }

    if ($root1 == null) {
        return false;
    }

    if ($root1->data != $root2->data) {
        return false;
    }

    return doesTree1ContainTree2($root1->left, $root2->left) && doesTree1ContainTree2($root1->right, $root2->right);
}

// 测试代码
$root1 = new BinaryTreeNode();
$root1->data = 8;
$node11 = new BinaryTreeNode();
$node11->data = 8;
$root1->left = $node11;
$node12 = new BinaryTreeNode();
$node12->data = 9;
$node13 = new BinaryTreeNode();
$node13->data = 2;
$node11->left = $node12;
$node11->right = $node13;
$node14 = new BinaryTreeNode();
$node14->data = 4;
$node15 = new BinaryTreeNode();
$node15->data = 7;
$node13->left = $node14;
$node13->right = $node15;
$node21 = new BinaryTreeNode();
$node21->data = 7;
$root1->right = $node21;

$root2 = new BinaryTreeNode();
$root2->data = 8;
$node_b1 = new BinaryTreeNode();
$node_b1->data = 9;
$node_b2 = new BinaryTreeNode();
$node_b2->data = 2;
$root2->left = $node_b1;
$root2->right = $node_b2;


var_dump(hasSubTree($root1, $root2));  // true
$node12->data = 99;
var_dump(hasSubTree($root1, $root2));  // false
