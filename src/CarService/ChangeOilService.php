<?php

namespace App\CarService;

class ChangeOilService implements CarService
{
    public function __construct(protected CarService $service)
    {

    }

    public function total(): int
    {
        return $this->service->total() + 10;
    }
}