<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2018-05
 */

function bubble_sort(array $arr)
{
    $count = count($arr) - 1;

    for ($i = 0; $i < $count; ++$i) {
        for ($k = 0; $k < $count - $i; ++$k) {
            $temp = $arr[$k + 1];
            if ($arr[$k] > $temp) {
                $arr[$k + 1] = $arr[$k];
                $arr[$k] = $temp;
            }
        }
    }

    return $arr;
}

$arr = range(1, 10);
//
//$arr = [1,2,3,4,5,6,7,8,9,10,1,3,4,9,2];

shuffle($arr);

print_r($arr);

print_r(bubble_sort($arr));