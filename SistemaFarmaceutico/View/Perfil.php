
<?php
session_start();
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
    <link rel="stylesheet" href="../CSS/Perfil.css"> 

</head>

<body  class="Contenedor">

    <?php include '../Includes/Navbar.php'; ?>

    <form class="wrapper">

    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuarios']?>">
    <input id="tipo_usuario_id" type="hidden" value="<?php echo $_SESSION['tipo_usuario_id']?>">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <br>

            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">

                        <section class="title">
                            <h2>Perfil:</h2>
                        </section>

                        <section class="data">
                            <ul class="list mb-3">
                                <li class="list-group-item">
                                    <label class="Formato" for="nombreLabel">Nombre: </label>
                                    <span id="nombre"></span>
                                    <input type="text" id="nombreInput" style="display: none;">
                                </li>
                                <li class="list-group-item">
                                    <label class="Formato" for="apellidoLabel">Apellido: </label>
                                    <span id="apellido"></span>
                                    <input type="text" id="apellidoInput" style="display: none;">
                                </li>
                                <li class="list-group-item">
                                    <label class="Formato" for="dniLabel">Cedula: </label>
                                    <span id="dni"></span>
                                    <input type="text" id="dniInput" style="display: none;">
                                </li>
                                    <label class="Formato" for="direccionLabel">Direccion: </label>
                                    <span id="direccion"></span>
                                    <input type="text" id="direccionInput" style="display: none;">
                                <li class="list-group-item">
                                    <label class="Formato" for="telefonoLabel">Telefono: </label>
                                    <span id="telefono"></span>
                                    <input type="text" id="telefonoInput" style="display: none;">
                                </li>
                                <li class="list-group-item">
                                    <label class="Formato" for="correoLabel">Correo: </label>
                                    <span id="correo"></span>
                                    <input type="text" id="correoInput" style="display: none;">
                                </li>
                                <li class="list-group-item">
                                    <label class="Formato" for="tipoLabel">Tipo de Usuario: </label>
                                    <span id="tipo"></span>
                                </li>
                            </ul>

                            
                            <button type="button" id="editButton"><span class="fa-solid fa-pen-to-square"></span></button>
                            <button id="saveButton" type="button" style="display: none;">Guardar</button>
                            
                        </section>


                    </div>
                </div>
            </div>

        </div>

        <?php include '../Includes/Footer.php'; ?>
        
    </form>
    
    <!-- Custom JS -->
    <script src="../js/Perfil.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>