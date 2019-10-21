<?php
/**
 * 剑指 Offer 系列：在有序二维数组中查找数字（从右上角开始查找）
 * @param array $matrix 二维数组
 * @param int $rows   总行数
 * @param int $columns  总列数
 * @param int $num    待查找的数字
 * @return bool
 * @author 学院君
 */
function find(array $matrix, int $rows, int $columns, int $num): bool
{
    $found = false;
    if ($matrix) {
        $row = 0;
        $column = $columns - 1;
        while ($row < $rows && $columns >= 0) {
            if ($matrix[$row][$column] == $num) {
                $found = true;
                break;
            } elseif ($matrix[$row][$column] > $num) {
                $column--;
            } else {
                $row++;
            }
        }
    }
    return $found;
}

$arr = [
    [1, 2, 8, 9],
    [2, 4, 9, 12],
    [4, 7, 10, 13],
    [6, 8, 11, 15]
];

var_dump(find($arr, 4, 4, 10));  // true
var_dump(find($arr, 4, 4, 100));  // false

