<?php
/**
 * 剑指 Offer 系列：打印从1到最大的n位十进制数
 * Author：学院君
 */

/**
 * 版本1
 * @param int $n
 * @return string
 * @throws Exception
 */
function printOneToMaxOfNDigits(int $n): string
{
    if ($n <= 0) {
        throw new Exception("无效的位数n，要求正整型数");
    }
    if (pow(10, $n) > pow(2, 8 * PHP_INT_SIZE)) {
        throw new Exception("无效的位数n，不要超过最大整型值");
    }
    $num = 1;
    $i = 0;
    while($i++ < $n) {
        $num *= 10;
    }

    $nums = '';
    for ($i = 1; $i < $num; $i++)
    {
        // 超出最大整型值，不再继续往后处理
        if ($i > PHP_INT_MAX) {
            break;
        }
        $nums .= sprintf("%d,", $i);
    }
    return rtrim($nums,  ',');
}

try {
    var_dump(printOneToMaxOfNDigits(20));   // 无效的位数n，不要超过最大整型值
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}

try {
    var_dump(printOneToMaxOfNDigits(-1));   // 无效的位数n，要求正整型数
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}

try {
    var_dump(printOneToMaxOfNDigits(1));   // 1,2,3,4,5,6,7,8,9
} catch (Exception $exception) {
    var_dump($exception->getMessage());
}
