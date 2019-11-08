<?php
/**
 * 调整数组使偶数位于奇数后面
 * Author：学院君
 */

/**
 * 根据指定闭包条件调整数组排序
 * @param array $input
 * @param callable $func
 * @return array
 */
function reOrderArray(array $input, callable $func): array
{
    if (empty($input) || count($input) == 1) {
        return $input;
    }

    $i = 0;
    $j = count($input) - 1;
    while ($i < $j) {
        while ($i < $j && !call_user_func($func, $input[$i])) {
            $i++;
        }
        while ($i < $j && call_user_func($func, $input[$j])) {
            $j--;
        }
        if ($i < $j) {
            $temp = $input[$i];
            $input[$i] = $input[$j];
            $input[$j] = $temp;
        }
    }
    return $input;
}

/**
 * 是否是偶数
 * @param int $n
 * @return bool
 */
$isEven = function(int $n)
{
    return ($n & 1) == 0;
};

/**
 * 是否是负数
 * @param int $n
 * @return bool
 */
$isNegative = function(int $n): bool
{
    return $n < 0;
};


// 测试代码
$input = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$output = reOrderArray($input, $isEven);
var_dump('[' . implode(',', $output) . ']');  // [1,9,3,7,5,6,4,8,2]

$input = [1, 2, -3, 4, -5, -6, 7, -8, 9];
$output = reOrderArray($input, $isNegative);
var_dump('[' . implode(',', $output) . ']');  // [1,2,9,4,7,-6,-5,-8,-3]
