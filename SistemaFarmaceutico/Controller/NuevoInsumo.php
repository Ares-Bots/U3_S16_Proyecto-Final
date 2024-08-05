
<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_producto = $_POST['id_producto'];
    $nombre_prod = $_POST['nombre_prod'];
    $laboratorio = $_POST['laboratorio'];
    $presentacion = $_POST['presentacion'];
    $concentracion = $_POST['concentracion'];
    $tipo_producto = $_POST['tipo_producto'];
    $dis_cantidad = $_POST['dis_cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    $sql = "INSERT INTO productos (id_producto, nombre_prod, laboratorio, presentacion, concentracion, tipo_producto, dis_cantidad, precio_unitario, fecha_vencimiento) VALUES (:id_producto, :nombre_prod, :laboratorio, :presentacion, :concentracion, :tipo_producto, :dis_cantidad, :precio_unitario, :fecha_vencimiento)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id_producto', $id_producto);
    $stmt->bindParam(':nombre_prod', $nombre_prod);
    $stmt->bindParam(':laboratorio', $laboratorio);
    $stmt->bindParam(':presentacion', $presentacion);
    $stmt->bindParam(':concentracion', $concentracion);
    $stmt->bindParam(':tipo_producto', $tipo_producto);
    $stmt->bindParam(':dis_cantidad', $dis_cantidad);
    $stmt->bindParam(':precio_unitario', $precio_unitario);
    $stmt->bindParam(':fecha_vencimiento', $fecha_vencimiento);

    if ($stmt->execute()) {
        echo "Insumo médico añadido exitosamente";
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>