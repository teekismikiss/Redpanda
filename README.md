# Redpanda



--------- 8/04/26


> [!TIP]
> Añadir al tablon un boton para escribir en rojo

```html
<button onclick="setColor('red')">Texto rojo</button>
```
```js
function setColor(color) {
  document.execCommand("foreColor", false, color);
}
```

Botón tipo selector:
<input type="color" onchange="setColor(this.value)">

Esto abre un selector de color y aplica el que elijas.


> [!WARNING]
> execCommand es una API antigua, pero funciona bien para proyectos simples.
Si más adelante quieres algo más potente (tipo editores modernos), habría que usar librerías como:

- Quill
- Slate
- TipTap





--------------16/03/26
```js
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


-> la descarga se detiene en el mac
        ->aluTablon.php en safari y chrome se ve diferente.
        ->login 2 tipos de usuario el admin (que podr´ra cambiar cosas y el alumno quiem podrá apuntar)


        ```
----------------------------------------------------------

 # Funcionalidades previstas

 Landing responsive con cursos 

- Secciones dinámicas (galeria foto, newsletter)

- Formulario de contacto con validación RGPD (fieldset, label for, required)

- Estructura PHP modular con datos centralizados

- Diseño responsive con CSS Grid/Flexbox

- Email clicables (mail to:)
- Login
- pagina usuario alumno
- pagina admin: CRUD


## Original idea
```txt
Redpanda/
├── index.php
├── home.html
├── contacto.php
├── campus.php
├── newsletter.php
├── readme.md
├── css/
├── img/
│   └── (imagenes)
├── includes/
│   ├── datos.php
│   └── footer.php
│   └── header.php
└── login/
    └── inde
```


        
