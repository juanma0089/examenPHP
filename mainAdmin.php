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


    //* iniciamos sesión 
    session_start();
    $userName = $_SESSION["userName"] ?? "";

    //*comprobamos que haya introducido los datos
    if ($userName == "admin") { ?>
    <div class="container text-center">
        <div class="alert alert-primary" role="alert">
            <strong>Bienvenido
            <?php echo $userName ?></strong>   
        </div>
       <a href="./logout.php"><button class="btn btn-primary" >cerrar sesion</button></a> 
    </div>
    <?php } else { ?>

    <div class="container text-center">
        <div class="alert alert-primary text-center" role="alert">
            <strong>No has iniciado sesión</strong>
        </div>
        <a href="./index.php"><button class="btn btn-primary" >Iniciar sesión</button></a> 
    </div>
    <?php } ?>

</body>

</html>