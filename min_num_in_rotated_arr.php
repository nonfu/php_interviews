<?php
/**
 * 在旋转数组中寻找最小值
 * Author：学院君
 */

/**
 * 实现函数
 * @param array $numbers
 * @return mixed
 * @throws Exception
 */
function findMinNum(array $numbers)
{
    if (empty($numbers)) {
        throw new Exception('无效参数');
    }

    $mid = $left = 0;   // 左指针，中间元素初始指向左指针是为了应付递增数组这种特殊情况
    $right = count($numbers) - 1;  // 右指针
    while ($numbers[$left] >= $numbers[$right]) {
        // 当左右指针相邻，循环终止，右侧指针指向的就是最小元素
        if ($right - $left == 1) {
            $mid = $right;
            break;
        }
        // 中间元素位置计算
        $mid = ($left + $right) >> 1;
        if ($numbers[$mid] >= $numbers[$left]) {
            // 当中间元素位于旋转数组前半部分，则将左指针指向中间元素，缩小查找范围继续查找
            $left = $mid;
        } elseif ($numbers[$mid] <= $numbers[$right]) {
            // 当中间元素位于旋转数组后半部分，则将右指针指向中间元素，缩小查找范围继续查找
            $right = $mid;
        }
    }
    // 返回最终查找结果
    return $numbers[$mid];
}

$numbers = [5, 1, 2, 3, 4];
var_dump(findMinNum($numbers));
