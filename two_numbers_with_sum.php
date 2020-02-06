<?php
/**
 * 剑指 Offer 系列：在递增数组中查找和为 S 的两个数字
 * Author：学院君
 */

// 版本1：不考虑时间复杂度
function findNumbersWithSumV1(array $nums, int $sum): array
{
    $len = count($nums);
    if ($len <= 1) {
        return null;
    }
    foreach ($nums as $k1 => $num1) {
        if ($num1 < $sum) {
            for ($k2 = $k1 + 1; $k2 < $len; $k2++) {
                $num2 = $nums[$k2];
                if ($num1 + $num2 == $sum) {
                    return [$num1, $num2];
                }
            }
        }
    }
    return null;
}

// 坂本2：对上述实现的时间复杂度进行优化
function findNumbersWithSumV2(array $nums, int $sum): array
{
    $len = count($nums);
    if ($len <= 1) {
        return null;
    }

    $k1 = 0;
    $k2 = $len - 1;

    while ($k1 < $k2) {
        $currentSum = $nums[$k1] + $nums[$k2];
        if ($currentSum == $sum) {
            return [$nums[$k1], $nums[$k2]];
        } elseif ($currentSum > $sum) {
            $k2--;
        } else {
            $k1++;
        }
    }

    return null;
}

// 测试代码
$nums = [1, 2, 4, 7, 11, 15];
var_dump(findNumbersWithSumV1($nums, 15));
var_dump(findNumbersWithSumV2($nums, 15));
