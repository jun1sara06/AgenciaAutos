<?php

include 'conexion.php';

$sql = "SELECT * FROM vehiculos ORDER BY numero_vehiculo ASC";
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
    <h1> Reporte de Vehículos</h1>
    <p>Generado: <?php  
    date_default_timezone_set('America/Merida');
    echo date('d/m/Y H:i'); ?></p>
    
    <a href="menu.php" class="btn"> Menú Principal</a>
    
    <table>
        <thead>
            <tr>
                <th>Número de Vehículo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['numero_vehiculo'] . "</td>";
                    echo "<td>" . $fila['marca'] . "</td>";
                    echo "<td>" . $fila['modelo'] . "</td>";
                    echo "<td>" . $fila['anio'] . "</td>";
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