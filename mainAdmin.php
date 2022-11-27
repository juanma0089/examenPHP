<?php
include_once "autoload.php";

use app\VideoClub;

session_start();
//* iniciamos sesión
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <script defer src="./js/bootstrap.bundle.js"></script>
    <script defer src="./js/custom.js"></script>
</head>

<body>
    <?php

    $userName = $_SESSION["userName"] ?? "";
    $socio = $_SESSION["socio"] ?? "";
    $soporte = $_SESSION["soporte"] ?? "";

    //*comprobamos que haya introducido los datos
    if ($userName == "admin") { ?>
        <div class="container text-center">
            <div class="alert alert-primary" role="alert">
                <strong>Bienvenido
                    <?php echo $userName ?>
                </strong>
            </div>
            <a href="./logout.php"><button class="btn btn-primary">cerrar sesion</button></a>
        
            <div class="d-flex gap-5 justify-content-center mt-5">
                <div class="list-group mx-0 w-auto">
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <caption></caption>
                        <tr class="border border-bottom-1 ">
                            <th colspan="100%">Clientes</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        //* recorrecos array de socios en el  mostramos el id y el nombre
                        echo "<tr class='table-primary'>";
                        foreach ($socio as $value) {

                            echo "<td>" . $value->getNumero() . "-" . $value->nombre . "</td>";

                        }
                        ?>
                        
                    </tbody>

                </table>
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-light">
                        <caption></caption>
                        <tr class="border border-bottom-1">
                            <th colspan="100%">Productos</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    //* recorrecos array de soporte en el  mostramos el resumen de todos sus datos
                            <?php 
                            foreach ($soporte as $value) {
                               
                                echo "<td bg-danger>";
    
                                $value->muestraResumen();
    
                                echo "</td>";
                            }
                            ?>
                       
                    </tbody>

                </table> 
                </div>
            </div>  
       
        </div>
    <?php } else { ?>
    <!-- Controlamos que haya iniciado sesión  -->
        <div class="container text-center">
            <div class="alert alert-primary text-center" role="alert">
                <strong>No has iniciado sesión</strong>
            </div>
            <a href="./index.php"><button class="btn btn-primary">Iniciar sesión</button></a>
        </div>
    <?php } ?>

</body>

</html>