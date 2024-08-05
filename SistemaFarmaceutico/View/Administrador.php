
<?php
session_start();
if (!isset($_SESSION['tipo_usuario_id']) || $_SESSION['tipo_usuario_id'] != 1) {
    header('Location: ../Index.php');
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrador</title>

    <!--LLamo a los iconos fontawesome-->
    <script src="https://kit.fontawesome.com/bda99e063d.js" crossorigin="anonymous"></script>

    <!--Llama al framework boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.js"></script>
    
    <link rel="stylesheet" href="../CSS/Tabla.css">
    <link rel="stylesheet" href="../CSS/Administrador.css"> 

</head>

<body  class="bootstrap5">

    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuarios']?>">
    <?php include '../Includes/Navbar.php'; ?>

    <form>

        <!-- Content Wrapper. Contains page content -->
        <div>
            
            <br>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h3 class="camb">Bienvenido:</h3>
                        <h4><span id="nombre"></span> <span id="apellido"></span></h4>
                    </div>
                </div>
            </div>

        </div>

        <?php include '../Includes/Footer.php'; ?>
        
    </form>
    
    <!-- Custom JS -->
    <script src="../js/Usuario.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>