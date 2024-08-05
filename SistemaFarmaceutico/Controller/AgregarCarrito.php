<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO detalles_factura (producto_id, cantidad, precio) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $producto_id);
    $stmt->bindValue(2, $cantidad);
    $stmt->bindValue(3, $precio);

    if ($stmt->execute()) {
        echo "Añadido a carrito correctamente";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

}

?>