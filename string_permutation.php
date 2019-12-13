<?php
/**
 * 剑指 Offer 系列：字符串的排列
 * Author：学院君
 */

// 字符串排列实现函数
function Permutation($str) {
    if (mb_strlen($str) == 0) {
        return;
    }
    PermutationSubString($str, 0);
}

// 递归处理逻辑
function PermutationSubString($str, $begin)
{
    $end = mb_strlen($str) - 1;  // 字符串最后一位位置
    if ($begin == $end) {
        // 已经到字符串最后一位，打印该字符
        printf("%s\n", $str);
    } else {
        // 从第一位开始，依次考虑后面的所有可能组合情况
        for ($ch = $begin; $ch <= $end; $ch++) {
            // 交换当前字符串第一位和后面剩下所有位置的字符
            $temp = $str[$ch];
            $str[$ch] = $str[$begin];
            $str[$begin] = $temp;
            PermutationSubString($str, $begin + 1);
            // 替换完成后复原
            $temp = $str[$ch];
            $str[$ch] = $str[$begin];
            $str[$begin] = $temp;
        }
    }
}

// 测试代码
Permutation('abc');
// 输出如下：
// abc
// acb
// bac
// bca
// cba
// cab
