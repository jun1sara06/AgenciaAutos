<?php
include("conexion.php");

if(isset($_POST['guardar'])){

    $numero = $_POST['numero_vehiculo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = $_POST['anio'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO vehiculos
            (numero_vehiculo, marca, modelo, anio, estado)
            VALUES
            ('$numero','$marca','$modelo','$anio','$estado')";

    if($conn->query($sql)){
        echo "Vehículo registrado correctamente";
    }else{
        echo "Error: " . $conn->error;
    }
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

</body>
</html>