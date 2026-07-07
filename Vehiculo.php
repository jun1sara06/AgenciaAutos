<?php
include("conexion.php");

$mensaje = "";

if(isset($_POST['eliminar'])){

    $numero = $_POST['numero_vehiculo'];

    $sql = "DELETE FROM vehiculos WHERE numero_vehiculo = '$numero'";

    if($conn->query($sql)){

        if($conn->affected_rows > 0){
            $mensaje = "Vehículo eliminado correctamente.";
        }else{
            $mensaje = "No existe un vehículo con ese número.";
        }

    }else{
        $mensaje = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dar de baja Vehículo</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        form{
            width: 300px;
        }

        input{
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
        }

        input[type="submit"]{
            background: red;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover{
            background: red;
        }

        .mensaje{
            margin-top:20px;
            font-weight:bold;
        }
    </style>
</head>

<body>

<h2>Dar de baja un vehículo</h2>

<form method="POST">

    Número del vehículo:
    <input type="number" name="numero_vehiculo" required>

    <input type="submit" name="eliminar" value="Eliminar Vehículo">

</form>

<?php
if($mensaje != ""){
    echo "<div class='mensaje'>$mensaje</div>";
}
?>

</body>
</html>