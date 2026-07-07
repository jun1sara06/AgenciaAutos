<?php

include 'conexion.php';

$sql = "SELECT * FROM vehiculos ORDER BY id_vehiculo ASC";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Vehículos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #2c3e50; color: white; padding: 10px; }
        td { padding: 8px; border-bottom: 1px solid #ddd; }
        tr:hover { background: #f5f5f5; }
        .btn { 
            display: inline-block; 
            padding: 10px 20px; 
            background: #3498db; 
            color: white; 
            text-decoration: none; 
            border-radius: 5px;
            margin: 10px 5px;
        }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <h1>📋 Reporte de Vehículos</h1>
    <p>Generado: <?php echo date('d/m/Y H:i'); ?></p>
    
    <a href="menu.php" class="btn">🏠 Menú Principal</a>
    <a href="consultar.php" class="btn"> Consultar</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Precio</th>
                <th>Color</th>
                <th>Kilometraje</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id_vehiculo'] . "</td>";
                    echo "<td>" . $fila['marca'] . "</td>";
                    echo "<td>" . $fila['modelo'] . "</td>";
                    echo "<td>" . $fila['anio'] . "</td>";
                    echo "<td>$" . number_format($fila['precio'], 2) . "</td>";
                    echo "<td>" . $fila['color'] . "</td>";
                    echo "<td>" . number_format($fila['kilometraje'], 0) . " km</td>";
                    echo "<td>" . $fila['estado'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay vehículos registrados</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>