# Redpanda

Academia Red Panda  - Plataforma Web de Formación en Programación
 Un sitio especializada en enseñanza práctica de tecnologías web desde cero. Incluye landing principal, newsletter, campus y formulario de contacto con RGPD.


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


        