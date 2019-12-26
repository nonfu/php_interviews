<?php
/**
 * 剑指 Offer：数组中出现次数超过一半的数字
 * Author：学院君
 */

// 方法1：排序法
function method1(array $arr)
{
    sort($arr);
    return $arr[ceil(count($arr) / 2)];
}

// 方法2：统计法
function method2(array $arr)
{
    $temp = [];
    $max = count($arr) / 2;
    foreach ($arr as $val) {
        if (empty($temp[$val])) {
            $temp[$val] = 1;
        } else {
            $temp[$val]++;
        }
        if ($temp[$val] >= ceil($max)) {
            return $val;
        }
    }
}

// 测试代码
$arr = [1, 2, 3, 2, 2, 2, 5, 4, 2];
var_dump(method1($arr)); // int(2)
var_dump(method2($arr)); // int(2)
