<?php
/**
 * 剑指 Offer：丑数问题
 * Author: 学院君
 */

/**
 *  第一种解法：不考虑时间复杂度的解法
 * @param int $index
 * @return int
 */
function getUglyNumber(int $index): int
{
    if ($index <= 0) {
        return 0;
    }

    $number = 0;
    $uglyFound = 0;
    while ($uglyFound < $index) {
        $number++;
        if (isUglyNumber($number)) {
            $uglyFound++;
        }
    }

    return $number;
}

/**
 * 判断一个数是不是丑数
 * @param int $number
 * @return int
 */
function isUglyNumber(int $number): bool
{
    while ($number % 2 == 0) {
        $number /= 2;
    }
    while ($number % 3 == 0) {
        $number /= 3;
    }
    while ($number % 5 == 0) {
        $number /= 5;
    }

    return $number == 1 ? true : false;
}

var_dump(getUglyNumber(15));

/**
 * 第二种解法：以空间换时间
 * @param int $index
 * @return int
 */
function getUglyNumberV2(int $index): int
{
    if ($index <= 0) {
        return 0;
    }
    $uglyNums = [];
    $uglyNums[0] = 1;
    $nextUglyIndex = 1;

    $pMultiply2 = 0;  // 索引位置从0开始
    $pMultiply3 = 0;  // 索引位置从0开始
    $pMultiply5 = 0;  // 索引位置从0开始

    while ($nextUglyIndex < $index) {
        $min = min($uglyNums[$pMultiply2] * 2, $uglyNums[$pMultiply3] * 3, $uglyNums[$pMultiply5] * 5);
        $uglyNums[$nextUglyIndex] = $min;

        while ($uglyNums[$pMultiply2] * 2 <= $uglyNums[$nextUglyIndex]) {
            // 索引位置后移
            $pMultiply2++;
        }
        while ($uglyNums[$pMultiply3] * 3 <= $uglyNums[$nextUglyIndex]) {
            // 索引位置后移
            $pMultiply3++;
        }
        while ($uglyNums[$pMultiply5] * 5 <= $uglyNums[$nextUglyIndex]) {
            // 索引位置后移
            $pMultiply5++;
        }

        $nextUglyIndex++;
    }

    $uglyNum = $uglyNums[$nextUglyIndex - 1];
    return $uglyNum;
}

var_dump(getUglyNumberV2(1500));
