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
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultar Vehículo</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .contenedor{
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 15px rgba(0,0,0,0.2);
            width:500px;
        }

        h2{
            text-align:center;
            color:#333;
        }

        input[type="number"]{
            width:100%;
            padding:10px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        input[type="submit"]{
            width:100%;
            background:#0078D7;
            color:white;
            border:none;
            padding:12px;
            border-radius:5px;
            cursor:pointer;
        }

        input[type="submit"]:hover{
            background:#005ea6;
        }

        table{
            width:100%;
            margin-top:20px;
            border-collapse:collapse;
        }

        table th{
            background:#0078D7;
            color:white;
            padding:10px;
        }

        table td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }

        .error{
            background:#ffdddd;
            color:#b30000;
            padding:10px;
            border-radius:5px;
            margin-top:20px;
            text-align:center;
        }

        .regresar{
            display:block;
            text-align:center;
            margin-top:20px;
            text-decoration:none;
            color:#0078D7;
            font-weight:bold;
        }
    </style>
</head>
<body>

<div class="contenedor">

    <h2> Consultar Vehículo</h2>

    <form method="POST">
        <label>Número de Vehículo:</label>
        <input type="number" name="numero" required>
        <input type="submit" name="buscar" value="Buscar">
    </form>

    <?php if($buscado): ?>

        <?php if($fila): ?>

            <table>
                <tr>
                    <th>Número</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Estado</th>
                </tr>

                <tr>
                    <td><?= htmlspecialchars($fila['numero_vehiculo']) ?></td>
                    <td><?= htmlspecialchars($fila['marca']) ?></td>
                    <td><?= htmlspecialchars($fila['modelo']) ?></td>
                    <td><?= htmlspecialchars($fila['anio']) ?></td>
                    <td><?= htmlspecialchars($fila['estado']) ?></td>
                </tr>
            </table>

        <?php else: ?>

            <div class="error">
                Vehículo no encontrado.
            </div>

        <?php endif; ?>

    <?php endif; ?>

    <a href="menu.php" class="regresar">
    Volver al menú principal
    </a>

</div>

</body>
</html>