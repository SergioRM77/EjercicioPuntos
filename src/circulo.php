<?php
namespace ITEC\DAW\PooPoligono;
use Exception;
use ITEC\DAW\PooPoligono\Poligono;
use ITEC\DAW\PooPoligono\Punto;

class circulo extends Poligono{
    private const MaxPoints = 2;
    /**
     * crear un círculo con 2 puntos (radio)
     * @param $array array con 2 puntos de coordenadas
     */
    public function __construct(){
        $this->puntos = [];

    }

    public static function create(array $puntos){
        $circulo = new circulo($puntos);
        foreach ($puntos as $punto) {
            $circulo->addPoint($punto);
        }
        if(!self::validate($puntos))
            throw new Exception("No es un circulo");
        return $circulo;
    }
    private static function validate(array $puntos): bool{
        return (count($puntos) == circulo::MaxPoints);
    }
    public function getArea(): float{
        return pi() * ($this->puntos[0]->getDistancia($this->puntos[1]))**2;
    }
    
    public function getMaxPoint(): int{
        return count($this->puntos);
    }
    public function validateNewPoint(Punto $p): bool{
        return $this->getNumPoints()<=2;
    }
    
}
?>