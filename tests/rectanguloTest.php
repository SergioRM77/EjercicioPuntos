<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PooPoligono\Punto2D;
use ITEC\DAW\PooPoligono\rectangulo;

final class rectanguloTest extends TestCase{
    public function testcuadrado(){
        $puntoRectangulo[] = Punto2D::create(1,5);
        $puntoRectangulo[] = Punto2D::create(7,5);
        $puntoRectangulo[] = Punto2D::create(7,1);
        $puntoRectangulo[] = Punto2D::create(1,1);
        $punto5 = Punto2D::create(11,11);

        $rectangulo = rectangulo::create($puntoRectangulo);
        //rectangulo de 4*6
        $this->assertEquals(4*6, $rectangulo->getArea());
        $this->assertEquals(4, $rectangulo->getMaxPoint());
        $this->assertFalse($rectangulo->validateNewPoint($punto5));

    }
}
?>