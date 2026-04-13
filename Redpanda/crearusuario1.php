<?php

$sessionPath = __DIR__ . '/tmp_sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
session_save_path($sessionPath);
// Inicia la sesión
session_start(); ?>

<?php
$datos = require __DIR__ . '/componentes/datos.php';
$address = $datos['address'];
$tel = $datos['tel'];
$movil = $datos['movil'];
$horario=$datos['horario'];
?>
<?php include __DIR__ . '/componentes/header.php'; ?>


    <section class="formulario">
       
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
        function miFuncion()
        {
            //01 carga del JSON
            $json = file_get_contents(__DIR__ . '/login.json');

            //02 convertir JSON a array PHP (asociativo)
            $datos = json_decode($json, true);
            //print_r($datos); // or || : hay que negar el isset si el usuario no exist o la contreseña no exite 
            if (!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {

                return;
            }
            if ($datos["usuario"] == $_POST["usuario"] && $datos["contra"] == $_POST["contrasena"]) {
                echo "Sesion iniciada correctamente <br>";
                $_SESSION['usuario'] = 'admin';
            } else {
                echo "Error en las credenciales";
            }
        }

        if (isset($_POST["Login"])) {
            miFuncion();
        }
        ?>
        <a href="index.php">Volver</a>
</section>

        <?php include __DIR__ . '/componentes/footer.php'; ?>
 