<?php
/**
 * 剑指 Offer：数组中只出现一次的数字
 * Author：学院君
 */

function findNumberAppearOnce(array $data): array
{
    $len = count($data);
    if ($len <= 1) {
        return $data;
    }

    $resultExclusiveOR = 0;
    // 将数组中的数字依次两两做异或运算
    // 根据异或规则，相同的数字异或结果为零，而给定数组要么两两相同，要么只出现一次
    // 所以最后异或结果必然是两个只出现一次数字的异或结果，因为出现两次的数字都两两抵消了
    for ($i = 0; $i < $len; $i++) {
        $resultExclusiveOR ^= $data[$i];
    }

    // 由于两个出现一次的数字不想等，所以异或结果肯定不为零
    // 接下来，我们按照第一个为1的位的位置（假设为n位），将原数组划分为两个子数组
    // 第一个子数组每个数字的n位都是1，第二个子数组每个数字的n位都是0
    // 这样一来，出现了两次的数字肯定都被分配到了一个数组，而只出现一次的数字被分到了两个不同的子数组
    $indexOf1 = findFirstBitIs1($resultExclusiveOR);

    // 最后，我们再在两个子数组中分别找出只出现一次的数字即可
    // 方法很简单，仍然是通过异或的方式，根据上面的分组结果，最后的异或结果就是只出现一次的数字
    $num1 = $num2 = 0;
    for ($j = 0; $j < $len; $j++) {
        if (isBit1($data[$j], $indexOf1)) {
            $num1 ^= $data[$j];
        } else {
            $num2 ^= $data[$j];
        }
    }

    return [$num1, $num2];
}

function findFirstBitIs1($num): int
{
    $indexBit = 0;
    while (($num & 1) == 0) {
        $num = $num >> 1;
        $indexBit++;
    }
    return $indexBit;
}

function isBit1($num, $indexBit): bool
{
    $num = $num >> $indexBit;
    return ($num & 1);
}

$data = [2, 4, 3, 6, 3, 2, 5, 5];
printf("只出现一次的数字: %s\n", implode(",", findNumberAppearOnce($data)));
