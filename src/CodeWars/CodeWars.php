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

    public static function alphabet_position(string $string)
    {
        $message = '';
        $alphabet = str_split('abcdefghijklmnopqrstuvwxyz');

        foreach (str_split($string) as $letter) {
            $key = array_search(strtolower($letter), $alphabet);
            if ($key !== false) {
                $message .= $key + 1 . ' ';
            }
        }

        return trim($message);
    }

    public static function to_weird_case(string $string)
    {
        return implode(' ', array_map(function ($word) {
            return implode('', array_map(function ($letter, $index) {
                return $index % 2 === 0 ? strtoupper($letter) : strtolower($letter) ;
            }, str_split($word), array_keys(str_split($word))));
        }, explode(' ', $string)));
    }
}