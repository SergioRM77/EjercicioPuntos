<?php
namespace ITEC\DAW\PooPoligono;

use Exception;
use ITEC\DAW\PooPoligono\Poligono;

class rectangulo extends Poligono{
    private const MaxPoints = 4;
    /**
     * new rectangulo [p1,p2,p3,p4]
     * Los puntos deben venir dados Izquierda Arriba, Derecha Arriba, Derecha Abajo, Izquierda Debajo
     */
    public function __construct(){
        $this->puntos = [];
    }

    public static function create(array $puntos){
        $cuadrado = new cuadrado($puntos);
        foreach ($puntos as $punto) {
            $cuadrado->addPoint($punto);
        }
        if(!self::validate($puntos))
            throw new Exception("No es un rectangulo");
        return $cuadrado;
    }

    /**
     * validar si es un rectangulo perfecto
     */
    private static function validate(array $puntos): bool{
        if(count($puntos) != rectangulo::MaxPoints) return false;
        if(!self::distanciaEntrePuntos($puntos)) return false;
        if(!self::validarPosicionesRelativas($puntos)) return false;
        return true;
    }

    /**
     * comprueba si la distancia entre puntos es la misma
     */
    private static function distanciaEntrePuntos($puntos): bool{
        
            $lado1 = $puntos[0]->getDistancia($puntos[1]);
            $lado2 = $puntos[1]->getDistancia($puntos[2]);
            $lado3 = $puntos[2]->getDistancia($puntos[3]);
            $lado4 = $puntos[3]->getDistancia($puntos[0]);
            
            return ($lado1 == $lado3) && ($lado2 == $lado4) && 
            ($lado1 != $lado2);
    }

    

    public function getArea(): float{
            $lado1 = $this->puntos[0]->getDistancia($this->puntos[1]);
            $lado2 = $this->puntos[1]->getDistancia($this->puntos[2]);
            return $lado1 * $lado2;
    }

    public function getMaxPoint(): int{
        return rectangulo::MaxPoints;
    }
    public static function validarPosicionesRelativas(array $puntos):bool{
        return (
        $puntos[0]->isLeft( $puntos[1]) &&
        $puntos[1]->isUpper( $puntos[2]) &&
        $puntos[2]->isRight( $puntos[3]) &&
        $puntos[3]->isUnder( $puntos[0]) 
        );
    }

    public function validateNewPoint(Punto $p):bool{
        //si es 0 cualquier punto vale
        if($this->getNumPoints()==0) return true;
        //si hay 1, este debe quedar a la izquierda del punto 2
        elseif($this->getNumPoints()==1)
            return $this->puntos[0]->isLeft($p);
        //si hay 2,este debe quedar encima del punto 3
        elseif($this->getNumPoints()==2)
            return $this->puntos[1]->isUpper($p);
        //si hay 3, este debe quedar a la derecha del numero 4 y el 4 debajo del punto 1
        elseif($this->getNumPoints()==3)
            return $this->puntos[2]->isRight($p) && $this->puntos[0]->isUnder($p);
    }


}
?>