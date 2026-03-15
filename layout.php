<?php
// Carga de datos comunes
$datos = require __DIR__ . '/componentes/datos.php';

$address = $datos['address'];
$tel     = $datos['tel'];
$movil   = $datos['movil'];
$horario = $datos['horario'];

// Variables mínimas que debe definir cada página
// $pageTitle  (opcional, para <title> o h1)
// $pageView   (obligatoria, ruta de la vista dentro de /vistas)

require __DIR__ . '/componentes/header.php';
require __DIR__ . '/' . $pageView;
require __DIR__ . '/componentes/footer.php';
