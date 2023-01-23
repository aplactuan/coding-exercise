<?php


use App\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    /**
     * @test
     * @dataProvider scores
     */
    public function it_scores_a_match($playerOnePoints, $playerTwoPoints, $result)
    {
        $match = new TennisMatch;

        for($i = 0;$i < $playerOnePoints;$i++){
            $match->playerOnePoint();
        }

        for($i = 0;$i < $playerTwoPoints;$i++){
            $match->playerTwoPoint();
        }

        $this->assertEquals($result, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 1, 'thirty-fifteen']
        ];
    }
}
