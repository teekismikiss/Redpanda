<?php

function obtenerConexion(): ?PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $host = getenv('REDPANDA_DB_HOST') ?: '127.0.0.1';
    $port = getenv('REDPANDA_DB_PORT') ?: '3306';
    $dbname = getenv('REDPANDA_DB_NAME') ?: 'redpanda';
    $user = getenv('REDPANDA_DB_USER') ?: 'root';
    $pass = getenv('REDPANDA_DB_PASS') ?: 'root';

    $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    } catch (PDOException $exception) {
        $pdo = null;
    }

    return $pdo;
}
