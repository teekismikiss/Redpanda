
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
        function miFuncion()
        {
            //01 carga del JSON
            $json = file_get_contents('src/login.json');

            //02 convertir JSON a array PHP (asociativo)
            $datos = json_decode($json, true);
            //print_r($datos); // or || : hay que negar el isset si el usuario no exist o la contreseña no exite 
            if (!isset($_POST["usuario"]) || !isset($_POST["contrasena"])) {

                return;
            }
            if ($datos["usuario"] == $_POST["usuario"] && $datos["contra"] == $_POST["contrasena"]) {
                echo "Sesion iniciada correctamente <br>";
                // Inicia la sesión
                session_start();
                $_SESSION['usuario'] = 'admin';
            } else {
                echo "Error en las credenciales";
            }
        }

        if (isset($_POST["Login"])) {
            miFuncion();
        }
        ?>
        <a href="404.php">Volver</a>

    <script src="Script.js"> </script>
   </div> </article>
</section>