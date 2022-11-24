<?php 
//*creación de autoload ejercicio 7
function autoloader($className){

    $fileName = str_replace("app","",$className);
    $fileName = str_replace("\\","",$fileName);

       include_once($fileName . ".php");

}

spl_autoload_register('autoloader');
    
?>