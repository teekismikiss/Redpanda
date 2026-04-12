
<section class="card">
<article class="campus">
<div class="container">

        <p>Login</p>
        <form method="POST">
            <br>
            <label class="form">Usuario
                <input required type="text" placeholder="Usuario" name="usuario" class="form"></label>

            <br>
            <label class="form">Contraseña
                <input required type="password" placeholder="contrasena" name="contrasena" class="form"></label>
            <br>

            <input type="submit" value="Entrar" name="Login" class="btnSave" class="form">

        </form>
        <?php
        require_once __DIR__ . '/../componentes/mensajeria.php';

        function miFuncion()
        {
            $rutaJson = __DIR__ . '/../src/login.json';
            $json = file_get_contents($rutaJson);
            $datos = json_decode($json, true);

            if (!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {
                return;
            }

            if (!is_array($datos)) {
                echo "Error al leer los usuarios.";
                return;
            }

            $usuario = trim($_POST["usuario"]);
            $contrasena = $_POST["contrasena"];

            foreach ($datos as $credencial) {
                if (
                    isset($credencial["usuario"], $credencial["contra"], $credencial["rol"]) &&
                    $credencial["usuario"] === $usuario &&
                    $credencial["contra"] === $contrasena
                ) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['usuario'] = $credencial['rol'];
                    $_SESSION['login_usuario'] = $credencial['usuario'];
                    $_SESSION['usuario_id'] = sincronizarUsuarioSesion($credencial['usuario']);

                    if ($credencial['rol'] === 'alum') {
                        header('Location: aluTablon.php');
                        exit();
                    }

                    if ($credencial['rol'] === 'profe') {
                        header('Location: profeTablon.php');
                        exit();
                    }
                }
            }

            echo "Error en las credenciales";
        }

        if (isset($_POST["Login"])) {
            miFuncion();
        }
        ?>
        <a href="index.php">Volver</a>

    <script src="Script.js"> </script>
</div>
</article>
</section>
