<?php
/**
 * 将字符串中的空格替换成%20，要求时间复杂度为O(n)
 * Author: 学院君
 */

// 以空间换时间，创建一个新的字符串
function method_1($str, $char = ' ', $to = '%20')
{
    $target = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $target .= $str[$i] == $char ? $to : $str[$i];
    }
    return $target;
}

// 在原字符串基础上做替换，实现起来复杂一些，但节省了内存空间
function method_2($str, $char = ' ', $to = '%20')
{
    $count = 0;
    $len = strlen($str);
    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] == $char) {
            $count++;
        }
    }
    if ($count == 0) {
        return $str;
    }
    $newLen = $len + $count * strlen($to) - $count * strlen($char);  // 最终替换后字符串长度
    $str = str_pad($str, $newLen);  // 用空格填充字符串到最终替换后长度
    $i = $len - 1;  // 原始字符串最后一个字符索引
    $j = $newLen - 1;  // 替换后字符串最后一个字符索引
    while ($i >= 0 && $j > $i) {
        if ($str[$i] != $char) {
            $str[$j--] = $str[$i--];
        } else {
            $str[$j--] = '0';
            $str[$j--] = '2';
            $str[$j--] = '%';
            $i--;
        }
    }
    return $str;
}

var_dump(method_1('We are happy.'));
var_dump(method_2('We are happy.'));




