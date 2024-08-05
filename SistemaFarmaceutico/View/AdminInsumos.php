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
                <h1>Administrar Insumos Medicos</h1>
                <button id="newButton" type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#userModal">Nuevo</button>
                <button id="editButton" type="button" class="btn btn-warning">Editar</button>
                <button id="deleteButton" type="button" class="btn btn-danger">Borrar</button>
                <div class="table-responsive">
                    <table id="Cuentas" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Laboratorio</th>
                                <th>Presentacion</th>
                                <th>Concentracion</th>
                                <th>Tipo</th>
                                <th>Cantidad Disponible</th>
                                <th>Precio Unitario</th>
                                <th>Fecha de Vencimiento</th>
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

    </form>

    <?php include '../Includes/Footer.php'; ?>

    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Nuevo Insumo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="id" name="id">
                        <div class="mb-3">
                            <label for="id_producto" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id_producto" name="id_producto" required>
                        </div>
                        <div class="mb-3">
                            <label for="nombre_prod" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="nombre_prod" name="nombre_prod" required>
                        </div>
                        <div class="mb-3">
                            <label for="laboratorio" class="form-label">Laboratorio</label>
                            <input type="text" class="form-control" id="laboratorio" name="laboratorio" required>
                        </div>
                        <div class="mb-3">
                            <label for="presentacion" class="form-label">Presentacion</label>
                            <input type="text" class="form-control" id="presentacion" name="presentacion" required>
                        </div>
                        <div class="mb-3">
                            <label for="concentracion" class="form-label">Concentracion</label>
                            <input type="text" class="form-control" id="concentracion" name="concentracion" required>
                        </div>
                        <div class="mb-3">
                            <label for="tipo_producto" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" required>
                        </div>
                        <div class="mb-3">
                            <label for="dis_cantidad" class="form-label">Cantidad Disponible</label>
                            <input type="text" class="form-control" id="dis_cantidad" name="dis_cantidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="precio_unitario" class="form-label">Precio Unitario</label>
                            <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="text" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                        </div>
                        <button type="submit" id="saveUserButton" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="../js/Insumo.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>