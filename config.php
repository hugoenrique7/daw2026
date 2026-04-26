<?php
// config.php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "fichaje_funcionarios";

/**
 * Conexión principal a la base de datos MySQL.
 *
 * @var mysqli $conexion
 */
$conexion = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}