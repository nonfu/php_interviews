<?php
/**
 * 剑指 Offer 系列：和为 s 的连续正整数序列
 * Author：学院君
 */

function findContinuousSequence(int $sum): void
{
    // 至少包含1、2两个数字
    if ($sum < 3) {
        return;
    }

    // 初始区间最小值和最大值
    $small = 1;
    $big = 2;
    // 中间位置的数值
    $middle = floor((1 + $sum) / 2);
    // 当前区间数值和
    $currentSum = $small + $big;

    // 循环条件：第一个指针指向的位置不能越过中间值
    while ($small < $middle) {
        // 如果当前区间和等于sum，则打印这个区间
        if ($currentSum == $sum) {
            printContinuousSequence($small, $big);
        }
        // 循环移动区间左侧和右侧指针找到所有满足条件的区间并打印出来
        while ($currentSum > $sum && $small < $middle) {
            // 如果当前区间和大于sum，则移动左指针（体现为从当前区间和减去当前small值，再将small+1）
            $currentSum -= $small;
            $small++;

            if ($currentSum == $sum) {
                printContinuousSequence($small, $big);
            }
        }

        // 如果当前区间和小于sum，则移动右指针，因为右侧的值比左侧大，这里可以想象存在一个隐形的递增序列
        $big++;
        $currentSum += $big;
    }
}

// 打印连续正数区间函数
function printContinuousSequence(int $small, int $big): void
{
    for ($i = $small; $i <= $big; $i++) {
        printf("%d ", $i);
    }
    printf("\n");
}

// 测试代码
$sum = 15;
findContinuousSequence($sum);
