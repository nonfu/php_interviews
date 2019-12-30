<?php
/**
 * 剑指 Offer 系列：把数组排成最小的数
 * Author：学院君
 */

// 第一种解法：通过排列组合实现
function minNumForArray($arr): int
{
    if (count($arr) == 0) {
        return null;
    }
    $nums = [];
    PermutationSubArray($arr, 0, $nums);
    sort($nums);
    return $nums[0];
}

// 递归处理逻辑
function PermutationSubArray($arr, $start, &$nums)
{
    $end = count($arr) - 1;  // 数组最后一位位置
    if ($start == $end) {
        // 已经到数组最后一位，拼接该数字
        $nums[] = intval(implode('', $arr));
    } else {
        // 从第一位开始，依次考虑后面的所有可能组合情况
        for ($i = $start; $i <= $end; $i++) {
            // 交换当前字符串第一位和后面剩下所有位置的字符
            $temp = $arr[$i];
            $arr[$i] = $arr[$start];
            $arr[$start] = $temp;
            PermutationSubArray($arr, $start + 1, $nums);
            // 替换完成后复原
            $temp = $arr[$i];
            $arr[$i] = $arr[$start];
            $arr[$start] = $temp;
        }
    }
}

// 测试代码
$arr = [3, 32, 321];
var_dump(minNumForArray($arr));  // 321323

// 第二种解法：将大数转化为字符串
function minNumForArrayV2(array $nums)
{
    if (count($nums) == 0) {
        return;
    }

    $strNums = [];
    foreach ($nums as $num) {
        $strNums[] = sprintf("%d", $num);
    }

    usort($strNums, function ($strNum1, $strNum2) {
        $combine1 = $strNum1 . $strNum2;
        $combine2 = $strNum2 . $strNum1;
        return strcmp($combine1, $combine2);
    });

    foreach ($strNums as $strNum) {
        printf("%s", $strNum);
    }
    printf("\n");
}

minNumForArrayV2([5, 32, 321]); // 321325
