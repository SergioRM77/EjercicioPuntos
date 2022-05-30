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
     * mueve la posicion del punto de manera relativa [X, Y]
     */
    public function move(array $dimension){//relativo
        $this->x += $dimension[0];
        $this->y += $dimension[1];
        return $this;
    }

    /**
     * mueve la posicion del punto de manera absoluta [X, Y]
     */
    public function moveTo(array $dimension){//absoluto
        $this->x = $dimension[0];
        $this->y = $dimension[1];
        return $this;
    }

    /**
     * mueve, o copia, la posicion de otro punto a este punto
     */
    public function moveToPoint(Punto $p){
        //los valores devueltos se guardan en un array de valores
        //que luego se pueden usar individualmente
        [$x,$y] = $p->getPosition();
        $this->moveTo([$x,$y]);
        //lo mismo que lo siguiente
        //$this->moveTo($p->getPosition());
        return $this;
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

    /**
     * comprueba si un punto $p está encima de este punto
     * @param Punto $p
     * @return bool
     */
    public function isUpper(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x == $px  && $this->y > $py;
    }

    /**
     * comprueba si un punto $p está debajo de este punto
     * @param Punto $p
     * @return bool
     */
    public function isUnder(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x == $px  && $this->y < $py;
    }

    /**
     * comprueba tu posicion respecto a un punto izquierda
     * @param Punto $p
     * @return bool
     */
    public function isLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x < $px && $this->y == $py;
    }
    /**
     * comprueba tu posicion respecto a un punto derecha
     * @param Punto $p
     * @return bool
     */
    public function isRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px && $this->y == $py;
    }

    /**
     * comprueba tu posicion respecto a un punto arriba-izquierda
     * @param Punto $p
     * @return bool
     */
    public function isUpperLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px && $this->y < $py;
        
    }

    /**
     * comprueba tu posicion respecto a un punto arriba-derecha
     * @param Punto $p
     * @return bool
     */
    public function isUpperRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x < $px && $this->y < $py;
        
    }

    /**
     * comprueba tu posicion respecto a un punto abajo-izquierda
     * @param Punto $p
     * @return bool
     */
    public function isUnderLeft(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x > $px && $this->y > $py;
    }

    /**
     * comprueba tu posicion respecto a un punto abajo-derecha
     * @param Punto $p
     * @return bool
     */
    public function isUnderRight(Punto $p){
        [$px, $py] = $p->getPosition();
        return $this->x < $px && $this->y > $py;
    }
}
?>