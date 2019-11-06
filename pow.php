<?php
/**
 * 实现 PHP 库函数 pow(number $num, int $exp): number
 * Author: 学院君
 */

/**
 * 版本1：自以为简单的解法
 * @param float $num
 * @param int $exp
 * @return float
 */
function pow_v1(float $num, int $exp): float
{
    $result = 1;
    for ($i = 1; $i <= $exp; $i++) {
        $result *= $num;
    }
    return $result;
}

/**
 * 版本2：离 offer 更近的解法
 * @param float $num
 * @param int $exp
 * @return float
 */
function pow_v2(float $num, int $exp): float
{
    // 一个数的负次方等于对这个数的正次方求倒数，显然0的负次方无意义，因为0不能作为分母
    if (abs($num - 0) < 0.00001 && $exp < 0) {
        return 0;
    }

    $result = pow_v1($num, abs($exp));

    // 负次方需要求倒数
    if ($exp < 0) {
        $result = 1.0 / $result;
    }
    return $result;
}

/**
 * 版本3：高性能实现上述 pow_1，时间复杂度从 O(n) 降到 O(logn)
 * @param float $num
 * @param int $exp
 * @return float
 */
function pow_v11(float $num, int $exp): float
{
    if ($exp == 0) {
        return 1;
    }
    if ($exp == 1) {
        return $num;
    }

    $result = pow_v11($num, $exp >> 1);
    $result *= $result;
    if ($exp & 0x1 == 1) {
        $result *= $num;
    }

    return $result;
}

// 测试代码
var_dump(pow_v1(2, 10));   // 1024
var_dump(pow_v1(2, -2));   // 1  // 错误，没有求倒数
var_dump(pow_v1(0, -2));   // 1  // 错误，没有对0的负次方做处理

var_dump(pow_v2(2, 10));   // 1024
var_dump(pow_v2(2, -2));   // 0.25  // 正确
var_dump(pow_v2(0, -2));   // 0     // 正确

