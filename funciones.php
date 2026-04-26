<?php
include('config.php');

/**
 * Obtiene todos los funcionarios registrados en la base de datos.
 *
 * @param mysqli $conexion Conexión activa a la base de datos.
 * @return array Lista de funcionarios en formato asociativo.
 */
function obtenerFuncionarios($conexion) {
    $query = "SELECT * FROM funcionarios";
    $resultado = $conexion->query($query);
    $funcionarios = [];

    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            $funcionarios[] = $fila;
        }
    }

    return $funcionarios;
}

/**
 * Agrega un nuevo funcionario a la base de datos.
 *
 * @param mysqli $conexion Conexión activa a la base de datos.
 * @param string $nombre Nombre del funcionario.
 * @return bool True si se insertó correctamente, false en caso contrario.
 */
function agregarFuncionario($conexion, $nombre) {
    $query = "INSERT INTO funcionarios (nombre) VALUES ('$nombre')";
    return $conexion->query($query);
}

/**
 * Registra un fichaje de entrada o salida para un funcionario.
 *
 * @param int $funcionarioId ID del funcionario.
 * @param string $tipo Tipo de fichaje: entrada o salida.
 * @param mysqli $conexion Conexión activa a la base de datos.
 * @return bool True si el fichaje fue exitoso, false en caso contrario.
 */
function fichar($funcionarioId, $tipo, $conexion) {
    $fecha = date("Y-m-d H:i:s");
    $query = "INSERT INTO fichajes (funcionario_id, tipo, fecha)
              VALUES ($funcionarioId, '$tipo', '$fecha')";
    return $conexion->query($query);
}

/**
 * Obtiene el historial de fichajes de un funcionario.
 *
 * @param int $funcionarioId ID del funcionario.
 * @param mysqli $conexion Conexión activa a la base de datos.
 * @return array Lista de fichajes del funcionario.
 */
function obtenerFichajes($funcionarioId, $conexion) {
    $query = "SELECT * FROM fichajes WHERE funcionario_id = $funcionarioId";
    $resultado = $conexion->query($query);
    $fichajes = [];

    if ($resultado) {
        while ($fila = $resultado->fetch_assoc()) {
            $fichajes[] = $fila;
        }
    }

    return $fichajes;
}
