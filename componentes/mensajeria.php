<?php

require_once __DIR__ . '/db.php';

function sincronizarUsuarioSesion(string $nombreUsuario): ?int
{
    $conexion = obtenerConexion();

    if (!$conexion) {
        return null;
    }

    $nombreUsuario = trim($nombreUsuario);
    if ($nombreUsuario === '') {
        return null;
    }

    $emailGenerado = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '.', $nombreUsuario));
    $emailGenerado = trim($emailGenerado, '.');

    if ($emailGenerado === '') {
        $emailGenerado = 'usuario';
    }

    $email = $emailGenerado . '@redpanda.local';

    $consulta = $conexion->prepare('SELECT id FROM usuarios WHERE nombre = :nombre OR email = :email LIMIT 1');
    $consulta->execute([
        'nombre' => $nombreUsuario,
        'email' => $email,
    ]);

    $usuario = $consulta->fetch();
    if ($usuario) {
        return (int) $usuario['id'];
    }

    $insertar = $conexion->prepare('INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)');
    $insertar->execute([
        'nombre' => $nombreUsuario,
        'email' => $email,
    ]);

    return (int) $conexion->lastInsertId();
}

function obtenerConversacionAlumnoProfesor(int $usuarioActualId, string $rolActual): ?int
{
    $conexion = obtenerConexion();

    if (!$conexion) {
        return null;
    }

    if ($rolActual === 'alum') {
        $consulta = $conexion->prepare(
            "SELECT uc.conversacion_id
             FROM usuarios_conversaciones uc
             JOIN mensajes m ON m.conversacion_id = uc.conversacion_id
             WHERE uc.usuario_id = :usuario_id
             GROUP BY uc.conversacion_id
             ORDER BY MAX(m.fecha_envio) DESC, MAX(m.id) DESC
             LIMIT 1"
        );
        $consulta->execute(['usuario_id' => $usuarioActualId]);
        $conversacionId = $consulta->fetchColumn();

        if ($conversacionId) {
            return (int) $conversacionId;
        }

        $consultaProfes = $conexion->query("SELECT id FROM usuarios WHERE nombre = '123' OR email = '123@redpanda.local' LIMIT 1");
        $profesorId = $consultaProfes->fetchColumn();

        if (!$profesorId) {
            return null;
        }

        return crearConversacion($conexion, [$usuarioActualId, (int) $profesorId]);
    }

    $consulta = $conexion->prepare(
        "SELECT uc.conversacion_id
         FROM usuarios_conversaciones uc
         JOIN mensajes m ON m.conversacion_id = uc.conversacion_id
         WHERE uc.usuario_id = :usuario_id
         GROUP BY uc.conversacion_id
         ORDER BY MAX(m.fecha_envio) DESC, MAX(m.id) DESC
         LIMIT 1"
    );
    $consulta->execute(['usuario_id' => $usuarioActualId]);
    $conversacionId = $consulta->fetchColumn();

    return $conversacionId ? (int) $conversacionId : null;
}

function crearConversacion(PDO $conexion, array $usuarios): int
{
    $conexion->beginTransaction();

    try {
        $conexion->exec('INSERT INTO conversaciones () VALUES ()');
        $conversacionId = (int) $conexion->lastInsertId();

        $insertarRelacion = $conexion->prepare(
            'INSERT INTO usuarios_conversaciones (usuario_id, conversacion_id) VALUES (:usuario_id, :conversacion_id)'
        );

        foreach ($usuarios as $usuarioId) {
            $insertarRelacion->execute([
                'usuario_id' => $usuarioId,
                'conversacion_id' => $conversacionId,
            ]);
        }

        $conexion->commit();

        return $conversacionId;
    } catch (Throwable $exception) {
        if ($conexion->inTransaction()) {
            $conexion->rollBack();
        }

        throw $exception;
    }
}

function obtenerMensajesConversacion(int $conversacionId): array
{
    $conexion = obtenerConexion();

    if (!$conexion) {
        return [];
    }

    $consulta = $conexion->prepare(
        'SELECT mensajes.contenido, mensajes.fecha_envio, mensajes.remitente_id, usuarios.nombre
         FROM mensajes
         JOIN usuarios ON usuarios.id = mensajes.remitente_id
         WHERE mensajes.conversacion_id = :conversacion_id
         ORDER BY mensajes.fecha_envio ASC, mensajes.id ASC'
    );

    $consulta->execute(['conversacion_id' => $conversacionId]);

    return $consulta->fetchAll();
}

function obtenerConversacionesProfesor(int $profesorId): array
{
    $conexion = obtenerConexion();

    if (!$conexion) {
        return [];
    }

    $consulta = $conexion->prepare(
        "SELECT c.id,
                alumno.nombre AS alumno_nombre,
                ultimo_mensaje.contenido AS ultimo_contenido,
                ultimo_mensaje.fecha_envio AS ultima_fecha
         FROM conversaciones c
         JOIN usuarios_conversaciones ucp ON ucp.conversacion_id = c.id AND ucp.usuario_id = :profesor_id
         JOIN usuarios_conversaciones uca ON uca.conversacion_id = c.id AND uca.usuario_id <> :profesor_id
         JOIN usuarios alumno ON alumno.id = uca.usuario_id
         LEFT JOIN mensajes ultimo_mensaje ON ultimo_mensaje.id = (
             SELECT m2.id
             FROM mensajes m2
             WHERE m2.conversacion_id = c.id
             ORDER BY m2.fecha_envio DESC, m2.id DESC
             LIMIT 1
         )
         ORDER BY COALESCE(ultimo_mensaje.fecha_envio, c.fecha_creacion) DESC, c.id DESC"
    );

    $consulta->execute(['profesor_id' => $profesorId]);

    return $consulta->fetchAll();
}

function enviarMensajeConversacion(int $conversacionId, int $remitenteId, string $contenido): ?string
{
    $conexion = obtenerConexion();

    if (!$conexion) {
        return 'No se pudo conectar con la base de datos.';
    }

    $contenido = trim($contenido);
    if ($contenido === '') {
        return 'Escribe un mensaje antes de enviarlo.';
    }

    $consulta = $conexion->prepare(
        'SELECT 1 FROM usuarios_conversaciones WHERE conversacion_id = :conversacion_id AND usuario_id = :usuario_id LIMIT 1'
    );
    $consulta->execute([
        'conversacion_id' => $conversacionId,
        'usuario_id' => $remitenteId,
    ]);

    if (!$consulta->fetchColumn()) {
        return 'No tienes permiso para escribir en esta conversacion.';
    }

    $insertar = $conexion->prepare(
        'INSERT INTO mensajes (conversacion_id, remitente_id, contenido) VALUES (:conversacion_id, :remitente_id, :contenido)'
    );
    $insertar->execute([
        'conversacion_id' => $conversacionId,
        'remitente_id' => $remitenteId,
        'contenido' => $contenido,
    ]);

    return null;
}
