<?php

namespace App;

class PerfectTriangle
{
    public static function check(int $number)
    {
        if ($number <= 0) {
            //maybe throw an Exception here
            return false;
        }

        $stack = 0;

        for ($iteration=1;$number > $stack; $iteration++) {
            $stack = $stack + $iteration;
        }

        return $stack == $number;
    }
}