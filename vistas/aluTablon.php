
<article class="campus">
    <h1>Mis apuntes</h1>
    <section class="whiteboard">
        <div class="editor">
            <div class="toolbar">
                <button onclick="format('bold')">Negrita</button>
                <button onclick="format('italic')">Cursiva</button>
                <button onclick="format('underline')">Subrayado</button>
                <button onclick="highlightText()">Highlight</button>
                <button onclick="setColor('red')">Texto rojo</button>
                <button onclick="addChecklist()">Checklist</button>
                <button onclick="insertarJS()">JS</button>
                
<br>




            </div>

            <div id="notaPersistente" contenteditable="true" style="min-height:400px; border: 1px solid var(--html);">
                Escribe aqui tu nota...
            </div>

            <div style="margin-top:10px;">
                <button id="btnGuardar">Guardar</button>
                <button id="btnLimpiar">Borrar</button>
                <button id="btnExportar">Exportar</button>
                <span id="estadoGuardado">Sin cambios</span>
            </div>
        </div>
    </section>
<!-- Sidebar -->
        <aside class="card video">
            <img src="img/redpanda-aprende.png" alt="" style="width:350px;">

            <h2>Clase gratuita</h2>

            <iframe src="https://www.youtube.com/embed/BcGAPkjt_IE" title="Clase HTML CSS JS">
            </iframe>

            <p>Descubre cómo empezar en el desarrollo web paso a paso.</p>
            <button>Ver clase</button>
        </aside>

</article>

<?php require __DIR__ . '/../componentes/vista_mensajeria.php'; ?>

<script>
//--------------------- CONFIGURACIÓN INICIAL ---------------------
const CLAVE_STORAGE = 'notaEditada_v2';
const nota = document.getElementById('notaPersistente');
const estado = document.getElementById('estadoGuardado');
const btnGuardar = document.getElementById('btnGuardar');
const btnLimpiar = document.getElementById('btnLimpiar');
const btnExportar = document.getElementById('btnExportar');

let timerAutosave = null;
let hayCambiosPendientes = false;


//--------------------- ESTADO (MENSAJES AL USUARIO) ---------------------
function actualizarEstado(texto) {
    if (estado) {
        estado.textContent = texto;
    }
}


//--------------------- FORMATO DE TEXTO ---------------------
function setColor(color) {
    document.execCommand('foreColor', false, color);
}

function format(command) {
    document.execCommand(command, false, null);
}

function highlightText() {
    document.execCommand('backColor', false, 'yellow');
}


//--------------------- CURSOR ---------------------
function moverCursorAlInicio(elemento) {
    const selection = window.getSelection();
    const range = document.createRange();
    range.selectNodeContents(elemento);
    range.collapse(true);
    selection.removeAllRanges();
    selection.addRange(range);
}


//--------------------- BTN CHECKLIST (CREAR ITEM) ---------------------
function crearChecklistItem() {
    const div = document.createElement('div');
    div.className = 'checklist-item';

    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';

    const text = document.createElement('span');
    text.textContent = ' ';
    text.contentEditable = 'true';

    div.appendChild(checkbox);
    div.appendChild(text);

    return { div, text };
}


//--------------------- BTN CHECKLIST (INSERTAR ITEM) ---------------------
function addChecklist() {
    nota.focus();
    const { div, text } = crearChecklistItem();
    const selection = window.getSelection();

    // Si no hay cursor → lo añade al final
    if (!selection.rangeCount) {
        nota.appendChild(div);
        moverCursorAlInicio(text);
        return;
    }

    // Insertar en posición del cursor
    const range = selection.getRangeAt(0);
    range.collapse(false);
    range.insertNode(div);

    moverCursorAlInicio(text);
}


//--------------------- ENTER CREA NUEVO CHECKLIST ---------------------
nota.addEventListener('keydown', function(e) {
    if (e.key !== 'Enter') return;

    const selection = window.getSelection();
    if (!selection.rangeCount) return;

    let parent = selection.anchorNode;

    // Si es texto, subir al padre
    if (parent && parent.nodeType === Node.TEXT_NODE) {
        parent = parent.parentNode;
    }

    // Buscar si estamos dentro de checklist
    while (parent && parent !== nota) {
        if (
            parent.nodeType === Node.ELEMENT_NODE &&
            parent.classList.contains('checklist-item')
        ) {
            e.preventDefault();

            const { div, text } = crearChecklistItem();
            parent.insertAdjacentElement('afterend', div);
            moverCursorAlInicio(text);
            return;
        }

        parent = parent.parentNode;
    }
});
//--------------------- SHORTCUT JS PRECODE ---------------------
function insertarJS() {
    nota.focus();
    const selection = window.getSelection();
    const fragment = document.createDocumentFragment();
    const lineaInicio = document.createTextNode("```js");
    const salto1 = document.createElement('br');
    const salto2 = document.createElement('br');
    const lineaFin = document.createTextNode("```");

    fragment.appendChild(lineaInicio);
    fragment.appendChild(salto1);
    fragment.appendChild(salto2);
    fragment.appendChild(lineaFin);

    if (!selection.rangeCount) {
        nota.appendChild(fragment);
        return;
    }

    const range = selection.getRangeAt(0);
    range.deleteContents();
    range.insertNode(fragment);

    range.setStartAfter(lineaFin);
    range.collapse(true);
    selection.removeAllRanges();
    selection.addRange(range);
}

//--------------------- CARGAR DESDE LOCALSTORAGE ---------------------
window.addEventListener('load', () => {
    const contenidoGuardado = localStorage.getItem(CLAVE_STORAGE);

    if (contenidoGuardado) {
        nota.innerHTML = contenidoGuardado;
        actualizarEstado('Cargado desde el navegador');
    } else {
        actualizarEstado('Sin cambios');
    }
});


//--------------------- AUTOGUARDADO ---------------------
nota.addEventListener('input', () => {
    hayCambiosPendientes = true;
    actualizarEstado('Escribiendo...');

    if (timerAutosave) {
        clearTimeout(timerAutosave);
    }

    timerAutosave = setTimeout(() => {
        guardarEnLocalStorage();
    }, 1000);
});


//--------------------- BOTÓN GUARDAR ---------------------
btnGuardar.addEventListener('click', () => {
    guardarEnLocalStorage();
});


//--------------------- BOTÓN LIMPIAR ---------------------
btnLimpiar.addEventListener('click', () => {
    nota.innerHTML = '';
    localStorage.removeItem(CLAVE_STORAGE);
    actualizarEstado('Nota vacia');
    hayCambiosPendientes = false;
});


//--------------------- BOTÓN EXPORTAR ---------------------
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


//--------------------- GUARDAR EN LOCALSTORAGE ---------------------
function guardarEnLocalStorage() {
    const contenido = nota.innerHTML.trim();

    if (contenido === '') {
        actualizarEstado('Nada que guardar');
        hayCambiosPendientes = false;
        return;
    }

    try {
        localStorage.setItem(CLAVE_STORAGE, contenido);
        actualizarEstado('Cambios guardados');
        hayCambiosPendientes = false;
    } catch (error) {
        console.error('Error al guardar:', error);
        actualizarEstado('Error al guardar');
    }
}


//--------------------- AVISO AL SALIR SIN GUARDAR ---------------------
window.addEventListener('beforeunload', (e) => {
    if (hayCambiosPendientes) {
        e.preventDefault();
        e.returnValue = '';
    }
});
</script>
