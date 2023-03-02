<?php

namespace App\Wordle;

class CorrectOrderFilter implements WordleFilter
{
    protected WordleFilter $filter;
    protected string $correctOrder;

    public function __construct(WordleFilter $filter, string $correctOrder)
    {
        $this->filter = $filter;
        $this->correctOrder = $correctOrder;
    }

    public function getResults(): array
    {
        $rule = str_replace('*', '.', $this->correctOrder);

        return array_filter($this->filter->getResults(), function($string) use ($rule) {
            return preg_match("/" . $rule . "/", $string);
        });
    }
}