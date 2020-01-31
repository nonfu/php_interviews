<?php
/**
 * 剑指 Offer 系列：数字在排序数组中出现的次数
 * Author：学院君
 */

// 计算给定数字第一次出现位置
function get_first_position($nums, $num, $low, $high)
{
    if ($low > $high) {
        return -1;
    }

    $mid = floor(($low + $high) / 2);
    if ($num < $nums[$mid]) {
        return get_first_position($nums, $num, $low, $mid - 1);
    } elseif ($num > $nums[$mid]) {
        return get_first_position($nums, $num, $mid + 1, $high);
    } else {
        if ($mid == 0 || $nums[$mid-1] != $num) {
            return $mid;
        } else {
            return get_first_position($nums, $num, $low, $mid - 1);
        }
    }
}

// 计算给定数字最后一次出现位置
function get_last_position($nums, $num, $low, $high)
{
    if ($low > $high) {
        return -1;
    }

    $mid = floor(($low + $high) / 2);
    if ($num < $nums[$mid]) {
        return get_last_position($nums, $num, $low, $mid - 1);
    } elseif ($num > $nums[$mid]) {
        return get_last_position($nums, $num, $mid + 1, $high);
    } else {
        if ($mid == count($nums) - 1 || $nums[$mid + 1] != $num) {
            return $mid;
        } else {
            return get_last_position($nums, $num, $mid + 1, $high);
        }
    }
}

// 计算给定数字在排序数组中出现的次数
function num_of_k($nums, $k)
{
    $len = count($nums);
    $first = get_first_position($nums, $k, 0, $len - 1);
    $last = get_last_position($nums, $k, 0, $len - 1);
    if ($first >= 0 && $last >= 0) {
        return $last - $first + 1;
    }
    return 0;
}

// 测试代码
$nums = [1, 2, 3, 3, 3, 3, 4, 5];
var_dump(num_of_k($nums, 3)); // 4
