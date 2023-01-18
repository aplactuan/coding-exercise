<?php


use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function it_evaluate_an_empty_string_as_0()
    {
        $calculator = new StringCalculator;

        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    public function it_returns_the_number_when_it_just_a_single_string()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(5, $calculator->add('5'));
    }
}
