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
            $match->pointPlayerOne();
        }

        for($i = 0;$i < $playerTwoPoints;$i++){
            $match->pointPlayerTwo();
        }

        $this->assertEquals($result, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 1, 'thirty-fifteen'],
            [4, 0, 'Winner: player 1'],
            [0, 4, 'Winner: player 2'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: player 1'],
            [3, 4, 'Advantage: player 2'],
            [5, 6, 'Advantage: player 2']
        ];
    }
}
