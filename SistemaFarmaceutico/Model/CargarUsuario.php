<?php
include 'Conexion.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

$conexion = new Conexion();
$conn = $conexion->pdo;

// Verificar si la conexión se realizó correctamente
if ($conn) {
    $sql = $sql = "SELECT u.*, t.tipo AS tipo_usuario FROM usuarios u INNER JOIN tipo_usuario t ON u.tipo_usuario_id = t.id_tusuario";
    $result = $conn->query($sql);

    if ($result && $result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-id='{$row['id_usuario']}'>
                    <td>{$row['nombre']}</td>
                    <td>{$row['apellido']}</td>
                    <td>{$row['dni']}</td>
                    <td>{$row['direccion']}</td>
                    <td>{$row['telefono']}</td>
                    <td>{$row['correo']}</td>
                    <td>*****</td>
                    <td>{$row['tipo_usuario']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No hay usuarios registrados</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;
} else {
    echo "Error al conectar a la base de datos";
}
?>
