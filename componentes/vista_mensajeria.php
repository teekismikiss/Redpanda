<?php
require_once __DIR__ . '/mensajeria.php';

$conexionMensajeria = obtenerConexion();
$rolActual = $_SESSION['usuario'] ?? '';
$usuarioActualId = isset($_SESSION['usuario_id']) ? (int) $_SESSION['usuario_id'] : 0;
$nombreActual = $_SESSION['login_usuario'] ?? 'Usuario';
$errorMensajeria = '';
$estadoMensajeria = '';

if (!$conexionMensajeria) {
    $errorMensajeria = 'La mensajeria no esta disponible porque no se pudo conectar con la base de datos.';
}

if (!$errorMensajeria && $usuarioActualId <= 0 && $nombreActual !== '') {
    $usuarioActualId = (int) (sincronizarUsuarioSesion($nombreActual) ?? 0);
    $_SESSION['usuario_id'] = $usuarioActualId;
}

$conversacionSeleccionada = 0;
$conversacionesProfesor = [];

if (!$errorMensajeria && $rolActual === 'profe') {
    $conversacionesProfesor = obtenerConversacionesProfesor($usuarioActualId);
    if (isset($_GET['conversacion'])) {
        $conversacionSeleccionada = (int) $_GET['conversacion'];
    } elseif (!empty($conversacionesProfesor)) {
        $conversacionSeleccionada = (int) $conversacionesProfesor[0]['id'];
    }
}

if (!$errorMensajeria && $rolActual === 'alum') {
    $conversacionSeleccionada = (int) (obtenerConversacionAlumnoProfesor($usuarioActualId, $rolActual) ?? 0);
    if ($conversacionSeleccionada <= 0) {
        $errorMensajeria = 'No se encontro un profesor con el que abrir la conversacion.';
    }
}

if (
    !$errorMensajeria &&
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['accion_mensajeria']) &&
    $_POST['accion_mensajeria'] === 'enviar_mensaje'
) {
    $conversacionPost = isset($_POST['conversacion_id']) ? (int) $_POST['conversacion_id'] : 0;
    $resultadoEnvio = enviarMensajeConversacion($conversacionPost, $usuarioActualId, $_POST['contenido'] ?? '');

    if ($resultadoEnvio !== null) {
        $errorMensajeria = $resultadoEnvio;
        $conversacionSeleccionada = $conversacionPost;
    } else {
        $estadoMensajeria = 'Mensaje enviado correctamente.';
        $conversacionSeleccionada = $conversacionPost;
    }
}

$mensajes = [];
if (!$errorMensajeria && $conversacionSeleccionada > 0) {
    $mensajes = obtenerMensajesConversacion($conversacionSeleccionada);
}
?>

<section class="card mensajeria-card">
    <div class="mensajeria-header">
        <div>
            <p class="mensajeria-kicker">Mensajeria interna</p>
            <h2><?= $rolActual === 'alum' ? 'Habla con tu profesor' : 'Mensajes del alumnado' ?></h2>
        </div>
        <p class="mensajeria-user">Sesion: <?= htmlspecialchars($nombreActual, ENT_QUOTES, 'UTF-8') ?></p>
    </div>

    <?php if ($errorMensajeria !== ''): ?>
        <p class="mensajeria-alert mensajeria-error"><?= htmlspecialchars($errorMensajeria, ENT_QUOTES, 'UTF-8') ?></p>
    <?php elseif ($estadoMensajeria !== ''): ?>
        <p class="mensajeria-alert mensajeria-ok"><?= htmlspecialchars($estadoMensajeria, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <div class="mensajeria-layout">
        <?php if ($rolActual === 'profe'): ?>
            <aside class="mensajeria-sidebar">
                <h3>Conversaciones</h3>
                <?php if (empty($conversacionesProfesor)): ?>
                    <p class="mensajeria-empty">Todavia no hay mensajes del alumnado.</p>
                <?php else: ?>
                    <?php foreach ($conversacionesProfesor as $conversacion): ?>
                        <a
                            class="mensajeria-chat-link<?= (int) $conversacion['id'] === $conversacionSeleccionada ? ' activa' : '' ?>"
                            href="?conversacion=<?= (int) $conversacion['id'] ?>"
                        >
                            <strong><?= htmlspecialchars($conversacion['alumno_nombre'], ENT_QUOTES, 'UTF-8') ?></strong>
                            <span><?= htmlspecialchars((string) ($conversacion['ultimo_contenido'] ?? 'Sin mensajes todavia'), ENT_QUOTES, 'UTF-8') ?></span>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </aside>
        <?php endif; ?>

        <div class="mensajeria-chat">
            <div class="mensajeria-mensajes">
                <?php if (empty($mensajes)): ?>
                    <p class="mensajeria-empty">Todavia no hay mensajes en esta conversacion.</p>
                <?php else: ?>
                    <?php foreach ($mensajes as $mensaje): ?>
                        <?php $esPropio = (int) $mensaje['remitente_id'] === $usuarioActualId; ?>
                        <article class="mensaje-item<?= $esPropio ? ' propio' : '' ?>">
                            <p class="mensaje-autor"><?= htmlspecialchars($mensaje['nombre'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="mensaje-texto"><?= nl2br(htmlspecialchars($mensaje['contenido'], ENT_QUOTES, 'UTF-8')) ?></p>
                            <time class="mensaje-fecha"><?= htmlspecialchars($mensaje['fecha_envio'], ENT_QUOTES, 'UTF-8') ?></time>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <?php if ($conversacionSeleccionada > 0): ?>
                <form method="POST" class="mensajeria-form">
                    <input type="hidden" name="accion_mensajeria" value="enviar_mensaje">
                    <input type="hidden" name="conversacion_id" value="<?= $conversacionSeleccionada ?>">
                    <label for="contenido" class="mensajeria-label">Escribe tu mensaje</label>
                    <textarea id="contenido" name="contenido" rows="4" placeholder="Hola, tengo una duda sobre la clase..." required></textarea>
                    <button type="submit">Enviar mensaje</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
