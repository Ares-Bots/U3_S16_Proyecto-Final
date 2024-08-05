<?php
session_start();
include '../Model/Conexion.php'; // Asegúrate de que la ruta es correcta

if (!isset($_GET['id_factura'])) {
    echo "No factura ID provided.";
    exit();
}

$id_factura = $_GET['id_factura'];

// Crear una nueva instancia de conexión
$conexion = new Conexion();
$conn = $conexion->pdo;

$query = "SELECT f.*, u.nombre as vendedor_nombre, u.apellido as vendedor_apellido 
          FROM factura f 
          JOIN usuarios u ON f.vendedor_id = u.id_usuario 
          WHERE f.id_factura = :id_factura";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_factura', $id_factura, PDO::PARAM_INT);
$stmt->execute();
$factura = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$factura) {
    echo "No factura found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>

    <!--Llama al framework bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.js"></script>

    <link rel="stylesheet" href="../CSS/Factura.css"> <!-- Asegúrate de crear y estilizar este archivo CSS -->
</head>
<body>
    <div class="container">
        <header>
            <img src="../Img/Logo.png" alt="Logo">
            <h1>Factura</h1>
        </header>
        <main>
            <div class="info-row">
                <section class="cliente-info">
                    <h2>Cliente</h2>
                    <p>Nombre: <?php echo htmlspecialchars($factura['nomb_cliente']); ?></p>
                    <p>Apellido: <?php echo htmlspecialchars($factura['apell_cliente']); ?></p>
                    <p>DNI: <?php echo htmlspecialchars($factura['dni_cliente']); ?></p>
                </section>
                <section class="vendedor-info">
                    <h2>Vendedor</h2>
                    <p>Nombre: <?php echo htmlspecialchars($factura['vendedor_nombre']); ?></p>
                    <p>Apellido: <?php echo htmlspecialchars($factura['vendedor_apellido']); ?></p>
                </section>
            </div>
            <section class="factura-info">
                <h2>Detalles de la factura</h2>
                <table id="Factura" width="100%">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre de Producto</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- se llena por medio de Ajax-->
                    </tbody>
                </table>
            </section>
            <section class="totales">
                <p>Subtotal: <?php echo htmlspecialchars($factura['subtotal']); ?></p>
                <p>IVA: <?php echo htmlspecialchars($factura['iva']); ?></p>
                <p>Total: <?php echo htmlspecialchars($factura['subtotal'] + $factura['iva']); ?></p>
            </section>
        </main>
        <footer>
            <button onclick="window.location.href='FinalizarCompra.php'" class="no-print">Cancelar</button>
            <button onclick="imprimirYEliminar()" class="no-print">Imprimir</button>
        </footer>
    </div>

    <!-- Custom JS -->
    <script src="../js/Factura.js"></script>
    <script>
    function imprimirYEliminar() {
        $('.no-print').hide();
        window.print();
        $.ajax({
            url: '../Model/LimpiarFactura.php', // Cambia a la ruta correcta del archivo de eliminación
            method: 'POST',
            data: { id_factura: <?php echo $id_factura; ?> },
            success: function(data) {
                window.location.href = 'VentaProductos.php';
                $('.no-print').show();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    }
    </script>
</body>
</html>