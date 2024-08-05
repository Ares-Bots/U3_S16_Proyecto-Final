
<?php

require '../Model/Conexion.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $tipo = $_POST['tipo'];

    try {
        $conexion = new Conexion();
        $pdo = $conexion->pdo;

        $sql = "UPDATE usuarios SET 
                nombre = :nombre, 
                apellido = :apellido, 
                dni = :dni, 
                direccion = :direccion, 
                telefono = :telefono, 
                correo = :correo WHERE id_usuario = :tipo_usuario_id";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':tipo_usuario_id', $id_usuario);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>