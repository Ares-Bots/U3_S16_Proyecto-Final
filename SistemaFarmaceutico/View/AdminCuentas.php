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

</head>

<body class="bootstrap5">

    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuarios']?>">
    <?php include '../Includes/Navbar.php'; ?>

    <form>

        <div class="container-fluid card">

            <section class="card-body">
                <h1>Administrar Cuentas</h1>
                <button id="newButton" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#userModal">Nuevo</button>
                <button id="editButton" type="button" class="btn btn-warning">Editar</button>
                <button id="deleteButton" type="button" class="btn btn-danger">Borrar</button>
                <div class="table-responsive">
                    <table id="Cuentas" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Contraseña</th>
                                <th>Tipo de Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Content will be loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
                <div id="paginacion"></div>
            </section>

        </div>

        <?php include '../Includes/Footer.php'; ?>

    </form>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" required>
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de Usuario</label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <!-- Options -->
                            </select>
                        </div>
                        <button type="submit" id="saveUserButton" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="../js/Usuario.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>