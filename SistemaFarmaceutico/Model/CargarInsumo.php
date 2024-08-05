
<?php
include '../Model/Conexion.php';

$conn = new Conexion();
$pdo = $conn->pdo;

$sql = "SELECT * FROM productos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo "<tr data-id='".$row['id_producto']."'>
            <td>".$row['id_producto']."</td>
            <td>".$row['nombre_prod']."</td>
            <td>".$row['laboratorio']."</td>
            <td>".$row['presentacion']."</td>
            <td>".$row['concentracion']."</td>
            <td>".$row['tipo_producto']."</td>
            <td>".$row['dis_cantidad']."</td>
            <td>".$row['precio_unitario']."</td>
            <td>".$row['fecha_vencimiento']."</td>
        </tr>";
}
?>