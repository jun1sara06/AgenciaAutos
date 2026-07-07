<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agencia de Autos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .contenedor {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px gray;
            text-align: center;
            width: 350px;
        }

        h1 {
            color: #333;
        }

        .boton {
            display: block;
            background: #0078D7;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
        }

        .boton:hover {
            background: #005ea6;
        }
    </style>
</head>
<body>

<div class="contenedor">
    <h1> Agencia de Autos</h1>

    <a href="registrar.php" class="boton">
        Registrar Vehículo
    </a>

    <a href="consultar.php" class="boton">
        Consultar Vehículos
    </a>

    <a href="eliminar.php" class="boton">
        Eliminar Vehículo
    </a>
    <a href="reporte.php" class="boton">
        Reporte de Vehículos
    </a>
</div>

</body>
</html>