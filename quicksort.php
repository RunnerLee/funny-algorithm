<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2018-05
 */

class Pivot
{
    protected $number;

    protected $count = 1;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function incrCount()
    {
        ++$this->count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function toArray()
    {
        return array_fill(0, $this->count, $this->number);
    }
}

function quick_sort(array $arr)
{
    $count = count($arr);

    if ($count <= 1) {
        return $arr;
    }

    $left = $right = [];

    $pivot = new Pivot($arr[0]);

    for ($i = 1; $i < $count; ++$i) {
        if ($arr[$i] > $pivot->getNumber()) {
            $right[] = $arr[$i];
        } else if ($arr[$i] < $pivot->getNumber()) {
            $left[] = $arr[$i];
        } else  {
            $pivot->incrCount();
        }
    }

    $left = quick_sort($left);
    $right = quick_sort($right);

    return array_merge($left, $pivot->toArray(), $right);
}

//$arr = range(1, 10);
$arr = [
    1,2,3,4,5,6,7,8,9,9,2,1,3,2,3,1,2,51,6,1,2,3,1,2,51,2,3,
];

shuffle($arr);

print_r($arr);

print_r(quick_sort($arr));



