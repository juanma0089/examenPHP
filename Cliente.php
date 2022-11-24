<?php
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

    public function alquilar(Soporte $s): bool
    {
        //compruebo que no está alquilado y que el número de alquileres es menor al máximo (por defecto es 3)
        if ($this->tieneAlquilado($s) === false && $this->getNumSoportesAlquilados() < $this->maxAlquilerConcurrente) {
        //si todo se cumple sumo 1 al contador de alquiler 
            $this->numSoportesAlquilados++;
        //lo meto en el array de alquilados 
            array_push($this->soportesAlquilados, $s);

            echo "<br>Has alquilado " . $s->titulo;

            echo "<br>Tienes " . $this->numSoportesAlquilados . " productos alquilados<br>";

            return true;

        } else {
            // si el el producto ya está alquilado retorno false y no realizamos ninguna acción
            if($this->tieneAlquilado($s) == true){

                echo  "<br>Ya tienes alquilado ". $s->titulo ."<br>";
                
            }else{

                echo  "<br>Has superado el máximo de alquileres<br>";

            }
            
            return false;
        }
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

                echo "<br>Has devuelto " . $value->titulo . "<br>";

                return true;

            }
        }

        echo "<br>No se puede devolver el producto, no lo tienes alquilado<br>";

        return false;
    }

    public function listaAlquileres()
    {
        // Mostramos el número de productos alquilados
        echo "<br>Tienes " . $this->numSoportesAlquilados . " productos alquilados";
        //Recorremos el array de productos alquilados, pasando el valor a muestra resumen para hacer el toString de cada producto
        foreach ($this->soportesAlquilados as $value) {

            $value->muestraResumen();
        }
    }

    public function muestraResumen()
    {

        echo "</br><strong>" . $this->nombre . "</strong><br>
            Número: " . $this->numero . "<br>";

            $this->listaAlquileres();
    }
}

?>