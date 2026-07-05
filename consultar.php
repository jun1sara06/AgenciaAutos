<?php
include("conexion.php");
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

<?php
if(isset($_POST['buscar'])){

    $numero = $_POST['numero'];

    $sql = "SELECT * FROM vehiculos WHERE numero_vehiculo = '$numero'";

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){

        $fila = $resultado->fetch_assoc();

        echo "<h3>Datos del Vehículo</h3>";
        echo "Número: " . $fila['numero_vehiculo'] . "<br>";
        echo "Marca: " . $fila['marca'] . "<br>";
        echo "Modelo: " . $fila['modelo'] . "<br>";
        echo "Año: " . $fila['anio'] . "<br>";
        echo "Estado: " . $fila['estado'] . "<br>";

    } else {
        echo "<p>Vehículo no encontrado.</p>";
    }
}
?>

</body>
</html>