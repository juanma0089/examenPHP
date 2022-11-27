<?php
//*para el logout borramos todo de la sesión y la destruimos
session_start();
unset($_SESSION);
session_destroy();
header("location:index.php");
//* redireccionamos al index
?>
