<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/custom.css" rel="stylesheet">
    <script defer src="./js/bootstrap.bundle.js"></script>
    <script defer src="./js/custom.js"></script>
</head>
<body>
    <div class="container">

        <div class="tab-content">
            <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="tab-login">
                <form action="login.php"  method="POST">

                <p class="text-center">Login</p>

                <!-- userName input -->
                <div class="form-outline mb-4">
                    <input type="text" name="loginName" class="form-control" required/>
                    <label class="form-label" for="loginName">username</label>
                </div>

                <!-- Password input -->
                <div class="form-outline ">
                    <input type="password" name="loginPassword" class="form-control" required/>
                    <label class="form-label" for="loginPassword">Password</label>
                </div>

                <div class="text-danger mb-2">
                    <span>
                    <?php 
                    if(isset($_GET["error"]) && $_GET["error"] == "true"){
                        echo "Usuario o contraseña incorrecta";
                    }
                    ?>
                    </span>
                </div>
                <!-- Submit button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block mb-4">entrar</button>  
                </div>
                
        
                </form>
            
            </div>
            
        </div>

    </div>
    
</body>
</html>