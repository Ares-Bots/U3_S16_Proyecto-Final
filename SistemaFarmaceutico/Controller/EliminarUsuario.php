<?php
include '../Model/Conexion.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

$conexion = new Conexion();
$conn = $conexion->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Usuario borrado exitosamente";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
