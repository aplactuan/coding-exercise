<?php

namespace App;

class TennisMatch
{
    public function __construct(protected Player $playerOne, protected Player $playerTwo)
    {
        
    }

    public function score()
    {
        if ($this->hasWinner()) {
            return "Winner: " . $this->leading()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        if ($this->gamePoint()) {
            return 'Advantage: ' . $this->leading()->name;
        }

        return "{$this->playerOne->gameScore()}-{$this->playerTwo->gameScore()}";
    }

    protected function hasWinner(): bool
    {
        if (max([$this->playerOne->points, $this->playerTwo->points]) < 4) {
            return false;
        }

        return ( $this->playerOne->points >= $this->playerTwo->points + 2
            || $this->playerTwo->points >= $this->playerOne->points + 2
        );
    }

    protected function leading(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }

    protected function isDeuce(): bool
    {
        if ($this->gamePoint() && $this->playerOne->points == $this->playerTwo->points) {
            return true;
        }
        return false;
    }

    protected function gamePoint(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}