<?php
namespace ITEC\DAW\PooPoligono;

use Exception;

abstract class Poligono{

    /**
     * $puntos contendrá los puntos que definen el polígono
     * @var array $puntos
     */
    protected array $puntos = [];
    
    /**
     * consigue el area de un polígono
     * @return float
     */
    abstract public function getArea() : float;

    /**
     * valida si ese polígono puede tener otro punto más
     */
    abstract public function validateNewPoint(Punto $p):bool;

    /**
     * número de puntos máximo de ese polígono
     */
    abstract public function getMaxPoint(): int;

    /**
     * cuántos puntos tienes actualmente
     */
    public function getNumPoints():int{
        return count($this->puntos);
    }

    /**
     * crear punto de manera estática
     */
    abstract static public function create(array $puntos);

    /**
     * añadir un punto a este polígono
     */
    protected function addPoint(Punto $p){
        if(!$this->validateNewPoint($p))
            throw new Exception("polígono no válido: Max puntos " . $this->getMaxPoint());
         return $this->puntos[] = $p;
    }

}
?>