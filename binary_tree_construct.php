<?php
/**
 * 根据前序遍历和中序遍历结果构建二叉树
 * Author：学院君
 */

/**
 * Class BinaryTreeNode
 * 二叉树节点定义
 */
class BinaryTreeNode
{
    /**
     * @var int
     * 节点值
     */
    public $value;
    /**
     * @var BinaryTreeNode
     * 左节点
     */
    public $left;
    /**
     * @var BinaryTreeNode
     * 右节点
     */
    public $right;
}

class BinaryTreeBuilder
{
    protected $preOrder;
    protected $midOrder;

    /**
     * BinaryTreeBuilder constructor.
     * @param $preOrder
     * @param $midOrder
     */
    public function __construct($preOrder, $midOrder)
    {
        $this->preOrder = $preOrder;
        $this->midOrder = $midOrder;
    }

    /**
     * 根据前序遍历和中序遍历构建二叉树
     * @return BinaryTreeNode
     * @throws Exception
     */
    public function build(): BinaryTreeNode
    {
        if (empty($this->preOrder) || empty($this->midOrder)) {
            return null;
        }

        $startPreOrder = 0;
        $endPreOrder = count($this->preOrder) - 1;
        $startMidOrder = 0;
        $endMidOrder = count($this->midOrder) - 1;
        return $this->buildCore($startPreOrder, $endPreOrder, $startMidOrder, $endMidOrder);
    }

    /**
     * 构建二叉树核心代码
     * @param $startPreOrder
     * @param $endPreOrder
     * @param $startMidOrder
     * @param $endMidOrder
     * @return BinaryTreeNode
     * @throws Exception
     */
    protected function buildCore($startPreOrder, $endPreOrder, $startMidOrder, $endMidOrder): BinaryTreeNode
    {
        // 根节点是前序遍历结果的第一个节点
        $rootValue = $this->preOrder[$startPreOrder];
        // 初始化当前层级的根节点
        $root = new BinaryTreeNode();
        $root->value = $rootValue;
        $root->left = null;
        $root->right = null;

        // 递归到叶子节点，终止递归
        if ($startPreOrder == $endPreOrder) {
            if ($startMidOrder == $endMidOrder && $this->preOrder[$startPreOrder] == $this->midOrder[$startMidOrder]) {
                return $root;
            } else {
                throw new Exception('无效的输入序列');
            }
        }

        // 在中序遍历中找到根节点值的位置
        $rootMidOrder = $startMidOrder;
        while ($rootMidOrder <= $endMidOrder && $this->midOrder[$rootMidOrder] != $rootValue) {
            $rootMidOrder++;
        }

        // 遍历到结尾还没有找到根节点的值，则抛出异常
        if ($rootMidOrder == $endMidOrder && $this->midOrder[$rootMidOrder] != $rootValue) {
            throw new Exception('无效的输入序列');
        }

        // 根据中序遍历根节点左侧数据计算二叉树左子树长度
        $leftLength = $rootMidOrder - $startMidOrder;
        // 根据上面计算的左子树长度计算前序遍历左子树结束位置
        $leftPreOrderEnd = $startPreOrder + $leftLength;
        if ($leftLength > 0) {
            // 左子树存在则构建左子树（递归处理）
            $root->left = $this->buildCore($startPreOrder + 1, $leftPreOrderEnd, $startMidOrder, $rootMidOrder - 1);
        }
        if ($leftLength < $endPreOrder - $startPreOrder) {
            // 右子树存在则构建右子树（递归处理）
            $root->right = $this->buildCore($leftPreOrderEnd + 1, $endPreOrder, $rootMidOrder + 1, $endMidOrder);
        }
        // 返回最终结果
        return $root;
    }
}

// 测试代码
$builder = new BinaryTreeBuilder([1, 2, 4, 7, 3, 5, 6, 8], [4, 7, 2, 1, 5, 3, 8, 6]);
try {
    $binaryTree = $builder->build();
} catch (Exception $exception) {
    echo $exception->getMessage();
    exit(-1);
}
var_dump(json_encode($binaryTree));
