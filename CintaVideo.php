<?php 
namespace app;

include_once "Soporte.php";
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
        parent::muestraResumen();
        echo "Duración: " . $this->duracion . "<br>";
    }

}

?>
