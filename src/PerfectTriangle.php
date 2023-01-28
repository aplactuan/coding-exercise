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

        $balls = 0;

        for ($stack=1;$number > $balls; $stack++) {
            $balls = $balls + $stack;
        }

        return $balls == $number;
    }
}