<?php
session_start();
include '../Model/Conexion.php'; // Asegúrate de que la ruta es correcta

// Crear una nueva instancia de conexión
$conexion = new Conexion();
$conn = $conexion->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_POST['id_usuario'];
    $nomb_cliente = $_POST['nombre_cliente'];
    $apell_cliente = $_POST['apellido_cliente'];
    $dni_cliente = $_POST['dni_cliente'];
    $vendedor_id = $_SESSION['usuarios'];
    $subtotal = $_POST['subtotal'];
    $iva = $_POST['iva'];
    $total = $_POST['total'];

    $sql = "INSERT INTO factura (nomb_cliente, apell_cliente, dni_cliente, vendedor_id, subtotal, iva, total) 
            VALUES (:nomb_cliente, :apell_cliente, :dni_cliente, :vendedor_id, :subtotal, :iva, :total)";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':nomb_cliente', $nomb_cliente);
    $stmt->bindParam(':apell_cliente', $apell_cliente);
    $stmt->bindParam(':dni_cliente', $dni_cliente);
    $stmt->bindParam(':vendedor_id', $vendedor_id);
    $stmt->bindParam(':subtotal', $subtotal);
    $stmt->bindParam(':iva', $iva);
    $stmt->bindParam(':total', $total);

    if ($stmt->execute()) {
        $id_factura = $conn->lastInsertId(); // Obtener el id_factura insertado
        header("Location: ../View/GenerarFactura.php?id_factura=$id_factura");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Invalid request method.";
}
?>