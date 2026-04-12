<?php
$sessionPath = __DIR__ . '/tmp_sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
if (session_status() === PHP_SESSION_NONE) {
    session_save_path($sessionPath);
    session_start();
}

session_destroy();
header("Location: index.php");
exit();
?>
