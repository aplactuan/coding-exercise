<?php


use App\PerfectTriangle;
use PHPUnit\Framework\TestCase;

class PerfectTriangleTest extends TestCase
{
    /** @test */
    public function it_returns_true_it_is_a_perfect_triangle()
    {
        foreach ([1, 3, 6, 10] as $number) {
            $this->assertTrue(PerfectTriangle::check($number));
        }
    }

    /** @test  */
    public function it_returns_false_if_it_is_not_a_perfect_triangle()
    {
        foreach ([0, 2, 5, 7, 8, 9, 11, 12] as $number) {
            $this->assertFalse(PerfectTriangle::check($number));
        }
    }
}
