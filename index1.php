<?php

// include "Soporte.php";
// $soporte1 = new Soporte("Tenet", 22, 3); 
// echo "<strong>" . $soporte1->titulo . "</strong>"; 
// echo "<br>Precio: " . $soporte1->getPrecio() . " euros"; 
// echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
// $soporte1->muestraResumen();
// *comento los includes para poder hacer función de autoload.php
// include_once "CintaVideo.php";
include_once "autoload.php";

use app\CintaVideo;

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();
