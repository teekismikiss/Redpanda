<?php
$sessionPath = __DIR__ . '/tmp_sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
session_save_path($sessionPath);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'profe') {
    header('Location: creaUsu.php');
    exit();
}

$pageTitle = 'Tablon';
$pageView  = 'vistas/profeTablon.php';

require __DIR__ . '/layout.php';
