<?php


use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    public function it_scores_a_gutter_game()
    {
        $bowlingGame =new BowlingGame();

        foreach (range(1, 20) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertSame(0, $bowlingGame->score());
    }

    /** @test */
    public function it_sums_the_score_when_there_is_no_strike_or_spare()
    {
        $bowlingGame = new BowlingGame();
        $score = 0;

        foreach (range(1, 20) as $roll) {
            $pinDown = rand(0, 4);
            $bowlingGame->roll($pinDown);
            $score += $pinDown;
        }

        $this->assertEquals($score, $bowlingGame->score());
    }

    /** @test */
    public function it_rewards_an_additional_score_when_it_is_a_spare()
    {
       $bowlingGame = new BowlingGame();

       $bowlingGame->roll(5);
       $bowlingGame->roll(5);

       $bowlingGame->roll(8);

       foreach (range(1, 17) as $roll) {
           $bowlingGame->roll(0);
       }

       $this->assertEquals(26, $bowlingGame->score());
    }

    /** @test */
    public function it_rewards_two_next_score_when_it_is_a_strike()
    {
        $bowlingGame = new BowlingGame();

        $bowlingGame->roll(10);
        $bowlingGame->roll(5);
        $bowlingGame->roll(2);

        foreach (range(1, 16) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertEquals(24, $bowlingGame->score());
    }

    /** @test */
    public function it_can_score_three_straight_strikes()
    {
        $bowlingGame = new BowlingGame();

        $bowlingGame->roll(10); //30
        $bowlingGame->roll(10); // 20
        $bowlingGame->roll(10); //10

        foreach (range(1, 14) as $roll) {
            $bowlingGame->roll(0);
        }

        $this->assertEquals(60, $bowlingGame->score());
    }

    /** @test */
    public function it_awards_an_extra_ball_for_spare_on_final_frame()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $bowlingGame->roll(0);
        }

        $bowlingGame->roll(8);
        $bowlingGame->roll(2);
        $bowlingGame->roll(10);
        $bowlingGame->roll(10);

        $this->assertEquals(20, $bowlingGame->score());
    }

    /** @test */
    public function it_awards_two_extra_ball_for_strike_on_final_frame()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 18) as $roll) {
            $bowlingGame->roll(0);
        }

        $bowlingGame->roll(10);
        $bowlingGame->roll(10);
        $bowlingGame->roll(10);

        $this->assertEquals(30, $bowlingGame->score());
    }

    /** @test */
    public function it_scores_a_perfect_game()
    {
        $bowlingGame = new BowlingGame();

        foreach (range(1, 12) as $roll) {
            $bowlingGame->roll(10);
        }

        $this->assertEquals(300, $bowlingGame->score());
    }
}
