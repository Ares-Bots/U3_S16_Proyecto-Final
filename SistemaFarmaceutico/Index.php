
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/Login.css">

    <!--LLamo a los iconos fontawesome-->
    <script src="https://kit.fontawesome.com/bda99e063d.js" crossorigin="anonymous"></script>

    <!--Llama al framework boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<?php

session_start();

//Función de validacion del usuario
if(!empty($_SESSION['tipo_usuario_id'])){
    header('location: Controller/ControladorLogin.php');
}
else{

    session_destroy();

?>

<body class="login-page">

    <div class="login-box">

        <div class="login-logo" style="text-align: center;">
            <a href="index.php"><img src="Img/Logo.png" class="logo-img" style="opacity: .8; width: 50px;"></img></a>
        </div>

        <!-- Formulario Login -->
        <div class="card-body">

            <p class="login-box-msg text-center"><br><b>Sign in to start your session</b><br></p>
            
            <!-- Mensaje de Error del inicio de Sesion -->
            <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                Usuario o contraseña incorrectos
                <button type="button" class="btn-close" aria-label="Close" onclick="hideErrorMessage()"></button>
            </div>

            <form class="needs-validation" action="Controller/ControladorLogin.php" method="post" novalidate>
                    
                <!-- Inserte Cedula -->
                <div class="form-floating mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su usuario.
                        </div>
                    </div>
                </div>

                <!-- Inserte Contraseña -->
                <div class="form-floating mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su contraseña.
                        </div>
                    </div>
                    <label for="password"></label>
                </div>

                <!-- Boton Iniciar Sesión -->
                <div class="row mb-3">

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-sm">Iniciar Sesion</button>
                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

<script src="js/Login.js"></script>

</html>

<?php
}
?>