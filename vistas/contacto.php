<section class="card">
    <h2 class="contact">contacta con el equipo de Red Panda</h2>
<article class="campus">
        <div class="container">
<form action="contacto.php" id="contact" method="POST">
            <fieldset>
    <label for="nombre">Nombre:</label>
    <input type="text" 
           id="nombre" 
           name="nombre" 
           placeholder="tu nombre completo" 
           required></fieldset>
<fieldset>
    <label for="email">Email:</label>
    <input type="email" 
           id="email" 
           name="email" 
           placeholder="tumejoremail@dominio.com"
           required></fieldset>
<fieldset>
    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" 
              name="mensaje" 
              placeholder="Cuéntanos cómo te podemos ayudar." 
              required></textarea></fieldset>
<fieldset>
    <!-- ✅ Checkbox RGPD AQUÍ -->
    <div class="rgpd-checkbox">
        <input type="checkbox" 
               id="acepto-privacidad" 
               name="acepto_privacidad" 
               value="1" 
               required
               aria-describedby="rgpd-desc">
        <label for="acepto-privacidad">
            He leído y acepto la 
            <a href="privacidad.html" 
               target="_blank" 
               rel="noopener noreferrer">
                Política de privacidad
            </a>
        </label></fieldset>
        <p id="rgpd-desc" class="sr-only">
            Debes aceptar la política de privacidad para enviar el formulario
        </p>
    <button type="submit">Enviar</button>
      
</div>