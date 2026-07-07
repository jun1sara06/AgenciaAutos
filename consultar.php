<?php
include("conexion.php");
include("Vehiculo.php");
 
$vehiculo = new Vehiculo($conn);
$fila = null;
$buscado = false;
 
if(isset($_POST['buscar'])){
    $numero = $_POST['numero'];
    $fila = $vehiculo->consultar($numero);
    $buscado = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultar Vehículo</title>
</head>
<body>
<h2>Consultar Vehículo</h2>
<form method="POST">
    Número de Vehículo:
    <input type="number" name="numero" required>
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php if($buscado): ?>
    <?php if($fila): ?>
        <h3>Datos del Vehículo</h3>
        Número: <?= htmlspecialchars($fila['numero_vehiculo']) ?><br>
        Marca: <?= htmlspecialchars($fila['marca']) ?><br>
        Modelo: <?= htmlspecialchars($fila['modelo']) ?><br>
        Año: <?= htmlspecialchars($fila['anio']) ?><br>
        Estado: <?= htmlspecialchars($fila['estado']) ?><br>
    <?php else: ?>
        <p>Vehículo no encontrado.</p>
    <?php endif; ?>
<?php endif; ?>
</body>
</html>
 
