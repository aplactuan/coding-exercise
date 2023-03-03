<?php

namespace App\Wordle;

class MisplacedLettersFilter implements WordleFilter
{

    private WordleFilter $filter;
    private string $misplacedLetters;

    public function __construct(WordleFilter $filter, string $misplacedLetters)
    {
        $this->filter = $filter;
        $this->misplacedLetters = $misplacedLetters;
    }

    public function getResults(): array
    {
        $pattern = str_replace('*', '.', preg_replace("/([^*])/", "[^$1]", $this->misplacedLetters));

        return array_filter($this->filter->getResults(), function($string) use ($pattern){
            return preg_match("/". $pattern ."/", $string);
        });
    }
}