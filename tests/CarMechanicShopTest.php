<?php


use App\CarService\CarMechanicShop;
use PHPUnit\Framework\TestCase;

class CarMechanicShopTest extends TestCase
{
    /** @test */
    public function it_computes_a_basic_inspection_service()
    {
         $service = new CarMechanicShop();

         $this->assertEquals(15, $service->total());
    }

    /** @test  */
    public function it_computes_basic_inspection_plus_wheel_alignment_service()
    {
        $service = new CarMechanicShop([
            'wheel_alignment'
        ]);

        $this->assertEquals(25, $service->total());
    }
}
