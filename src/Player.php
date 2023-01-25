<?php

namespace App;

class Player
{
    public int $points = 0;

    public function __construct(public string $name)
    {
        
    }

    public function score()
    {
        $this->points++;
    }

    public function gameScore()
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}