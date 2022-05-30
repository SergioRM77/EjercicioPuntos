<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PooPoligono\Punto2D;
use ITEC\DAW\PooPoligono\circulo;

final class circuloTest extends TestCase{
    public function testcuadrado(){
        $puntocirculo[] = Punto2D::create(1,5);
        $puntocirculo[] = Punto2D::create(5,5);
        $circulo = circulo::create($puntocirculo);
        $punto3 = Punto2D::create(11,11);

        $this->assertEquals((pi() * 4**2), $circulo->getArea());
        $this->assertEquals(2, $circulo->getMaxPoint());
        $this->assertFalse($circulo->validateNewPoint($punto3));

    }
}
?>