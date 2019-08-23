### PHP 面试题代码

PHP 面试题每日一更，欢迎入群与大家一起交流（Github 项目主要用作维护示例代码，不会更新每个问题的答案）：

![学院君和他的朋友们](https://qcdn.xueyuanjun.com/wp-content/uploads/2019/06/18497668d7164a1498438a59bdb8f4ae.jpeg)

1、请用最简单的语言描述什么是 PHP，以及它能做什么？

2、说出下面这段代码中变量 `$a` 和 `$b` 的输出值：

![](https://images.zsxq.com/FmWaDpH48HkRUTfGuXtf7fubD_IW?e=1906272000&token=kIxbL07-8jAj8w1n4s9zv64FuZZNEATmlU_Vm6zD:3ayIMLA5bgghv6Ylr5x2BcyNGcg=)

3、请使用 PHP 代码实现官方自带的 `var_dump` 函数，或者你还可以发散下，尝试实现 Laravel 框架中使用的 `dd`/`dump` 函数。

[示例代码](https://github.com/nonfu/php_interviews/blob/master/var_dump.php)

4、孔乙己经常卖弄「回」有四种写法，我们知道，PHP 代码可以通过 PHP 标记直接嵌入到 HTML 文档中，其实，PHP 开始与结束标记也有四种方式，你知道是哪四种吗？请列举出来。

[示例代码](https://github.com/nonfu/php_interviews/blob/master/phptag.php)

5、`require`、`include`、`require_once`、`include_once` 它们各自的用途是什么？有什么区别？如果某个业务需要按需加载 PHP 文件，你会怎么设计和实现？

6、对于熟练使用 Laravel 框架的同学来说，对 Composer 肯定不陌生，我们在 Laravel 框架中无论使用辅助函数还是通过命名空间管理的类，都不会涉及到类和文件的加载操作，但实际上这个工作是  Composer 这个大管家在底层默默帮我们完成的，今天的问题是，有多少同学知道 Composer 底层是如何实现 PHP 命名空间与目录的映射，以及类和文件的按需加载的？

[参考答案](https://laravelacademy.org/post/19890.html)

7、我们都知道可以通过索引对数据库查询进行优化，MYSQL 支持哪些索引，不同索引之间的性能对比如何？索引越多越好吗？

8、在日常开发实践中，如何定位数据库慢查询语句？针对慢查询语句，你是如何进行优化的，说说你的思路。