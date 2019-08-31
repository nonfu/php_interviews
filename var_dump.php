<?php
function my_var_dump()
{
    $args   = func_num_args();
    for ($i = 0; $i < $args; $i++) {
        $param = func_get_arg($i);
        switch (gettype($param)) {
            case 'NULL':
                echo 'NULL';
                break;
            case 'boolean':
                echo ($param ? 'bool(true)' : 'bool(false)');
                break;
            case 'integer':
                echo "int($param)";
                break;
            case 'double':
                echo "float($param)";
                break;
            case 'string':
                dump_string($param);
                break;
            case 'array':
                dump_array($param);
                break;
            case 'object':
                dump_object($param);
                break;
            case 'resource':
                echo 'resource';
                break;
            default:
                echo 'UNKNOWN TYPE';
                break;
        }
        echo PHP_EOL;
    }
}

function dump_string($param)
{
    $str = sprintf("string(%d) %s", strlen($param), $param);
    echo $str;
}

function dump_array($param)
{
    $len = count($param);
    echo "array($len) {" . PHP_EOL;
    foreach ($param as $key => $val) {
        if (is_array($val)) {
            dump_array($val);
        } else {
            echo sprintf('["%s"] => %s(%s)', $key, gettype($val), $val);
        }
        echo PHP_EOL;
    }
    echo "}" . PHP_EOL;
}

function dump_object($param)
{
    $className = get_class($param);
    $class = new ReflectionClass($param);
    $props = $class->getDefaultProperties();
    echo sprintf("Object %s #" . spl_object_id($param) . "(%d) {", $className, count($props));
    echo PHP_EOL;
    foreach ($props as $key => $val) {
        $prop = new ReflectionProperty($className, $key);
        $access = $prop->isPublic() ? "public" : ($prop->isProtected() ? "protected" : ($prop->isPrivate() ? "private" : ""));
        if ($access == "protected" || $access == "private") {
            $prop->setAccessible(true);
        }
        $val = $prop->getValue($param) ? : $val;
        echo "[\"$key:$access\"] => ";
        my_var_dump($val);
        echo PHP_EOL;
    }
    echo "}";
}

// 打印字符串变量
$name = "学院君";
my_var_dump($name);
echo PHP_EOL;
// 答应数组变量
$arr = [
    "Laravel 学院",
    "url" => "https://laravelacademy.org"
];
my_var_dump($arr);
echo PHP_EOL;
// 打印对象变量
class MyTestClass 
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}
$obj = new MyTestClass($name);
my_var_dump($obj);
echo PHP_EOL;
// 依次打印多个变量
my_var_dump(1, true, null); 
