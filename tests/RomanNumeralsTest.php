<?php


use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
     * @test
     * @dataProvider numerals
     */
    public function it_generates_roman_numerals($romanNumeral, $number)
    {
        $this->assertEquals($romanNumeral, RomanNumerals::generate($number));
    }

    /** @test  */
    public function it_cannot_generate_number_below_and_equal_zero()
    {
        $this->assertFalse(RomanNumerals::generate(0));
        $this->assertFalse(RomanNumerals::generate(-5));
    }

    /** @test  */
    public function it_cannot_generate_number_below_and_equal_4000()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
        $this->assertFalse(RomanNumerals::generate(4005));
    }

    public function numerals()
    {
        return [
            ['I', 1],
            ['II', 2],
            ['IV', 4],
            ['V', 5],
            ['VIII', 8],
            ['XVI', 16],
            ['XIX', 19],
            ['XLIX', 49],
            ['LI', 51],
            ['LXX', 70],
            ['XCIX', 99],
            ['MCMXCVIII', 1998],
            ['MMMCMXCIX', 3999]
        ];
    }
}
