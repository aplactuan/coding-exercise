<?php

namespace App\Wordle;

class ExcludeLettersFilter implements WordleFilter
{
    protected WordleFilter $filter;
    protected string $excludeLetters;

    public function __construct(WordleFilter $filter, string $excludeLetters)
    {
        $this->filter = $filter;
        $this->excludeLetters = $excludeLetters;
    }

    public function getResults(): array
    {
        $pattern = '[^' . $this->excludeLetters . ']{5}';

        return array_filter($this->filter->getResults(), function($string) use ($pattern){
            return preg_match("/". $pattern ."/", $string);
        });
    }
}