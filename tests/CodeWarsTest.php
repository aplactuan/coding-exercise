<?php

use App\CodeWars\CodeWars;
use PHPUnit\Framework\TestCase;

class CodeWarsTest extends TestCase
{
    /** @test */
    public function it_can_solve_if_it_is_a_square()
    {
        $this->assertFalse(CodeWars::isSquare(-1));
        $this->assertTrue(CodeWars::isSquare(0));
        $this->assertFalse(CodeWars::isSquare(3));
        $this->assertTrue(CodeWars::isSquare(4));
        $this->assertTrue(CodeWars::isSquare(25));
        $this->assertFalse(CodeWars::isSquare(26));
    }

    /** @test  */
    public function it_can_generate_tribonacci_sequence()
    {
        $this->assertSame([1,1,1,3,5,9,17,31,57,105], CodeWars::tribonacci([1,1,1],10));
        $this->assertSame([0,0,1,1,2,4,7,13,24,44], CodeWars::tribonacci([0,0,1],10));
       $this->assertSame([0,1,1,2,4,7,13,24,44,81], CodeWars::tribonacci([0,1,1],10));
       $this->assertSame([1,0,0,1,1,2,4,7,13,24], CodeWars::tribonacci([1,0,0],10));
        $this->assertSame([0,0,0,0,0,0,0,0,0,0], CodeWars::tribonacci([0,0,0],10));
        $this->assertSame([1,2,3,6,11,20,37,68,125,230], CodeWars::tribonacci([1,2,3],10));
        $this->assertSame([3,2,1,6,9,16,31,56,103,190], CodeWars::tribonacci([3,2,1],10));
        $this->assertSame([], CodeWars::tribonacci([300,200,100],0));
        $this->assertSame([1], CodeWars::tribonacci([1,1,1],1));
        $this->assertSame([1, 5], CodeWars::tribonacci([1,5,3],2));
        $this->assertSame([2, 7, 3], CodeWars::tribonacci([2,7,3],3));
        $this->assertSame([1, 2, 3, 6], CodeWars::tribonacci([1,2,3],4));
        $this->assertSame([0.5,0.5,0.5,1.5,2.5,4.5,8.5,15.5,28.5,52.5,96.5,177.5,326.5,600.5,1104.5,2031.5,3736.5,6872.5,12640.5,23249.5,42762.5,78652.5,144664.5,266079.5,489396.5,900140.5,1655616.5,3045153.5,5600910.5,10301680.5], CodeWars::tribonacci([0.5,0.5,0.5],30));
    }

    /** @test  */
    public function it_knows_if_a_number_is_prime()
    {
        $this->assertFalse(CodeWars::isPrime(0));
        $this->assertFalse(CodeWars::isPrime(1));
        $this->assertTrue(CodeWars::isPrime(2));
        $this->assertFalse(CodeWars::isPrime(4));
        $this->assertTrue(CodeWars::isPrime(5));
    }

    /** @test  */
    public function test_it_decode_alphabet_position()
    {
        $this->assertSame('1', CodeWars::alphabet_position('a'));
        $this->assertSame('20 8 5 19 21 14 19 5 20 19 5 20 19 1 20 20 23 5 12 22 5 15 3 12 15 3 11', CodeWars::alphabet_position('The sunset sets at twelve o\' clock.'));
        $this->assertSame('20 8 5 14 1 18 23 8 1 12 2 1 3 15 14 19 1 20 13 9 4 14 9 7 8 20', CodeWars::alphabet_position('The narwhal bacons at midnight.'));
    }
    
    /** @test */
    public function test_it_can_convert_string_to_weird_string()
    {
        $this->assertSame('HeLlO WoRlD FoO BaR BaZ', Codewars::to_weird_case('Hello world foo bar baz'));
        $this->assertSame('WeLl I GuEsS YoU PaSsEd', Codewars::to_weird_case('wEll i GuesS you passed'));
    }
}