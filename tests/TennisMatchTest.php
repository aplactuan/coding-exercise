<?php


use App\Player;
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
        $match = new TennisMatch(
            $john = new Player('John'),
            $jane = new Player('Jane')
        );

        for($i = 0;$i < $playerOnePoints;$i++){
            $john->score();
        }

        for($i = 0;$i < $playerTwoPoints;$i++){
            $jane->score();
        }

        $this->assertEquals($result, $match->score());
    }

    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 1, 'thirty-fifteen'],
            [4, 0, 'Winner: John'],
            [0, 4, 'Winner: Jane'],
            [4, 2, 'Winner: John'],
            [2, 4, 'Winner: Jane'],
            [2, 2, 'thirty-thirty'],
            [3, 3, 'deuce'],
            [5, 5, 'deuce'],
            [4, 3, 'Advantage: John'],
            [3, 4, 'Advantage: Jane'],
            [5, 6, 'Advantage: Jane']
        ];
    }
}
