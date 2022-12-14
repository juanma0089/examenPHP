<?php

namespace app;
// *comento los includes para poder hacer función de autoload.php
// include_once "Soporte.php";
include_once "autoload.php";
use app\Soporte;
class Disco extends Soporte
{
    public $idiomas;
    private $formatPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatPantalla = $formatPantalla;
    }

    public function muestraResumen()
    {

        $string = "Idiomas: " . $this->idiomas . "<br>
        Formato de pantalla: " . $this->getFormatPantalla() . "<br>";

        //llamamos al muestra resumen del padre y lo sobreescribimos
        return parent::muestraResumen() . $string;

    }
}
?>
