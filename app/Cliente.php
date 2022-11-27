<?php
namespace app;

use util\CupoSuperadoException;
use util\SoporteNoEncontradoException;
use util\SoporteYaAlquiladoException;

class Cliente
{

    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNumSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    public function alquilar(Soporte $s)
    {
        //compruebo que no está alquilado y que el número de alquileres es menor al máximo (por defecto es 3)
        if ($this->tieneAlquilado($s) === false && $this->getNumSoportesAlquilados() < $this->maxAlquilerConcurrente) {
        //si todo se cumple sumo 1 al contador de alquiler 
            $this->numSoportesAlquilados++;
        //lo meto en el array de alquilados 
            array_push($this->soportesAlquilados, $s);
            //*variable del paso 9
            $s->alquilado = true;

            echo "<br>Ha alquilado " . $s->titulo."<br>";

            echo "Tiene " . $this->numSoportesAlquilados . " productos alquilados<br>";
                

        } else {
            // si el el producto ya está alquilado retorno false y no realizamos ninguna acción
            if($this->tieneAlquilado($s) == true){

                throw new SoporteYaAlquiladoException("<br>Ya tiene alquilado ". $s->titulo ." (mensaje dado desde una exception)<br>");
                //*lanzamos el codigo error si ya está alquilado (recogido en videoClub)
                
            }else{

                throw new CupoSuperadoException("<br>Ha superado el máximo de alquileres  (mensaje dado desde una exception)<br>");
                //*lanzamos el codigo error si ya ha superado el máximo de alquileres posibles (recogido en videoClub)

            }
            
        }
        //* añadimos $this para para dar soporte al encadenamiento de métodos
        return $this;
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        return in_array($s, $this->soportesAlquilados);
    }

    public function devolver(int $numSoporte): bool
    {

        $alquilado = $this->soportesAlquilados;

        foreach ($alquilado as $key => $value) {
    // si el número del producto es igual al que recibimos 
            if ($value->getNumero() == $numSoporte) {
    // lo eliminamos del array
                unset($this->soportesAlquilados[$key]);
    //y restamos del contador de alquilados 
                $this->numSoportesAlquilados--;

                echo "<br>Ha devuelto " . $value->titulo . "<br>";
                //*variable del paso 9
                $value->alquilado = false;

                return true;

            }
        }
        throw new SoporteNoEncontradoException("<br>No se puede devolver el producto, no lo tienes alquilado<br>");
        //*lanzamos el codigo error si no ha encontrado el producto en alquilado
    }

    public function listaAlquileres()
    {
        // Mostramos el número de productos alquilados
         $string = "Tiene " . $this->numSoportesAlquilados . " productos alquilados";
        //Recorremos el array de productos alquilados, pasando el valor a muestra resumen para hacer el toString de cada producto
        foreach ($this->soportesAlquilados as $value) {

            return $value->muestraResumen().$string;
        }
    }

    public function muestraResumen()
    {

        $string = "</br><strong>" . $this->nombre . "</strong><br> Número: " . $this->numero . "<br>";

           return $this->listaAlquileres() . $string;
    }
}

?>