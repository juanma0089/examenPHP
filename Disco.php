<?php
include_once "Soporte.php";

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
        parent::muestraResumen();
        echo "Idiomas: " . $this->idiomas . "<br>
            Formato de pantalla: " . $this->formatPantalla . "<br>";
    }
}
?>