<?php
namespace util;

use Exception;
class VideoclubException extends Exception
{

    public function __construct($message, $codigo = 0, Exception $previa = null)
    {
        
        parent::__construct($message, $codigo, $previa);

    }
    
    public  function mensajeError()
    {
       return $this->message;
    }
}
?>