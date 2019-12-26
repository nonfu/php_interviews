<?php
/**
 * 剑指 Offer：连续子数组的最大和
 * Author：学院君
 */

function MaxSumOfSubArr($data)
{
    if (empty($data)) {
        return false;
    }

    $curMaxSum = 0;
    $preMaxSum = 0;
    foreach ($data as $num) {
        if ($num < 0 && $curMaxSum > $preMaxSum) {
            // 在中断处保存之前的累加和最大值
            $preMaxSum = $curMaxSum;
        }
        if ($curMaxSum <= 0) {
            // 如果上一个连续子数组累加和最大值小于0，则将其更新为当前值
            // 此为累加和最大值中断处
            $curMaxSum = $num;
        } else {
            // 否则累加当前的数组元素值
            $curMaxSum += $num;
        }
    }
    return $curMaxSum >= $preMaxSum ? $curMaxSum : $preMaxSum;
}

$data = [1, -2, 3, 10, -4, 7, 2, -5];
var_dump(MaxSumOfSubArr($data));
