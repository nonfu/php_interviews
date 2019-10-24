<?php
/**
 * 通过两个栈实现队列
 * Author: 学院君
 */

class StackQueue
{
    /**
     * 用于push数据
     * @var SplStack
     */
    protected $stack1;
    /**
     * 用于pop数据
     * @var SplStack
     */
    protected $stack2;

    public function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    /**
     * 往队列中添加队尾元素
     * @param $value
     */
    public function pushToTail($value)
    {
        $this->stack1->push($value);
    }

    /**
     * 从队列中删除队头元素
     * @return mixed
     * @throws Exception
     */
    public function popFromHead()
    {
        if ($this->stack2->isEmpty()) {
            if (!$this->stack1->isEmpty()) {
                $value = $this->stack1->pop();
                $this->stack2->push($value);
            }
        }
        if ($this->stack2->isEmpty()) {
            throw new Exception('Queue is empty.');
        }

        return $this->stack2->pop();
    }
}

//测试代码
$queue = new StackQueue();
$queue->pushToTail(100);
$queue->pushToTail('PHP面试题');
$queue->pushToTail('学院君');
try {
    while ($value = $queue->popFromHead()) {
        var_dump($value);
    }
} catch (Exception $exception) {
    echo $exception->getMessage();
}
echo "\n";
exit();
