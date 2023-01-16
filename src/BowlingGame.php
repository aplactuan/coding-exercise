<?php

namespace App;

class BowlingGame
{
    /**
     *
     */
    const FRAMES = 10;

    public array $rolls = [];

    /**
     * Player rolls the ball
     * @param int $score
     */
    public function roll(int $score)
    {
        $this->rolls[] = $score;
    }

    /**
     * Get the total score
     * @return int
     */
    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES) as $frame) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
                continue;
            }

            $score += $this->defaultScore($roll);

            if ($this->isSpare($roll)) {
                $score += $this->spareBonus($roll);
            }

            $roll += 2;
        }

        return $score;
    }

    /**
     * check if the roll is a strike
     * @param int $roll
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    /**
     * check if the frame is a spare
     * @param int $roll
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->defaultScore($roll) == 10;
    }

    /**
     * the score bonus when you have a strike
     * @param int $roll
     * @return int|mixed
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll+1) + $this->pinCount($roll+2);
    }

    /**
     * @param int $roll
     * @return mixed
     */
    protected function spareBonus(int $roll): mixed
    {
        return $this->pinCount($roll + 2);
    }

    /**
     * Count the score for the current frame
     * @param int $roll
     * @return mixed
     */
    protected function defaultScore(int $roll): mixed
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }


    /**
     * The number of pin knocked down on a roll
     * @param $roll
     */
    protected function pinCount($roll)
    {
        return $this->rolls[$roll];
    }
}