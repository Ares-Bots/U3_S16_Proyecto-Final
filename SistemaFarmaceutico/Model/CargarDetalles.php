
<?php
include 'Conexion.php'; // Asegúrate de incluir tu archivo de conexión a la base de datos

$conexion = new Conexion();
$conn = $conexion->pdo;

// Verificar si la conexión se realizó correctamente
if ($conn) {
    $sql = $sql = "SELECT d.*, p.nombre_prod AS productos FROM detalles_factura d INNER JOIN productos p ON d.producto_id = p.id_producto";
    $result = $conn->query($sql);

    if ($result && $result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr data-id='{$row['id_detallefactura']}'>
                    <td>{$row['cantidad']}</td>
                    <td>{$row['productos']}</td>
                    <td>{$row['precio']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No hay productos en el carrito</td></tr>";
    }

    // Cerrar la conexión a la base de datos
    $conexion = null;
} else {
    echo "Error al conectar a la base de datos";
}
?>