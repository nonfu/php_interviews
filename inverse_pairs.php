<?php
/**
 * 剑指 Offer 系列：数组中的逆序对
 * Author：学院君
 */

/**
 * 套用归并排序的流程来统计数组中的逆序对
 * @param $nums
 * @return mixed
 */
function inversePairs($nums)
{
    if (count($nums) <= 1) {
        return 0;
    }

    $copy = $nums;
    return inversePairsCore($nums, $copy, 0, count($nums) - 1);
}

function inversePairsCore(&$nums, &$copy, $start, $end)
{
    if ($start >= $end) {
        $copy[$start] = $nums[$start];
        return 0;
    }

    $length = floor(($end - $start) / 2);
    $left = inversePairsCore($copy, $nums, $start, $start + $length);
    $right = inversePairsCore($copy, $nums, $start + $length + 1, $end);

    $i = $start + $length; //前半段最后一个数字下标
    $j = $end; //后半段最后一个数字下标
    $indexCopy = $end;
    $count = 0;
    while ($i >= $start && $j >= $start + $length + 1) {
        if ($nums[$i] <= $nums[$j]) {
            $copy[$indexCopy--] = $nums[$j--];
        } else {
            $copy[$indexCopy--] = $nums[$i--];
            $count += $j - $start - $length;  // 前面的数大于后面的数，存在逆序对，且数目为已排序子数组区间跨度值
        }
    }

    for (; $i >= $start; $i--) {
        $copy[$indexCopy--] = $nums[$i];
    }

    for (; $j >= $start + $length + 1; $j--) {
        $copy[$indexCopy--] = $nums[$j];
    }

    return $left + $right + $count;
}

$nums = [7, 5, 6, 4];
$count = inversePairs($nums);
var_dump($count);  // 5
