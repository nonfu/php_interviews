<?php
/**
 * 剑指 Offer 系列：栈的压入、弹出序列
 * Author: 学院君
 */

/**
 * 判断第二个序列是否是第一个序列的弹出序列
 *
 * @param array $push
 * @param array $pop
 * @return boolean
 */
function isPopOrder(array $push, array $pop): bool
{
    if (empty($push) || empty($pop)) {
        throw new Exception("无效的输入序列");
    }
    $stack = new SplStack;
    while (!empty($push)) {
        $stack->push(array_shift($push));
        while ($stack->top() == $pop[0]) {
            $stack->pop();
            array_shift($pop);
            if (empty($pop)) {
                return true;
            }
            if ($stack->isEmpty()) {
                break;
            }
        }
    }
    if (empty($pop)) {
        return true;
    }
    return false;
}

// 测试代码
$push = [1, 2, 3, 4, 5];
// $pop = [5, 4, 3, 2, 1];  // true
// $pop = [4, 5, 3, 2, 1];  // true
// $pop = [4, 3, 5, 2, 1];  // true
$pop = [4, 3, 5, 1, 2];  // false
var_dump(isPopOrder($push, $pop));