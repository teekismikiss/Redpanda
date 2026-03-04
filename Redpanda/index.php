<?php
$datos = require __DIR__ . '/includes/datos.php';
$address = $datos['address'];
$tel = $datos['tel'];
$movil = $datos['movil'];
$horario=$datos['horario'];
?>
<?php include __DIR__ . '/includes/header.php'; ?>


    

        <!--CURSOS-->
        <section class="card">
            <h2>Cursos</h2>

            <article class="curso html">
                <h3>HTML5</h3>
                <p>
                    En Red Panda aprendes HTML, CSS y JavaScript desde cero absoluto, sin conocimientos previos.
                    Explicamos cada concepto como si fuera la primera vez: desde crear tu primera página HTML, darle
                    estilos increíbles con CSS hasta hacerla completamente interactiva con JavaScript (botones,
                    formularios dinámicos, animaciones).

                    Nuestro método probado:</p>
                <ul>
                    <li> → Proyectos reales desde el día 1 que construyes tú mismo</li>

                    <li> → Código que funciona inmediatamente en cualquier navegador</li>

                    <li>→ Mentores expertos resolviendo tus dudas de Html,Css y Javascript en el momento</li>
                </ul>
                <button>Ver extracto</button>
            </article>



            <article class="curso js">

                <img src="img/redpanda-logo1 br.png" alt="" style="width:150px;">

            </article>
        </section>
        <!--SIDEBAR-->
        <aside class="card video">
            <img src="img/redpanda-aprende.png" alt="" style="width:350px;">

            <h2>Clase gratuita</h2>

            <iframe src="https://www.youtube.com/embed/BcGAPkjt_IE" title="Clase HTML CSS JS">
            </iframe>

            <p>Descubre cómo empezar en el desarrollo web paso a paso.</p>
            <button>Ver clase</button>
        </aside>
        <!--CURSO 2-->
        <section class="card2">
            <h2>Cursos</h2>

            <article class="curso python">
                <h3>Python</h3>
                <p>
                    En Red Panda aprendes Python desde el principio absoluto, sin conocimientos previos. Explicamos cada
                    concepto como si fuera la primera vez: desde instalar Python hasta crear tus primeros programas
                    interactivos.</p> <br>

                Nuestro método probado:
                <ul>
                    <li> → Clases 100% prácticas, sin teoría interminable</li>

                    <li> → Ejercicios reales que ves funcionar al instante</li>

                    <li> → Profesores que responden tus dudas en vivo</li>
                </ul>


                <p>Proyectos finales para tu portfolio (¡desde el día 1!)
                </p>
                <button>Ver extracto</button>
            </article>

        </section>

        <!--SIDEBAR-->

        <aside class="card video cursos">

            <ul>
                <li> Html Css & Js</li>

                <li> Python</li>

                <li> Php</li>
                <li> React</li>

                <li> Node</li>
            </ul>
            <img src="img/redpanda-logo1 br.png" alt="" style="width:150px;">


        </aside>

    <?php include __DIR__ . '/includes/footer.php'; ?>
