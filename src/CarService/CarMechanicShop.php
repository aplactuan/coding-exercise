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
        $service = new BaseInspection();

        foreach ($this->otherInspection as $inspection) {
            $service = match ($inspection) {
                'wheel_alignment' => new WheelAlignmentService($service),
                'change_oil' => new ChangeOilService($service)
            };
        }

        return $service->total();
    }
}