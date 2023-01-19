<?php

namespace App;

class StringCalculator
{
    public function add(string $number)
    {
        if (!$number) {
            return 0;
        }

        $numbers = preg_split("/,|\n/", $number);

        foreach ($numbers as $value) {
            if ($value < 0) {
                throw new \Exception('The number is not allowed');
            }
        }

        $numbers = array_filter($numbers, fn($number) => $number < 1000);

        return array_sum($numbers);
    }
}