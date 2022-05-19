<?php
namespace ITEC\DAW\PooPoligono;
use ITEC\DAW\PooPoligono\Punto;
//implementamos la interfaz punto, nos obliga a tener esas funciones
class Punto2D implements Punto{

    private int $x;
    private int $y;

    public function __construct(int $x, int $y){
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(){
        return $this->x;
    }
    public function getY(){
        return $this->y;
    }

    /**
     * devuelve la posicion del punto en array
     * @return array
     */
    public function getPosition(): array{
        return [$this->x,$this->y];
    }

    /**
     * llama a crear nuevo punto
     * @return Punto2D
     */
    public static function create(int $x, int $y){
        return new Punto2D($x, $y);
    }

    /**
     * mueve la posicion del punto de manera relativa
     */
    public function move(array $dimension){//relativo
        $this->x += $dimension[0];
        $this->y += $dimension[1];
    }

    /**
     * mueve la posicion del punto de manera absoluta
     */
    public function moveTo(array $dimension){//absoluto
        $this->x = $dimension[0];
        $this->y = $dimension[1];
    }

    /**
     * mueve, o copia, la posicion de otro punto a este punto
     */
    public function moveToPoint(Punto $p){
        //los valores devueltos se guardan en un array de valores
        //que luego se pueden usar individualmente
        [$x,$y] = $p->getPosition();
        $this->moveTo($x,$y);
        //lo mismo que lo siguiente
        //$this->moveTo($p->getPosition());
    
    }

    /**
     * devuelve la distancia entre un punto y el ingresado
     */
    public function getDistancia(Punto $p):float{
        [$px, $py] = $p->getPosition();
        $x = $this->getX() - $px;
        $y = $this->getY() - $py;
        return sqrt($x**2 + $y**2);
    }

    public function isLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px;
    }
    public function isRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->y < $py;
    }

    public function isUpperLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x < $px && $this->y > $py;
    }
    public function isUpperRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px && $this->y > $py;
    }
    public function isBottomLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x < $px && $this->y < $py;
    }
    public function isBottomRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px && $this->y < $py;
    }
}
?>