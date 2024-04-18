<?php

namespace App\CodeWars;

class CodeWars
{
    public static function isSquare($n)
    {
        if ($n >= 0) {
            return sqrt($n) - floor(sqrt($n)) == 0;
        }

        return false;
    }

    public static function tribonacci(array $initial, int $n)
    {
        $sequence = array_slice($initial, 0, $n);

        if ($n > 3) {
            for ($i = 3; $i <= $n-1; $i++) {
                $sequence[$i] = array_sum(array_slice($sequence, -3, 3));
            }
        }

        return $sequence;
    }

    public static function isPrime(int $n)
    {
        if ($n == 1 || $n == 0) {
            return false;
        }
        for ($i = 2; $i <= $n/2; $i++) {
            if ($n % $i === 0) {
                return false;
            }

            if ($i * $i > $n) {
                return true;
            }
        }
        return true;
    }
}