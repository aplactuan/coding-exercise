<?php

namespace App;

class StringCalculator
{
    const MAX_ALLOWED_NUMBER = 1000;

    protected string $delimiter = ",|\n";

    /**
     * @throws \Exception
     */
    public function add(string $number)
    {
        $number = $this->parseString($number);

        $numbers = preg_split("/{$this->delimiter}/", $number);

        $this->disallowedNegatives($numbers);

        return array_sum($this->filterNumbers($numbers));
    }


    /**
     * Parse the string
     * @param string $number
     * @return string
     */
    protected function parseString(string $number): string
    {
        $pattern = "\/\/(.)\n";

        if (preg_match("/{$pattern}/", $number, $matches)) {
            $number = str_replace($matches[0], '', $number);
            $this->delimiter = $matches[1];
        }

        return $number;
    }

    /**
     * throw an exception when one of the parse number is a negative
     * @param array $numbers
     * @throws \Exception
     */
    protected function disallowedNegatives(array $numbers): void
    {
        foreach ($numbers as $value) {
            if (intval($value) < 0) {
                throw new \Exception('The number is not allowed');
            }
        }
    }

    /**
     * Filter the numbers array for numbers that we will be ignored
     * @param array $numbers
     * @return array
     */
    protected function filterNumbers(array $numbers): array
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_ALLOWED_NUMBER);
    }
}