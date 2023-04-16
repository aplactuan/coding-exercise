<?php

namespace App\CarService;

class BaseInspection implements CarService
{

    public function total(): int
    {
        return 15;
    }
}