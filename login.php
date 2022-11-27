<?php  


include_once "autoload.php";
include_once "index5.php";



$userName = $_POST['loginName']?? "";
$passwordUser = $_POST['loginPassword']?? "";

   //*comparamos que los datos introducidos coincidan con los requeridos
    if($userName === "usuario" && $passwordUser === "usuario") {
        //*iniciamos sesión
        session_start();
        //* guardamos en el array de session el nombre de usuario introducido
        $_SESSION["userName"] =  $userName; 
        //* te redirecciona....
        header("location:main.php");

    }elseif($userName === "admin" && $passwordUser === "admin"){
        //*iniciamos sesión
        session_start();
        //* guardamos en el array de session el nombre de usuario introducido
        $_SESSION["userName"] =  $userName;
        $_SESSION["socio"] = $vc->getSocios();
        $_SESSION["soporte"] = $vc->getProductos();
        //* te redirecciona....
        header("location:mainAdmin.php");

    }else{
        header("location:index.php?error=true");
    }
           
?>