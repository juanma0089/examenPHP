<?php
namespace util;
 class CupoSuperadoException extends VideoclubException
 {
    public function __construct($message, $codigo = 0)
    {
        
        parent::__construct($message, $codigo);

    }
    
    public  function mensajeError()
    {
       return $this->message;
    }

 }


?>