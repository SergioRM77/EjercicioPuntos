<?php
namespace ITEC\DAW\PooPoligono;

use Exception;
use ITEC\DAW\PooPoligono\Poligono;
class circulo extends Poligono{
    private const MaxPoints = 2;
    /**
     * crear un círculo con 2 puntos (radio)
     * @param $array array con 2 puntos de coordenadas
     */
    public function __construct(array $puntos){
        if(count($puntos) != circulo::MaxPoints)
        throw new Exception("No es un circulo");
        foreach ($puntos as $punto) {
            $this->addPoint($punto);
        }

    }
    public function getArea(): float{
        return pi() * ($this->puntos[0]->getDistancia($this->puntos[1]))**2;
    }
    public function validateNewPoint(): bool{
        return count($this->puntos) < circulo::MaxPoints;
    }
    public function getMaxPoint(): int{
        return count($this->puntos);
    }
    public static function create(array $puntos){
        return new circulo($puntos);
    }
    
}