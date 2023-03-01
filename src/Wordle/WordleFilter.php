<?php

namespace App\Wordle;

interface WordleFilter
{
    public function getResults(): array;
}