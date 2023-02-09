<?php

namespace App;

use App\Items\BackStagePassItem;
use App\Items\BrieItem;
use App\Items\Item;
use App\Items\SulfuraItem;

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        //return new static($name, $quality, $sellIn);
        switch ($name) {
            case 'normal':
                return new Item($quality, $sellIn);

            case 'Aged Brie':
                return new BrieItem($quality, $sellIn);

            case 'Sulfuras, Hand of Ragnaros':
                return new SulfuraItem($quality, $sellIn);

            case 'Backstage passes to a TAFKAL80ETC concert':
                return  new BackStagePassItem($quality, $sellIn);
        }
    }
}
