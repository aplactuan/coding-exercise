<?php

use App\Song;
use PHPUnit\Framework\TestCase;

class SongTest extends TestCase
{
    public function test_it_get_the_verse_lyrics_for_99_bottles()
    {
        $expected = "99 bottles of beer on the wall, 99 bottles of beer.\r\nTake one down and pass it around, 98 bottles of beer on the wall.";

        $song = new Song();

        $this->assertEquals($expected, $song->verse(99));
    }

    public function test_it_get_the_verse_for_98_bottles()
    {
        $expected = "98 bottles of beer on the wall, 98 bottles of beer.\r\nTake one down and pass it around, 97 bottles of beer on the wall.";

        $song = new Song();

        $this->assertEquals($expected, $song->verse(98));
    }

    public function test_it_get_the_verse_for_2_bottles()
    {
        $expected = "2 bottles of beer on the wall, 2 bottles of beer.\r\nTake one down and pass it around, 1 bottle of beer on the wall.";

        $song = new Song();

        $this->assertEquals($expected, $song->verse(2));
    }

    public function test_it_get_the_verse_for_1_bottles()
    {
        $expected = "1 bottle of beer on the wall, 1 bottle of beer.\r\nTake one down and pass it around, no more bottles of beer on the wall.";

        $song = new Song();

        $this->assertEquals($expected, $song->verse(1));
    }

    public function test_it_get_the_verse_for_no_beer()
    {
        $expected = "No more bottles of beer on the wall, no more bottles of beer.\r\nGo to the store and buy some more, 99 bottles of beer on the wall.";

        $song = new Song();

        $this->assertEquals($expected, $song->verse(0));
    }
    public function test_it_gets_the_lyrics()
    {
        $expected = file_get_contents(__DIR__ . '/stubs/lyrics.stub');

        $result = (new Song)->sing();

        $this->assertEquals($expected, $result);
    }
}
