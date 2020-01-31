<?php
/**
 * 使用两种及以上方法实现斐波那契数列
 * Author：学院君
 */

/**
 * 方法1：递归
 * 优点：简单清晰
 * 缺点：性能差，存在较多重复运算
 * @param int $n
 * @return int
 */
function method_1(int $n): int
{
    if ($n <= 0) {
        return 0;
    }
    if ($n == 1) {
        return 1;
    }
    return method_1($n - 1 ) + method_1($n - 2);
}

/**
 * 方法2：循环迭代
 * 优点：避免了上述方法1的重复计算，性能更好
 * 缺点：实现更复杂，可读性不好
 * @param int $n
 * @return int
 */
function method_2(int $n): int
{
    $result = [0, 1];
    if ($n < 2) {
        return $result[$n];
    }
    $fib_n_1 = 1;   // f(n-1) 对应的数值
    $fib_n_2 = 0;   // f(n-2) 对应的数值
    $fib_n = 0;     // f(n) 初始值
    for ($i = 2; $i <= $n; $i++) {
        $fib_n = $fib_n_1 + $fib_n_2;
        $fib_n_2 = $fib_n_1;
        $fib_n_1 = $fib_n;
    }

    return $fib_n;
}

/**
 * 方法3：生成器
 * 性能和循环相仿，可读性更差
 * @return Generator
 */
function method_3()
{
    $fib_n_2 = 0;
    $fib_n_1 = 1;
    yield $fib_n_1;
    while(true)
    {
        $fib_n = $fib_n_1 + $fib_n_2;
        $fib_n_2 = $fib_n_1;
        $fib_n_1 = $fib_n;
        yield $fib_n;
    }
}


// 测试代码
$start = microtime(true);
var_dump(method_1(32));
echo '耗时：' . (microtime(true) - $start) . 'ms' . PHP_EOL;
$start = microtime(true);
var_dump(method_2(32));
echo '耗时：' . (microtime(true) - $start) . 'ms' . PHP_EOL;
$start = microtime(true);
$i = 1;
foreach (method_3() as $num) {
    if ($i == 32) {
        var_dump($num);
        break;
    }
    $i++;
}
echo '耗时：' . (microtime(true) - $start) . 'ms' . PHP_EOL;



