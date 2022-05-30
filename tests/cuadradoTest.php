<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PooPoligono\Punto2D;
use ITEC\DAW\PooPoligono\cuadrado;

final class cuadradoTest extends TestCase{
    public function testcuadrado(){
        $arrayCuadrado[] = Punto2D::create(1,5);
        $arrayCuadrado[] = Punto2D::create(5,5);
        $arrayCuadrado[] = Punto2D::create(5,1);
        $arrayCuadrado[] = Punto2D::create(1,1);
        $punto5 = Punto2D::create(11,11);

        $cuadrado = cuadrado::create($arrayCuadrado);
        //cuadrado de 4*4
        $this->assertEquals(4*4, $cuadrado->getArea());
        $this->assertEquals(4, $cuadrado->getMaxPoint());
        $this->assertFalse($cuadrado->validateNewPoint($punto5));

    }
}
?>