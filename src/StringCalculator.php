<?php

namespace App;

class StringCalculator
{
    public function add(string $number)
    {
        $delimiter = ",|\n";

        if (preg_match("/\/\/(.)\n/", $number, $matches)) {
            $number = str_replace($matches[0], '', $number);
            $delimiter = $matches[1];
        }


        $numbers = preg_split("/{$delimiter}/", $number);

        foreach ($numbers as $value) {
            if ($value < 0) {
                throw new \Exception('The number is not allowed');
            }
        }

        $numbers = array_filter($numbers, fn($number) => $number <= 1000);

        return array_sum($numbers);
    }
}