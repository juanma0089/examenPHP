<?php 
//*creación de autoload ejercicio 7
function autoloader($className){

       include_once($className. ".php");

}

spl_autoload_register('autoloader');
    
?>