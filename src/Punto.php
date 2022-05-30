<?php
namespace ITEC\DAW\PooPoligono;
/*
 * creamos una interfaz para indicar el mínimo de funciones que debe tener
 */

interface Punto{
    //al poner un array de valores para dimension esto puede ampliarse de 1,2,3... dimensiones y no se queja
    public function move(array $dimension);
    public function moveTo(array $dimension);
    public function moveToPoint(Punto $p);
    public function getPosition():array;
}
?>