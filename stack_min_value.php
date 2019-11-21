<?php
/**
 * 剑指 Offer 系列：包含 min 函数的栈
 * @author 学院君
 */

class PhpStack
{
    private $_stack;
    private $_min_stack;

    public function __construct()
    {
        $this->_stack = [];
        $this->_min_stack = [];
    }

    public function push($data)
    {
        array_push($this->_stack, $data);
        // 维护辅助栈
        if (empty($this->_min_stack)) {
            array_push($this->_min_stack, $data);
        } else {
            $min = end($this->_min_stack);
            if ($data < $min) {
                array_push($this->_min_stack, $data);
            } else {
                array_push($this->_min_stack, $min);
            }
        }
    }

    public function pop()
    {
        $data = array_pop($this->_stack);
        // 维护辅助栈
        if (!empty($this->_min_stack)) {
            $min = end($this->_min_stack);
            if ($min == $data) {
                array_pop($this->_min_stack);
            }
        }
        return $data;
    }

    public function min()
    {
        return end($this->_min_stack);
    }
}

// 测试代码
$nums = [3, 4, 2, 1];
$stack = new PhpStack();
foreach ($nums as $num) {
    $stack->push($num);
}
var_dump($stack->min());  // 1
var_dump($stack->pop());  // 1
var_dump($stack->min());  // 2

