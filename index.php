<?php

include('config.php');
include('funciones.php');

$mensaje = "";

// Agregar funcionario
if (isset($_POST['agregar_funcionario'])) {
    $nombre = $_POST['nombre_funcionario'];

    if (agregarFuncionario($conexion, $nombre)) {
        $mensaje = "Funcionario agregado con éxito.";
    } else {
        $mensaje = "Error al agregar funcionario.";
    }
}

// Registrar fichaje
if (isset($_POST['fichar'])) {
    $funcionarioId = $_POST['funcionario_id'];
    $tipoFichaje = $_POST['tipo'];

    if (fichar($funcionarioId, $tipoFichaje, $conexion)) {
        $mensaje = "Fichaje realizado con éxito.";
    } else {
        $mensaje = "Error al registrar fichaje.";
    }
}


$funcionarios = obtenerFuncionarios($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichaje de Funcionarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1, h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input, select, button {
            padding: 8px;
            margin: 5px 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .mensaje {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Fichaje de Funcionarios</h1>

    <?php if (!empty($mensaje)): ?>
        <p class="mensaje"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <h2>Agregar Funcionario</h2>
    <form method="POST" action="index.php">
        <label for="nombre_funcionario">Nombre del funcionario:</label><br>
        <input type="text" id="nombre_funcionario" name="nombre_funcionario" required>
        <button type="submit" name="agregar_funcionario">Agregar Funcionario</button>
    </form>

    <hr>

    <h2>Fichar Entrada o Salida</h2>
    <form method="POST" action="index.php">
        <label for="funcionario_id">Funcionario:</label><br>
        <select name="funcionario_id" id="funcionario_id" required>
            <?php foreach ($funcionarios as $funcionario): ?>
                <option value="<?= $funcionario['id'] ?>"><?= $funcionario['nombre'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="tipo">Tipo de fichaje:</label><br>
        <select name="tipo" id="tipo" required>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>
        <br>

        <button type="submit" name="fichar">Fichar</button>
    </form>

    <h2>Historial de Fichajes</h2>
    <table>
        <tr>
            <th>Funcionario</th>
            <th>Tipo</th>
            <th>Fecha</th>
        </tr>

        <?php
        foreach ($funcionarios as $funcionario) {
            $fichajes = obtenerFichajes($funcionario['id'], $conexion);

            foreach ($fichajes as $fichaje) {
                echo "<tr>
                        <td>{$funcionario['nombre']}</td>
                        <td>{$fichaje['tipo']}</td>
                        <td>{$fichaje['fecha']}</td>
                      </tr>";
            }
        }
        ?>
    </table>

</body>
</html>