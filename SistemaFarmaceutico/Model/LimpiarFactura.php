<?php
// Incluir el archivo de conexión a la base de datos
include 'Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_factura'])) {
    $id_factura = $_POST['id_factura'];

    // Establecer la conexión a la base de datos
    $conexion = new Conexion();
    $conn = $conexion->pdo;

    // Verificar si la conexión se realizó correctamente
    if($conn) {
        try {
            // Desactivar restricciones de clave externa
            $conn->exec("SET FOREIGN_KEY_CHECKS = 0");

            // Eliminar los detalles de la factura
            $query = "TRUNCATE TABLE detalles_factura";
            $statement = $conn->prepare($query);
            $statement->execute();

            // Eliminar la factura
            $query = "TRUNCATE TABLE factura";
            $statement = $conn->prepare($query);
            $statement->execute();

            // Activar restricciones de clave externa nuevamente
            $conn->exec("SET FOREIGN_KEY_CHECKS = 1");

            // Devolver un mensaje de éxito
            echo "Factura y detalles eliminados exitosamente.";
        } catch(PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error al eliminar la factura: " . $e->getMessage();
        }
    } else {
        echo "Error: No se pudo conectar a la base de datos";
    }
} else {
    echo "Solicitud no válida.";
}
?>