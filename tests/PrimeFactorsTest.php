<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /** @test
        @dataProvider factors
     */
    public function it_can_generate_prime_factors_of_1($number, $expected)
    {
        $factors = new PrimeFactors();

        $this->assertEquals($expected, $factors->generate($number));
    }

    public function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [8, [2, 2, 2]],
            [100, [2, 2, 5, 5]]
        ];
    }
}
