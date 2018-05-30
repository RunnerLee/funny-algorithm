<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2018-05
 */
function kmp($haystack, $needle, $offset = 0)
{
    // 被查找字符串长度
    $haystackLenght = strlen($haystack);

    // 查找字符串长度
    $needleLength = strlen($needle);

    // 搜索的总步长
    $searchSteps = $haystackLenght - $needleLength;

    // 制作部分匹配表
    $next = make_next($needle);

    for ($offset = 0; $offset < $searchSteps; ++$offset) {
        // 开始匹配
        for ($k = 0; $k < $needleLength; ++$k) {
            if ($needle[$k] !== $haystack[$offset + $k]) {
                // 出现不匹配, 则调整位置
                $offset += $next[$k - 1] ?? 0;
                continue 2;
            }
        }
        // 如果被查找字符串全部验完, 则直接返回 位置
        return $offset;
    }

    return false;
}

function make_next($string)
{
    $length = strlen($string);
    $next = [0];    // 字符串第一位没有前后缀

    // 初始化最长前后缀共有元素长度
    $cnd = 0;

    // 从字符串第二位开始
    for ($k = 1; $k < $length; ++$k) {

        // 上一位长度是 0, 且当前位置的字符同字符串第一位相符, 则将 cnd 置为 1
//        if (0 === $cnd) {
//            if ($string[$k] === $string[0]) {
//                $cnd = 1;
//            }
//        } else {
//            // 上一位长度非 0, 判断当前位置的字符与对应位置的字符串是否相同, 如果相同则 cnt 增 1, 否则重置为 0
//            $cnd = $string[$k] !== $string[$cnd] ? 0 : ($cnd + 1);
//        }

        $cnd = 0 == $cnd ? ($string[$k] === $string[0] ? 1 : 0) : ($string[$k] !== $string[$cnd] ? 0 : ($cnd + 1));

        // 设置当前位置的最长前后缀共有元素长度
        $next[$k] = $cnd;
    }

    return $next;
}

//$string = 'participate in parachute';
$string = 'ABCDAB ABCDABCDABDE';

$next = make_next($string);

for ($i = 0; $i < strlen($string); ++$i) {
    printf("%2s", $string[$i]);
}

echo "\n";

array_map(
    function ($value) {
        printf("%2d", $value);
    },
    $next
);

echo "\n";

echo strpos($string, 'ABCDABD') . "\n";

echo kmp($string, 'ABCDABD') . "\n";