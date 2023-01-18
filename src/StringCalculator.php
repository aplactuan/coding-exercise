<?php

namespace App;

class StringCalculator
{
    public function add(string $number)
    {
        if ($number) {
            return $number;
        }
        return 0;
    }
}