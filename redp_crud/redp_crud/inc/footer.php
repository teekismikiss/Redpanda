 </main>

    <footer class="footer-grid">

        <!--COLUMNA IZQUIERDA: NAV-->
        <nav class="footer-nav">
            <ul class="nav-footer">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Cursos</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
        <!--COLUMNA CENTRO: DATOS -->
        <div class="footer-datos">
            <h4>Red Panda</h4>
            <address>
                Carretera Pola de Programadores,<br>
                33209 Gijón
            </address>

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
           <p><?php echo $horario; ?></p>
            
        </div>
        <!--COPYRIGHT-->
        <p class="footer-copy">
            &copy; 2026 Red Panda — Todos los derechos reservados
        </p>

    </footer>


</body>

</html>