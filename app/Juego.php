<?php

namespace app;
// *comento los includes para poder hacer función de autoload.php
// include_once "Soporte.php";
include_once "autoload.php";

use  app\Soporte;
class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosibles()
    {
// compruebo si el mínimo y máximo es superior a 0 y el minimo es menor o igual al máximo
        if ($this->minNumJugadores > 0 && $this->maxNumJugadores > 0 && $this->minNumJugadores <= $this->maxNumJugadores) {

// si el minimo es igual al maximo
            if ($this->minNumJugadores == $this->maxNumJugadores) {

//  hago un ternario y digo que si es igual a 1 es para 1 jugador y sino para x jugadores
                return $this->minNumJugadores == 1 ? "Juego para un jugador" : "Juego para " . $this->getMinNumJugadores() . " jugadores";

            } else {

                return "Juego de " . $this->getMinNumJugadores() . " a " . $this->getMaxNumJugadores() . " jugadores";
            }
        }else{

            return "Error en el número de jugadores";
        }
    }

    public function muestraResumen()
    {
        $string = "Consola: " . $this->consola . "<br>" .
        $this->muestraJugadoresPosibles() . "<br>";
        //llamamos al muestra resumen del padre y lo sobreescribimos
       return parent::muestraResumen() . $string;

    }
}

?>
