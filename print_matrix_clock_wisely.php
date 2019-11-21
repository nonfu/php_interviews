<?php
/**
 * 剑指 Offer 系列：顺时针打印矩阵
 * @author 学院君
 */

/**
 * 实现函数
 * @param array $matrix
 * @param int $columns
 * @param int $rows
 */
function printMatrixClockWisely(array $matrix, int $columns, int $rows)
{
    if (empty($matrix)) {
        return;
    }

    $start = 0;

    while ($columns > $start * 2 && $rows > $start * 2)
    {
        printMatrixInCircle($matrix, $columns, $rows, $start);
        $start++;
    }
}

/**
 * 打印一圈
 * @param array $matrix
 * @param int $columns
 * @param int $rows
 * @param int $start
 */
function printMatrixInCircle(array $matrix, int $columns, int $rows, int $start)
{
    $endX = $columns - 1 - $start;
    $endY = $rows - 1 - $start;

    // 从左到右打印第一行（顺时针）
    for ($i = $start; $i <= $endX; $i++) {
        $number = $matrix[$start][$i];
        printf("%d ", $number);
    }

    // 从上到下打印一行
    if ($start < $endY) {
        for ($i = $start + 1; $i <= $endY; $i++) {
            $number = $matrix[$i][$endX];
            printf("%d ", $number);
        }
    }

    // 从右到左打印一行
    if ($start < $endX && $start < $endY) {
        for ($i = $endY - 1; $i >= $start; $i--) {
            $number = $matrix[$endY][$i];
            printf("%d ", $number);
        }
    }

    // 从下到上打印一行
    if ($start < $endX && $start < $endY - 1) {
        for ($i = $endY - 1; $i >= $start + 1; $i--) {
            $number = $matrix[$i][$start];
            printf("%d ", $number);
        }
    }
}

// 测试代码
$matrix = [
    [1, 2, 3, 4],
    [5, 6, 7, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16],
];

printMatrixClockWisely($matrix, 4, 4);


