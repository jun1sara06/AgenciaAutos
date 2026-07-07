<?php
include("conexion.php");
include("Vehiculo.php");
 
$vehiculo = new Vehiculo($conn);
$mensaje = "";
 
if(isset($_POST['eliminar'])){
    $numero = $_POST['numero_vehiculo'];
    $eliminado = $vehiculo->eliminar($numero);
    $mensaje = $eliminado ? "Vehículo eliminado correctamente." : "No existe un vehículo con ese número.";
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
            background: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover{
            background: #b02a37;
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
<h2>Dar de baja un vehículo</h2>
<form method="POST">
    Número del vehículo:
    <input type="number" name="numero_vehiculo" required>
    <input type="submit" name="eliminar" value="Eliminar Vehículo">
</form>
<?php if($mensaje != ""): ?>
    <div class="mensaje"><?= htmlspecialchars($mensaje) ?></div>
<?php endif; ?>
<a href="menu.php" class="regresar">
    Volver al Menú Principal
</a>
</body>
</html>
