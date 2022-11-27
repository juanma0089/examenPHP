<?php

namespace app;

// *comento los includes para poder hacer función de autoload.php
// include_once "Disco.php";
// include_once "Juego.php";
// include_once "Cliente.php";
// include_once "CintaVideo.php";
include_once "autoload.php";

use app\Disco;
use app\Juego;
use app\Cliente;
use app\CintaVideo;
use util\ClienteNoEncontradoException;
use util\CupoSuperadoException;
use util\SoporteNoEncontradoException;
use util\SoporteYaAlquiladoException;

class VideoClub
{

    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto)
    {
        // al crear un producto lo incluimos en el array de productos
        array_push($this->productos, $producto);

        // echo "<br>Se ha introducido un nuevo producto<br>
        // Nombre: " . $producto->titulo . " ID: " . $this->numProductos . "<br>";


    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $cinta = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($cinta);
        $this->numProductos++;

    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {

        $disco = new Disco($titulo, $this->numProductos, $precio, $idiomas, $pantalla);
        $this->incluirProducto($disco);
        $this->numProductos++;

    }
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {

        $juego = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
        $this->numProductos++;
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        //al crear un nuevo cliente lo añadimos en el array de socios y mostramos datos
        $cliente = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);

        array_push($this->socios, $cliente);

        // echo "<br> Se ha creado un nuevo socio<br>
        // Nombre: " . $nombre . " con el número de socio " . $this->numSocios . "<br>";
        $this->numSocios++;

    }
    public function listarProductos()
    {

        foreach ($this->productos as $value) {
            $value->muestraResumen();
        }

    }
    public function listarSocios()
    {
        foreach ($this->socios as $value) {
            $value->muestraResumen();
        }

    }
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {

        try {
            //recorremos el array de socios 
            foreach ($this->socios as $value) {
                //comprobamos que el id del array es igual al del cliente que nos pasan para ver si existe 
                if ($value->getNumero() == $numeroCliente) {
                    // si se cumple la condición recorremos el array de productos
                    try {

                        foreach ($this->productos as $producto) {
                            // y comprobamos que el id coincida con el número que nos pasan
                            if ($producto->getNumero() == $numeroSoporte) {
                                //si se cumple condición lo pasamos a la función alquilar 
                                $value->alquilar($producto);

                                $this->numProductosAlquilados++;
                                $this->numTotalAlquileres++;
                                //*método encadenados
                                return $this;
                            }
                        }
                        //*capturamos el error
                    } catch (SoporteYaAlquiladoException $e) {
                        echo $e->mensajeError();
                    } catch (CupoSuperadoException $e) {
                        echo $e->mensajeError();
                    }
                }
            }
        } catch (ClienteNoEncontradoException $e) {
            echo $e->mensajeError();
        }
        //*método encadenados
        return $this;
    }

    public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
    {
        $libre = true;
        // comprobamos que los productos no esten todos alquilados

        try {
            foreach ($numerosProductos as $value) {
                // miramos que exista el producto comparandolo con el array de productos buscando su id

                foreach ($this->productos as $soporte) {

                    if ($soporte->getNumero() == $value) {
                        if ($soporte->alquilado) {
                            $libre = false;
                        }
                    }
                }

            }
            if ($libre) {
                foreach ($numerosProductos as $value) {
                    $this->alquilaSocioProducto($numSocio, $value);
                }
            } else {
                throw new SoporteYaAlquiladoException("<br>Ya ha sido alquilado<br>");
            }
        } catch (SoporteYaAlquiladoException $e) {
            echo $e->mensajeError();
        }
        return $this;
    }

    public function devolverSocioProducto(int $numSocio, int $numeroProducto)
    {

        try {
            //recorremos el array de socios 
            foreach ($this->socios as $value) {
                
                if ($value->getNumero() == $numSocio) {
                    // si se cumple la condición recorremos el array de productos
                    try {

                        foreach ($this->productos as $producto) {
                            // y comprobamos que el id coincida con el número que nos pasan
                            if ($producto->getNumero() == $numeroProducto) {

                                if ($value->tieneAlquilado($producto)) {
                                    $value->devolver($numeroProducto);
                                    $this->numProductosAlquilados--;
                                } else {
                                    throw new SoporteNoEncontradoException("No se ha alquilado el producto previamente que quiere devolver");
                                }
                                //*método encadenados
                                return $this;
                            }
                        }
                        //*capturamos el error
                    } catch (SoporteNoEncontradoException $e) {
                        echo $e->mensajeError();
                    }
                }
            }
        } catch (ClienteNoEncontradoException $e) {
            echo $e->mensajeError();
        }
        //*método encadenados
        return $this;


    }

    public function devolverSocioProductos(int $numSocio, array $numerosProductos)
    {
        $noAlquilado = false;
        try {

            foreach ($this->socios as $value) {
               if($numSocio == $value->getNumero()){
                $socioExiste =  $value;
               }
            }

            foreach ($numerosProductos as $value) {
                // miramos que exista el producto comparandolo con el array de productos buscando su id
                foreach ($this->productos as $soporte) {

                    if ($soporte->getNumero() == $value) {
                        if (!$socioExiste->tieneAlquilado($soporte)) {
                            $noAlquilado = true;
                        }
                    }
                }

            }
            if (!$noAlquilado) {
                foreach ($numerosProductos as $value) {
                    $this->devolverSocioProducto($numSocio, $value);
                }
            } else {
                throw new SoporteNoEncontradoException("<br>No ha alquilado alguno de los productos a devolver<br>");
            }
        } catch (SoporteNoEncontradoException $e) {
            echo $e->mensajeError();
        }
        return $this;


    }

    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }


    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

    /**
     * Get the value of productos
     */ 
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Get the value of socios
     */ 
    public function getSocios()
    {
        return $this->socios;
    }
}
?>