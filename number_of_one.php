<?php
/**
 * 剑指 Offer 系列：二进制数中 1 的个数
 * Author: 学院君
 */

/**
 * 输入一个整型数据，返回该整型数据对应二进制数中1的出现次数
 * @param int $num
 * @return int
 */
function getNumberOfOneInBinary(int $num): int
{
    $count = 0;
    $flag = 1;
    while ($flag) {
        if ($num & $flag) {
            $count++;
        }
        $flag = $flag << 1;
    }
    return $count;
}

// 测试代码
var_dump(getNumberOfOneInBinary(9));
var_dump(getNumberOfOneInBinary(32));
var_dump(getNumberOfOneInBinary(255));
var_dump(getNumberOfOneInBinary(-255));
