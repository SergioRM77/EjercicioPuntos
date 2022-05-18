<?php
namespace ITEC\DAW\puntos;

class Cuadrado extends Poligonos{

    private array $cuadrado;
    public function __construct(Puntos $puntos)
    {
        $this->cuadrado[] = $puntos;
    }
}
?>