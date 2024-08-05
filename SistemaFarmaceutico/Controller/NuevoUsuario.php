<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Asegúrate de encriptar la contraseña
    $tipo = $_POST['tipo'];

    // Crear nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, apellido, dni, direccion, telefono, correo, contrasena, tipo_usuario_id) VALUES (:nombre, :apellido, :dni, :direccion, :telefono, :correo, :contrasena, :tipo)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':tipo', $tipo);

    if ($stmt->execute()) {
        echo "Usuario añadido correctamente.";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>