<?php $address = 'Carretera Pola de Programadores, 33209 Gijón';
$tel = '985222222';
$movil = '604 22 06 17'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Panda| Academia Web</title>
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

        <!--newsletter-->
        <section class="card">
            <h2>febrero con código y café — novedades Red Panda + regalo para ti</h2>
            <br>
            <article class="campus">
                <p>¡Hola, Redpandacoder! </p><br>

                <p> ¡Arrancamos febrero con toda la energía! Este mes en Red Panda seguimos creciendo y trayendo
                    nuevas oportunidades para que mejores tus habilidades como developer.</p>

                <h4>Novedades del mes</h4>

                <p>Nuevo curso de PHP avanzado: aprende a crear tu primera API desde cero y conecta tu proyecto con
                    bases de datos dinámicas.

                    Workshop en vivo sobre CSS Grid y Flexbox: el 20 de febrero a las 18:00 (hora Madrid). Solo
                    necesitas tu portátil y ganas de aprender.

                    Mentorías personalizadas: los martes abrimos espacio para resolver tus dudas de código 1 a 1 con
                    nuestros instructores.</p>
                <br>
                <h4>Lo que está pasando en el mundo del código</h4>

                <p>Python sigue siendo el lenguaje más demandado de 2026, especialmente en inteligencia artificial y
                    análisis de datos.

                    GitHub Copilot X lanza nuevas funciones para aprender sobre la marcha: perfecto para practicar
                    mientras
                    programas.</p>
                <br>
                <h4> Oferta exclusiva para Redpandacoders
            </article>
        </section>
    </main>
    </h4>


    <p> Este mes, obtén un 20% de descuento en tu siguiente curso premium + un regalo sorpresa (una
        taza
        Red Panda edición limitada ).

        Usa el código: CODIGOfebrero 26 antes del 29 de febrero .</p>

    <h4>Consejo del mes</h4>

    <p>“La mejor manera de aprender a programar es crear algo que te emocione.”
        Empieza ese proyecto personal, súbelo a GitHub y etiqueta a @RedPanda para que lo
        compartamos.

        ¡Nos vemos en clase, Redpandacoder!

        — El equipo de Red Panda </p>
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