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

    public function test_it_filters_words_that_have_incorrect_letters()
    {
        $wordle = new WordleSolver();

        $wordle->excludeLetters('ie');

        $this->assertFalse(in_array('green', $wordle->results()));
        $this->assertFalse(in_array('genie', $wordle->results()));
        $this->assertFalse(in_array('might', $wordle->results()));
        $this->assertFalse(in_array('cable', $wordle->results()));
        $this->assertFalse(in_array('sheet', $wordle->results()));
        $this->assertTrue(in_array('cloud', $wordle->results()));
        $this->assertTrue(in_array('boats', $wordle->results()));
        $this->assertCount(2, $wordle->results());
    }
}
