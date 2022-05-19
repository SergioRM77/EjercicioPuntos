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
    abstract public function validateNewPoint():bool;
    abstract public function getMaxPoint(): int;
    public function getNumPoints():int{
        return count($this->puntos);
    }
    abstract static public function create(array $puntos);
    protected function addPoint(Punto $p){
        if(!$this->validateNewPoint())
            throw new Exception("polígono no válido: Max puntos " . $this->getMaxPoint());
        $puntos[] = $p;
        $this->numPuntos++;
    }

}
?>