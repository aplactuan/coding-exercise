<?php

namespace App\CarService;

class CarMechanicShop
{
    /**
     * @var array|mixed
     */
    protected mixed $otherInspection;

    public function __construct($otherInspection = [])
    {
        $this->otherInspection = $otherInspection;
    }

    public function total(): int
    {
        return (new BaseInspection())->total();
    }
}