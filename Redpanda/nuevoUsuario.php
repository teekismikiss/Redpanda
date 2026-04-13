<?php
$host = "localhost";
$db = "if0_41465003_redpanda";
$user = "if0_41465003";
$pass = "VAgDwJ3AeDc";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>