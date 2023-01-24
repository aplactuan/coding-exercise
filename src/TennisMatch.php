<?php

namespace App;

class TennisMatch
{
    protected $playerOneScore;

    protected $playerTwoScore;

    public function score()
    {
        if ($this->hasWinner()) {
            return "Winner: " . $this->leading();
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leading();
        }

        return "{$this->convertPoint($this->playerOneScore)}-{$this->convertPoint($this->playerTwoScore)}";
    }

    public function pointPlayerOne()
    {
        $this->playerOneScore++;
    }

    public function pointPlayerTwo()
    {
        $this->playerTwoScore++;
    }

    protected function convertPoint($point)
    {
        switch ($point) {
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

    protected function hasWinner(): bool
    {
        if ($this->playerOneScore > 3 && $this->playerOneScore >= $this->playerTwoScore + 2) {
            return true;
        }

        if ($this->playerTwoScore > 3 && $this->playerTwoScore >= $this->playerOneScore + 2) {
            return true;
        }

        return false;
    }

    protected function leading(): string
    {
        return $this->playerOneScore > $this->playerTwoScore ? 'player 1' : 'player 2';
    }

    protected function isDeuce(): bool
    {
        if ($this->playerOneScore >= 3
            && $this->playerTwoScore >= 3
            && $this->playerOneScore == $this->playerTwoScore
        ) {
            return true;
        }
        return false;
    }

    protected function hasAdvantage(): bool
    {
        if ($this->playerOneScore >= 3
            && $this->playerTwoScore >= 3
        ) {
            return true;
        }

        return false;
    }
}