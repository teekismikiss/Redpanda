<?php $address = 'Carretera Pola de Programadores, 33209 Gijón';
$tel = '985222222';
$movil = '604 22 06 17'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Panda | Academia Web</title>
    <link rel="stylesheet" href="style.css">





</head>

<body>
    <div class="topnav">
        <a href="tel:985222222">📞
            <?php echo $tel; ?>
        </a>
        <a href="tel:698522222">📱
            <?php echo $movil; ?>
        </a>
    </div>
    <header class="header">
        <img src="img/redpanda-logo.png" alt="Logo Red Panda" class="logo" style="width:250px;">

        <h1>Red Panda</h1>



        <nav class="nav-header">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="campus.php">Campus</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </header>


    <main class="main-container">

        <!--CURSOS-->
        <section class="card">
            <h2>Cursos</h2>

            <article class="curso campus">

            </article>


        </section>
        <!--SIDEBAR-->
        <aside class="card video">
            <h2>Tur</h2>

            <iframe src="https://www.youtube.com/embed/BcGAPkjt_IE" title="TUR">
            </iframe>

            <p>Descubre nuestro campus.</p>
            <button>Ver clase</button>
        </aside>


    </main>

    <footer class="footer-grid">

        <!--COLUMNA IZQUIERDA: NAV-->
        <nav class="footer-nav">
            <ul class="nav-footer">
                <li><a href="#">Inicio</a></li>
                <li><a href="campus.php">Campus</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <!--COLUMNA CENTRO: DATOS -->
        <div class="footer-datos">
            <h4>Red Panda</h4>
            <?php echo $address; ?>

            <p>
                <a href="tel:985222222">
                    <?php echo $tel; ?>
                </a> |
                <a href="tel:698522222">
                    <?php echo $movil; ?>
                </a>
            </p>
        </div>
        <!--COLUMNA DERECHA: HORARIO-->
        <div class="footer-horario">
            <h4>Nuestro horario</h4>
            <ul>
                <li>Lunes a Viernes: 9:00 – 14:00</li>
                <li>Lunes a Viernes: 16:00 – 20:00</li>
            </ul>
        </div>
        <!--COYRIGHT-->
        <p class="footer-copy">
            &copy; 2026 Red Panda — Todos los derechos reservados
        </p>

    </footer>


</body>

</html>