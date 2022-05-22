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

    public static  function create(array $puntos){
        return new cuadrado($puntos);
    }

    /**
     * validar si es un cuadrado perfecto
     */
    private static function validate(array $puntos): bool{
        if(count($puntos) != cuadrado::MaxPoints) return false;
        if(!self::distanciaEntrePuntos($puntos)) return false;
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
            
            return ($lado1 == $lado2) && ($lado3 == $lado4) && 
            ($lado1 == $lado4);
    }

    public function validateNewPoint():bool{
        return count($this->puntos) < cuadrado::MaxPoints;
    }

    public function getArea(): float{
        if(cuadrado::validate($this->puntos)){
            $lado1 = $this->puntos[0]->getDistancia($this->puntos[1]);
            $lado2 = $this->puntos[1]->getDistancia($this->puntos[2]);
            return $lado1 * $lado2;
        }
        return 0;
    }
    public function getMaxPoint(): int{
        return count($this->puntos);
    }

    /**
     * comprobar orden de los puntos
     */
    public function isCorrectOrder(){
        
    }
}
?>