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

</head>

<body class="bootstrap5">

    <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuarios']?>">
    <?php include '../Includes/Navbar.php'; ?>

    <form>

        <!-- Contenido principal -->
        <div class="container-fluid card">
            <section class="card-body">
                <h1>Venta de Productos</h1>
                <!-- Botón para añadir producto al carrito -->
                <button id="addToCartButton" type="button" class="btn btn-primary">Añadir al Carrito</button>
                <!-- Tabla para mostrar los productos disponibles -->
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

    <!-- Modal-->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Añadir a Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="userForm">
                        <input type="hidden" id="producto_id" name="producto_id">
                        <div class="mb-3">
                            <label for="selectedProductLabel" class="form-label">Producto Seleccionado:</label>
                            <label id="selectedProductLabel" class="form-control" readonly></label>
                        </div>
                        <div class="mb-3">
                            <label for="quantityInput" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="quantityInput" name="cantidad" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="totalValueLabel" class="form-label">Valor Total:</label>
                            <label id="totalValueLabel" class="form-control" readonly></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir al Carrito</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom JS -->
    <script src="../js/Venta.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>