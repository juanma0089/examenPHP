<?php
abstract class Soporte
{

    //*Al hacer la clase abstracta no podemos crear objetos de esta clase, pero si hacer uso de ella mediante sus hijos, en index1 tengo que dejar comentado la primera parte
    //*ya que nos crea un objeto de clase Soporte y no funciona 

    public $titulo;
    protected $numero;
    private $precio;

    //php internamente a la constante privada ya la trata como static así que no hace falta ponerlo
    private const IVA = 0.21;

    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPrecioConIva()
    {
        return $this->precio + ($this->precio * self::IVA);
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function muestraResumen()
    {
        echo "</br><strong>" . $this->titulo . "</strong><br>
            Número: " . $this->numero . "<br>
            Precio: " . $this->precio . " €<br>
            Precio IVA incluido: " . $this->getPrecioConIva() . " €<br>";
    }
}
?>