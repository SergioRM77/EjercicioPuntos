<?php
use PHPUnit\Framework\TestCase;
use ITEC\DAW\PooPoligono\Punto2D;
use phpDocumentor\Reflection\Types\This;

final class Punto2DTest extends TestCase{
    public function testPunto2D(){
        $punto1 = Punto2D::create(2,6);
        $punto2 = Punto2D::create(1,5);
        $punto3 = Punto2D::create(7,3);
        $punto4 = Punto2D::create(5,5);
        $puntoMoveRelative = Punto2D::create(8,3);
        $arrayposicion = [3,-2];

        $this->assertEquals(2, $punto1->getX());
        $this->assertEquals(5, $punto2->getY());
        $this->assertEquals([7,3], $punto3->getPosition());
        $this->assertEquals(4, $punto2->getDistancia($punto4));
        $this->assertEquals($puntoMoveRelative, $punto4->move($arrayposicion));
        $this->assertEquals($puntoMoveRelative, $punto1->moveTo([8,3]));
        $this->assertEquals($punto3, $punto1->moveToPoint($punto3));


        }

        public function testPunto2D2(){
            $arrayCuadrado[] = Punto2D::create(1,5);
            $arrayCuadrado[] = Punto2D::create(5,5);
            $arrayCuadrado[] = Punto2D::create(5,1);
            $arrayCuadrado[] = Punto2D::create(1,1);

            $this->assertTrue($arrayCuadrado[0]->isLeft($arrayCuadrado[1]));
            $this->assertTrue($arrayCuadrado[1]->isUpper($arrayCuadrado[2]));
            $this->assertTrue($arrayCuadrado[2]->isRight($arrayCuadrado[3]));
            $this->assertTrue($arrayCuadrado[3]->isUnder($arrayCuadrado[0]));

            $centro[] = Punto2D::create(3,3);
            $inferiorIzquierda[] = Punto2D::create(1,1);
            $superiorIzquierda[] = Punto2D::create(1,6);
            $inferiorDerecha[] = Punto2D::create(6,1);
            $superiorDerecha[] = Punto2D::create(6,6);
            $this->assertTrue($centro[0]->isUpperLeft($superiorIzquierda[0]));
            $this->assertTrue($centro[0]->isUnderLeft($inferiorIzquierda[0]));
            $this->assertTrue($centro[0]->isUpperRight($superiorDerecha[0]));
            $this->assertTrue($centro[0]->isUnderRight($inferiorDerecha[0]));

        }
    
}
?>