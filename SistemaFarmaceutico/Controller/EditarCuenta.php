
<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Asegúrate de encriptar la contraseña
    $tipo = $_POST['tipo'];

    // Actualizar usuario existente
    $sql = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, dni = :dni, direccion = :direccion, telefono = :telefono, correo = :correo, contrasena = :contrasena, tipo_usuario_id = :tipo WHERE id_usuario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':dni', $dni);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':tipo', $tipo);

    if ($stmt->execute()) {
        echo "Usuario actualizado correctamente.";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>