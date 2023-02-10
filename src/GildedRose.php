<?php

namespace App;

class GildedRose
{
    protected static $item = [
        'normal' => 'App\Items\Item',
        'Aged Brie' => 'App\Items\BrieItem',
        'Sulfuras, Hand of Ragnaros' => 'App\Items\SulfuraItem',
        'Backstage passes to a TAFKAL80ETC concert' => 'App\Items\BackStagePassItem',
        'Conjured Mana Cake' => 'App\Items\ConjuredManaCakeItem'
    ];

    public static function of($name, $quality, $sellIn)
    {
        if (!array_key_exists($name, self::$item)) {
            throw new \InvalidArgumentException('Name not found');
        }

        return new self::$item[$name]($quality, $sellIn);
    }
}
