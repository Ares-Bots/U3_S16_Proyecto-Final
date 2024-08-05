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
    <link rel="stylesheet" href="../CSS/FinalizarCompra.css">

</head>

<body>

    <!--<input id="id_usuario" type="text" value="<?php echo $_SESSION['usuarios']?>">
    Navbar -->
    <?php include '../Includes/Navbar.php'; ?>

    <!-- Contenido principal -->
    <div class="container" height="10%">
        <h1>Generar Factura</h1>
        <!-- Formulario para ingresar datos del cliente y detalles de la factura -->
        <form id="facturaForm" action="../Controller/RealizarCompra.php" method="POST">
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuarios']; ?>">
            <input type="hidden" id="id" name="id">
            <div class="card-body">
                <label for="nombre_cliente">Nombre: </label>
                <input class="formato" type="text" id="nombre_cliente" name="nombre_cliente" required><br>
                <label for="apellido_cliente">Apellido: </label>
                <input class="formato" type="text" id="apellido_cliente" name="apellido_cliente" required><br>
                <label for="dni_cliente">DNI: </label>
                <input class="formato" type="text" id="dni_cliente" name="dni_cliente" required><br><br>
            </div>
            
            <!-- Tabla para mostrar los productos agregados al carrito -->
            <div class="table-responsive">
                <table id="Factura" width="100%">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre de Producto</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se mostrarán los productos agregados al carrito -->
                    </tbody>
            </table>
            </div><br>

            <div class="card-body">
                <label for="subtotal" class="form-label">Subtotal: </label>
                <label id="subtotal_label" class="form-control" readonly></label>
                <input type="hidden" id="subtotal" name="subtotal">

                <label for="iva" class="form-label">Iva (15%): </label>
                <label id="iva_label" class="form-control" readonly></label>
                <input type="hidden" id="iva" name="iva">

                <label for="total" class="form-label">Total:</label>
                <label id="total_label" class="form-control" readonly></label>
                <input type="hidden" id="total" name="total">
            </div><br>

            <!-- Botones para cancelar la compra y realizar la compra -->
            <button type="button" id="cancelarCompraButton">Cancelar Compra</button>
            <button type="submit" id="realizarCompraButton">Realizar Compra</button><br>
            
        </form>
    </div>

    <!-- Custom JS -->
    <script src="../js/Compra.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>