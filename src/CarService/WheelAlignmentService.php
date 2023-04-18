<?php

namespace App\CarService;

class WheelAlignmentService implements CarService
{
    public function __construct(protected CarService $service)
    {

    }

    public function total(): int
    {
        return $this->service->total() + 20;
    }
}