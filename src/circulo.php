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
    public function __construct(){
        $this->puntos = [];

    }

    public static function create(array $puntos){
        $cuadrado = new circulo($puntos);
        foreach ($puntos as $punto) {
            $cuadrado->addPoint($punto);
        }
        if(!self::validate($puntos))
            throw new Exception("No es un circulo");
        return $cuadrado;
    }
    private static function validate(array $puntos): bool{
        if(count($puntos) != circulo::MaxPoints) return false;
        return true;
    }
    public function getArea(): float{
        return pi() * ($this->puntos[0]->getDistancia($this->puntos[1]))**2;
    }
    
    public function getMaxPoint(): int{
        return count($this->puntos);
    }
    public function validateNewPoint(Punto $p): bool{
        if($this->getNumPoints()==0)return true;
        if($this->getNumPoints()==1)return true;
        if($this->getNumPoints()>=2)return false;
    }
    
}