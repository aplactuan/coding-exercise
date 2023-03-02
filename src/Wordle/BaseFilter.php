<?php

namespace App\Wordle;

class BaseFilter implements WordleFilter
{

    public function getResults(): array
    {
        return [
            'green',
            'genie',
            'might',
            'sight',
            'cable',
            'sheet',
            'cloud',
            'boats'
        ];
    }
}