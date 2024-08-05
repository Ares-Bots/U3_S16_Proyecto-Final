
<?php

include '../Model/Conexion.php';

$conexion = new Conexion();
$conn = $conexion->pdo;

$sql = "SELECT usuarios.nombre, usuarios.apellido, usuarios.dni, usuarios.direccion, usuarios.telefono, usuarios.correo, usuarios.contrasena, tipo_usuario.tipo
        FROM usuarios
        INNER JOIN tipo_usuario ON usuarios.tipo_usuario_id = tipo_usuario.id_tusuario";
$stmt = $conn->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios as $usuario) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($usuario['nombre']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['apellido']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['dni']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['direccion']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['telefono']) . "</td>";
    echo "<td>" . htmlspecialchars($usuario['correo']) . "</td>";
    echo "<td>*****</td>";  // Enmascarando la contraseña
    echo "<td>" . htmlspecialchars($usuario['tipo']) . "</td>";
    echo "</tr>";
}

?>