
<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['id_producto'];

    $sql = "DELETE FROM productos WHERE id_producto = :id_producto";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Insumo médico eliminado exitosamente";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>