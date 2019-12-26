<?php
/**
 * 剑指 Offer 系列：从 1 到 n 整数中 1 出现的次数
 * Author：学院君
 */

/**
 * 从 1 到整数 n 中 1 出现的总次数
 * @param int $n
 * @return int
 */

/**
 * 第一种解法，时间复杂度为 O(nlogn)
 * @param int $n
 * @return int
 */
function NumberOf1Between1AndN(int $n): int
{
    $count = 0;
    for ($i = 1; $i <= $n; $i++) {
        $count += NumberOf1($i);
    }
    return $count;
}

function NumberOf1($n): int
{
    $count = 0;
    while ($n) {
        if ($n % 10 == 1) {
            $count++;
        }
        $n = floor($n / 10);
    }
    return $count;
}

$number = 8;
var_dump(NumberOf1Between1AndN($number));  // 1
$number = 16;
var_dump(NumberOf1Between1AndN($number));  // 9
$number = 64;
var_dump(NumberOf1Between1AndN($number));  // 17

/**
 * 第二种解法：时间复杂度为 O(logn)
 * @param int $n
 * @return int
 */
function NumberOf1Between1AndNV2(int $n): int
{
    if ($n <= 0) {
        return 0;
    }

    $str = sprintf("%d", $n);

    return NumberOf1V2($str);
}

function NumberOf1V2(&$str): int
{
    if (empty($str)) {
        return 0;
    }

    // 字符串长度
    $len = strlen($str);

    // 如果是个位数则做如下处理
    if ($len == 1 && $str[0] == '0') {
        return 0;
    }
    if ($len == 1 && $str[0] > 0) {
        return 1;
    }

    $numOfFirstDigit = 0;
    // 以 12345 和 21345 为例，20000以前的处理方式和20000以后的处理方式是不同的，
    // 因为10000-20000之间万位1的出现次数是1万次，而20000以后万位1出现的次数是0次
    if ($str[0] > 1) {
        // 对于大于20000的数字，首位（万位）出现1的次数是10000次，N是其它位数数字同理
        $numOfFirstDigit = PowerBase10($len);
    } elseif ($str[0] == 1) {
        // 对于介于10000-20000之间的数字，首位出现1的次数是万位以后的数字值+1
        $numOfFirstDigit = intval(substr($str, 1)) + 1;
    }

    // 还是以 12345 为例，分成两段后半段 2346-12345 刨除万位数字之后，
    // 其它位数1出现的次数是万位数字*10的3三次方，转化为变量如下所示：
    $numOfOtherDigits = $str[0] * PowerBase10($len - 1);

    // 前半段按照上述逻辑递归计算
    $preDisgits = substr($str, 1);
    $numRecursive = NumberOf1V2($preDisgits);

    return $numOfFirstDigit + $numOfOtherDigits + $numRecursive;
}

// 获取传入数字首位基数，是10、100、1000还是10000，依次类推。。。
function PowerBase10(int $n): int
{
    $result = 1;
    for ($i = 1; $i < $n; $i++) {
        $result *= 10;
    }
    return $result;
}

$number = 8;
var_dump(NumberOf1Between1AndNV2($number));  // 1
$number = 16;
var_dump(NumberOf1Between1AndNV2($number));  // 9
$number = 64;
var_dump(NumberOf1Between1AndNV2($number));  // 17
$number = 12345;
var_dump(NumberOf1Between1AndNV2($number));  // 4691
$number = 21345;
var_dump(NumberOf1Between1AndNV2($number));  // 12591
