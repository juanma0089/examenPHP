<?php

// *comento los includes para poder hacer función de autoload.php
// include_once "Juego.php";
include_once "autoload.php";

use app\Juego;

$miJuego = new Juego("God of War: Ragnarök", 26, 49.99, "PS4", 1, 1); 
echo "<strong>" . $miJuego->titulo . "</strong>"; 
echo "<br>Precio: " . $miJuego->getPrecio() . " euros"; 
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
$miJuego->muestraResumen();
