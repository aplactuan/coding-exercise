<?php

namespace App;

class TennisMatch
{
    protected $playerOneScore;

    protected $playerTwoScore;

    public function score()
    {
        return "{$this->convertPoint($this->playerOneScore)}-{$this->convertPoint($this->playerTwoScore)}";
    }

    public function playerOnePoint()
    {
        $this->playerOneScore++;
    }

    public function playerTwoPoint()
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
}