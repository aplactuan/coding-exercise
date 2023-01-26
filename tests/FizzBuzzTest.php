<?php


use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    public function it_returns_fizz_for_numbers_divisible_by_three()
    {
        foreach ([3, 6, 9, 12, 21] as $number) {
            $this->assertEquals('fizz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_buzz_for_numbers_divisible_by_five()
    {
        foreach ([5, 10, 20, 25] as $number) {
            $this->assertEquals('buzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_fizzbuzz_for_numbers_divisible_by_three_and_five()
    {
        foreach ([15, 30, 45, 60, 75] as $number) {
            $this->assertEquals('fizzbuzz', FizzBuzz::convert($number));
        }
    }

    /** @test */
    public function it_returns_the_number_for_number_not_divisable_by_3_and_5()
    {
        foreach ([1, 2, 4, 7, 8] as $number) {
            $this->assertEquals($number, FizzBuzz::convert($number));
        }
    }
}
