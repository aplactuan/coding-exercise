<?php

namespace App;

use App\Wordle\BaseFilter;
use App\Wordle\CorrectOrderFilter;
use App\Wordle\ExcludeLettersFilter;

class WordleSolver
{
    protected $filters = [];

    public function results(): array
    {
        if (empty($this->filters)) {
            return [];
        }

        $wordleFilter = new BaseFilter();

        foreach ($this->filters as $key => $filter) {
            switch ($key) {
                case 'exclude_letters':
                    $wordleFilter = new ExcludeLettersFilter($wordleFilter, $filter);
                    break;
                case 'correct_order':
                    $wordleFilter = new CorrectOrderFilter($wordleFilter, $this->filters['correct_order']);
                    break;
            }
        }

        return $wordleFilter->getResults();
    }

    public function excludeLetters(string $letters)
    {
        $this->filters['exclude_letters'] = $letters;
    }

    public function correctOrder(string $string)
    {
        $this->filters['correct_order'] = $string;
    }
}