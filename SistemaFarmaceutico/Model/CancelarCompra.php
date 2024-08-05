<?php
// Incluir el archivo de conexión a la base de datos
include 'Conexion.php';

// Establecer la conexión a la base de datos
$conexion = new Conexion();
$conn = $conexion->pdo;

// Verificar si la conexión se realizó correctamente
if($conn) {
    try {
        // Desactivar restricciones de clave externa
        $conn->exec("SET FOREIGN_KEY_CHECKS = 0");

        // Ejecutar la consulta TRUNCATE para eliminar todos los datos de la tabla y reiniciar el contador de autoincremento
        $query = "TRUNCATE TABLE detalles_factura";
        $statement = $conn->prepare($query);
        $statement->execute();

        // Activar restricciones de clave externa nuevamente
        $conn->exec("SET FOREIGN_KEY_CHECKS = 1");

        // Devolver un mensaje de éxito
        echo "Compra cancelada con éxito";
    } catch(PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error al cancelar la compra: " . $e->getMessage();
    }
} else {
    echo "Error: No se pudo conectar a la base de datos";
}


?>