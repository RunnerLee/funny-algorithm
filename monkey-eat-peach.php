<?php

/**
 * 
 * 海滩上有一堆桃子，五只猴子来分。
 *	第一只猴子把这堆桃子平均分为五份，多了一个，这只猴子把多的一个扔入海中，拿走了一份。
 *	第二只猴子把剩下的桃子又平均分成五份，又多了一个，它同样把多的一个扔入海中，拿走了一份，
 *	第三、第四、第五只猴子都是这样做的，问海滩上原来最少有多少个桃子？
 */

/**
 * 通过穷举来猜初始时桃子总数
 */

$i = 1;
while ($i += 5) {
    $monkeys = 1; // 成功获得桃子的猴子总数, 初始第一只猴子已经拿到桃子
    $callback = function ($number) use (&$monkeys, &$callback) {

        // 下一个猴子看到的桃子总数
        $next = ($number - 1) / 5 * 4;
        
        if (1 !== $next % 5) {
            return false;
        }
        
        // 能够被五个猴子连续拿, 则成功并退出.
        if (5 === ++$count) {
            return true;
        }

        return $callback($next);

        // return 1 === $next % 5 ? (++$monkeys === 5 ?: $callback($next)) : false;
    };
    
    if ($callback($i)) {
        echo "总数: {$i}\n";
        break;
    }
}