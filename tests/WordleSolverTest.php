<?php

use App\WordleSolver;
use PHPUnit\Framework\TestCase;

class WordleSolverTest extends TestCase
{
    public function test_it_returns_an_empty_array_if_there_are_no_inputs()
    {
        $wordle = new WordleSolver();

        $this->assertCount(0, $wordle->results());
    }
}
