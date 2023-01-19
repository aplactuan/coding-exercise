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

    /** @test */
    public function it_can_add_two_or_more_numbers()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(10, $calculator->add('5,5'));
        $this->assertEquals(19, $calculator->add('5,5,4,5'));
    }

    /** @test */
    public function it_can_also_accept_newline_as_delimiter()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(10, $calculator->add("5\n5"));
        $this->assertEquals(15, $calculator->add("5\n5\n5"));
        $this->assertEquals(25, $calculator->add("5\n5\n5,5,5"));
    }

    /** @test */
    public function it_wont_allow_negative_numbers()
    {
        $calculator = new StringCalculator();

        $this->expectException(\Exception::class);

        $calculator->add("5,-5");
    }

    /** @test */
    public function it_ignores_number_greater_than_1000()
    {
        $calculator = new StringCalculator();

        $this->assertEquals(15, $calculator->add("15,1001"));
    }
}
