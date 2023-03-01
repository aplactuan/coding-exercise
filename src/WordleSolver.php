<?php

namespace App;

use App\Wordle\BaseFilter;
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

        if ($this->filters['exclude_letters']) {
            $wordleFilter = new ExcludeLettersFilter($wordleFilter, $this->filters['exclude_letters']);
        }

        return $wordleFilter->getResults();
    }

    public function excludeLetters(string $letters)
    {
        $this->filters['exclude_letters'] = $letters;
    }
}