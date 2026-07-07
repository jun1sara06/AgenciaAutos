<?php
include("conexion.php");
include("Vehiculo.php");
 
$vehiculo = new Vehiculo($conn);
$mensaje = "";
 
if(isset($_POST['guardar'])){
    $numero = trim($_POST['numero_vehiculo']);
    $marca  = trim($_POST['marca']);
    $modelo = trim($_POST['modelo']);
    $anio   = intval($_POST['anio']);
    $estado = $_POST['estado'];
 
    $resultado = $vehiculo->registrar($numero, $marca, $modelo, $anio, $estado);
    $mensaje = $resultado['mensaje'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Vehículo</title>
    <style>
body{
    font-family: Arial, sans-serif;
    margin: 30px;
}
form{
    width: 300px;
}
input, select{
    width: 100%;
    padding: 8px;
    margin: 5px 0 15px;
}
input[type="submit"]{
    background: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}
input[type="submit"]:hover{
    background: #0056b3;
}
.mensaje{
    margin-top:20px;
    font-weight:bold;
}
.regresar{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    color:#0078D7;
    font-weight:bold;
}
</style>
</head>
<body>
<h2>Registro de Vehículos</h2>
<form method="POST">
    Número Vehículo:
    <input type="number" name="numero_vehiculo" required><br><br>
    Marca:
    <input type="text" name="marca" required><br><br>
    Modelo:
    <input type="text" name="modelo" required><br><br>
    Año:
    <input type="number" name="anio" required><br><br>
    Estado:
    <select name="estado">
        <option>Disponible</option>
        <option>Rentado</option>
        <option>Taller</option>
    </select><br><br>
    <input type="submit" name="guardar" value="Guardar">
</form>
<?php if($mensaje != ""): ?>
    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
<?php endif; ?>
<a href="menu.php" class="regresar">
    Volver al Menú Principal
</a>
</body>
</html>
