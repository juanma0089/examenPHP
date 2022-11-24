<?php 
//*creación de autoload ejercicio 7
function autoloader($className){

       $directorio = str_replace("\\","/", $className);

       include_once($directorio. ".php");

}

spl_autoload_register('autoloader');
    
?>