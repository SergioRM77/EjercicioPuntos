<?php

namespace ITEC\DAW\puntos;
abstract class ejes{
    abstract  function moverAbsolute(int $value);
    abstract  function moverRelative(int $X, int $Y);
}
class Puntos extends ejes{
    private int $ejeX; 
    private int $ejeY;
    private static int $rangoX;
    private static int $rangoY;

    public function __construct(int $ejeX, int $ejeY)
    {
        $ejeX > 10 || $ejeX < 0 ? $this->ejeX = 0 : $this->ejeX = $ejeX;
        $ejeY > 10 || $ejeY < 0 ? $this->ejeY = 0 : $this->ejeY = $ejeY;
        $this->rangoX = 10;
        $this->rangoY = 10;
    }



    private function is_Tope(int $value, int $movimiento){
        if($movimiento > 0){
            for ($i=0; $i < $movimiento; $i++) { 
                $value + 1 >= 10 ? $value = 0 : $value + 1;
            }
        }else{
            for ($i=0; $i > $movimiento; $i--) { 
                $value - 1 <= 0 ? $value = 10 : $value - 1;
            }
        }
        return $value;
        }
    
    /**
     * mover ejeX y ejeY tantas veces como indiques
     */
    public function moverAbsolute(int $value){
        $this->ejeX = Puntos::is_Tope($this->ejeX, $value);
        $this->ejeY = Puntos::is_Tope($this->ejeY, $value);
    }

    /**
     * mover X veces ejeX y X veces ejeY
     * 
     */
    public function moverRelative(int $X, int $Y){
        $this->ejeX = Puntos::is_Tope($this->ejeX, $X);
        $this->ejeY = Puntos::is_Tope($this->ejeY, $Y);
    }
}

?>