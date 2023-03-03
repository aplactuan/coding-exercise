<?php

namespace App;

use App\Wordle\BaseFilter;
use App\Wordle\CorrectOrderFilter;
use App\Wordle\ExcludeLettersFilter;
use App\Wordle\MisplacedLettersFilter;

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
                    $wordleFilter = new CorrectOrderFilter($wordleFilter, $filter);
                    break;
                case 'misplaced_letters':
                    $wordleFilter = new MisplacedLettersFilter($wordleFilter, $filter);
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

    public function misplacedLetters(string $letters)
    {
        $this->filters['misplaced_letters'] = $letters;
    }
}