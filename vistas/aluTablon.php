<section class="card">
    <article class="campus">
<h1>Mis apuntes</h1>

    <p>
        Escribe tu nota en el recuadro. Se guardará automáticamente en tu navegador.
        <span id="estadoGuardado">A recordar</span>
    </p>

    <div id="notaPersistente" contenteditable="true" style="min-height:120px;">
        Escribe aquí tu nota...
    </div>

    <div style="margin-top:10px;">
        <button id="btnGuardar">Guardar</button>
        <button id="btnLimpiar">Borrar</button>
        <button id="btnExportar">Exportar</button>
    </div>

    <script>
        const CLAVE_STORAGE = 'notaEditada_v2';
        const nota = document.getElementById('notaPersistente');
        const estado = document.getElementById('estadoGuardado');
        const btnGuardar = document.getElementById('btnGuardar');
        const btnLimpiar = document.getElementById('btnLimpiar');
        const btnExportar = document.getElementById('btnExportar');

        let timerAutosave = null;
        let hayCambiosPendientes = false;

        // Cargar nota al iniciar
        window.addEventListener('load', () => {
            const contenidoGuardado = localStorage.getItem(CLAVE_STORAGE);
            if (contenidoGuardado) {
                nota.innerHTML = contenidoGuardado;
                estado.textContent = 'Cargado desde el navegador';
            } else {
                estado.textContent = 'Sin cambios';
            }
        });

        // Marcar cambios y programar auto-guardado
        nota.addEventListener('input', () => {
            hayCambiosPendientes = true;
            estado.textContent = 'Escribiendo...';
            if (timerAutosave) clearTimeout(timerAutosave);

            timerAutosave = setTimeout(() => {
                guardarEnLocalStorage();
            }, 1000); // guarda 1s después de parar de escribir
        });

        // Guardar manualmente
        btnGuardar.addEventListener('click', () => {
            guardarEnLocalStorage();
        });

        // Limpiar nota
        btnLimpiar.addEventListener('click', () => {
            nota.innerHTML = '';
            localStorage.removeItem(CLAVE_STORAGE);
            estado.textContent = 'Nota vacía';
            hayCambiosPendientes = false;
        });

        // Exportar como archivo .html sencillo
        btnExportar.addEventListener('click', () => {
            const contenido = nota.innerHTML;
            const blob = new Blob([contenido], { type: 'text/html;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'mi-nota.html';
            a.click();
            URL.revokeObjectURL(url);
        });

        function guardarEnLocalStorage() {
            const contenido = nota.innerHTML.trim();
            if (contenido === '') {
                estado.textContent = 'Nada que guardar';
                hayCambiosPendientes = false;
                return;
            }

            try {
                localStorage.setItem(CLAVE_STORAGE, contenido);
                estado.textContent = 'Cambios guardados';
                hayCambiosPendientes = false;
                console.log('Auto-guardado realizado');
            } catch (error) {
                console.error('Error al guardar:', error);
                estado.textContent = 'Error al guardar';
            }
        }

        // Aviso si se intenta cerrar con cambios sin guardar
        window.addEventListener('beforeunload', (e) => {
            if (hayCambiosPendientes) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
       
    </script>
     </article>
    </section>
    