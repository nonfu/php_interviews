<?php
/**
 * Excel 字母编码与列数转化
 * Author：学院君
 */

/**
 * 将 Execel 二十六进制字母编码列号转化为十进制数字
 * @param string $column
 * @return int
 */
function convertExcelColumnAlphaToDecimal(string $column)
{
    $alphaStr = strtoupper($column); // 首先将字母都转化为大写
    $alphaArr = str_split($alphaStr);  // 将字符串格式字母转化为数组格式
    $base = 26;   // 用26个字母表示十进制数字对应的进制单位是26，逢26进1
    rsort($alphaArr);   // 对字母数组逆向排序，方便计算对应十进制数字
    $decimal = 0;
    foreach ($alphaArr as $index => $alpha) {
        // 大写字母对应 ASCII 码从 65 开始，而此处映射的数字从 1 开始，所以减去 64 得到对应的十进制数字
        $num = ord($alpha) - 64;
        // 将当前位置的字母转化为对应的十进制数值，进制是26，类比十进制，256 = 2*10^2 + 5*10^1 + 6*10^0
        $decimal += $num * pow($base, $index);
    }
    return $decimal;
}

// 测试代码
var_dump(convertExcelColumnAlphaToDecimal('A'));
var_dump(convertExcelColumnAlphaToDecimal('AB'));
var_dump(convertExcelColumnAlphaToDecimal('ABC'));

