<?php

namespace App;

/**
 * This class generates the lyrics for 99 bottles of beer
 */
class Song
{
    public function verse(int $bottles)
    {
        if ($bottles == 2) {
            return "2 bottles of beer on the wall, 2 bottles of beer.\r\nTake one down and pass it around, 1 bottle of beer on the wall.";
        }
        if ($bottles == 1) {
            return "$bottles bottle of beer on the wall, $bottles bottle of beer.\r\nTake one down and pass it around, no more bottles of beer on the wall.";
        }

        if ($bottles == 0) {
            return "No more bottles of beer on the wall, no more bottles of beer.\r\nGo to the store and buy some more, 99 bottles of beer on the wall.";
        }

        return "$bottles bottles of beer on the wall, $bottles bottles of beer.\r\nTake one down and pass it around, ". $bottles-1 ." bottles of beer on the wall.";
    }

    public function sing()
    {
        return implode("\r\n\r\n",
            array_map(function ($verse) {
                return $this->verse($verse);
            }, range(99, 0))
        );
    }
}