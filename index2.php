<?php

// *comento los includes para poder hacer función de autoload.php
// include_once "Disco.php";
include_once "autoload.php";

use app\Disco;

$miDisco = new Disco("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $miDisco->titulo . "</strong>";
echo "<br>Precio: " . $miDisco->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miDisco->getPrecioConIva() . " euros";
$miDisco->muestraResumen();
