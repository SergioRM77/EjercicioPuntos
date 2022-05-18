<?php

namespace ITEC\DAW\puntos;

class Puntos{
    private int $ejeX; 
    private int $ejeY;

    public function __construct(int $ejeX, int $ejeY)
    {
        $this->ejeX = $ejeX;
        $this->ejeY = $ejeY;
    }


    
    /**
     * mover ejeX y ejeY tantas veces como indiques
     */
    public function moverAbsolute(int $value){
        $this->ejeX += $value;
        $this->ejeY += $value;
    }

    /**
     * mover X veces ejeX y X veces ejeY
     * 
     */
    public function moverRelative(int $X, int $Y){
        $this->ejeX += $X;
        $this->ejeY += $Y;
    }

    public function copiarPunto(){
        return new Puntos($this->ejeX, $this->ejeY);
    }
}

?>