<?php 
namespace app;
// *comento los includes para poder hacer función de autoload.php
// include_once "Soporte.php";
include_once "autoload.php";
use app\Soporte;
class CintaVideo extends Soporte{

    private $duracion;

    public function __construct($titulo, $numero, $precio ,$duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;

    }

    public function muestraResumen()
    {
        //llamamos al muestra resumen del padre y lo sobreescribimos

        $string = "Duración: " . $this->duracion . "<br>";

       return parent::muestraResumen() . $string;
        
    }

}

?>
