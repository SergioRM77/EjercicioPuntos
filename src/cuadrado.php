<?php
namespace ITEC\DAW\PooPoligono;

use Exception;
use ITEC\DAW\PooPoligono\Poligono;

class cuadrado extends Poligono{
    private const MaxPoints = 4;
    /**
     * new cuadrado [p1,p2,p3,4]
     * Los puntos deben venir dados Izquierda Arriba, Derecha Arriba, Izquierda Abajo, Derecha Debajo
     */
    public function __construct(array $puntos){
        if(!self::validate($puntos))
        throw new Exception("No es un cuadrado");
        foreach ($puntos as $punto) {
            $this->addPoint($punto);
        }
    }
    private static function validate(array $puntos): bool{
        if(count($puntos) != cuadrado::MaxPoints) return false;
        if(!self::distanciaEntrePuntos($puntos)) return false;
        return true;
    }

    private static function distanciaEntrePuntos($puntos){
        
            $lado1 = $puntos[0]->getDistance($puntos[1]);
            $lado2 = $puntos[1]->getDistance($puntos[2]);
            $lado3 = $puntos[2]->getDistance($puntos[3]);
            $lado4 = $puntos[3]->getDistance($puntos[0]);
            
            return ($lado1 == $lado2) && ($lado3 == $lado4) && 
            ($lado1 == $lado4);
    }
    public function validateNewPoint():bool{
        
    }
    public function getArea(): float{
        
    }
    public function getMaxPoint(): int{
        
    }
}
?>