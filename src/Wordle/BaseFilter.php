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
            'cable',
            'sheet',
            'cloud',
            'boats'
        ];
    }
}