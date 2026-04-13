<?php
$nombreTienda = 'MascotaFeliz';
$nombrePerro = 'Pepito  ';
$nombreProducto = 'Chuchespa Xuxo 🐶';
//?nombre=Mariana;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><? echo $nombreTienda ?> tu tienda para tu Mascota</title>
</head>

<body>

    <h1>¡Hola, familia bienvenidos a <?= $nombreTienda; ?>! 🐾</h1>

    <div>
        <p>En <?= $nombreTienda; ?> descubrirás todo lo que necesitas para tu perro <?= $nombrePerro; ?>, estamos felices
            de anunciar nuestro nuevo producto estrella: <?php echo $nombrePerro; ?>, las chuches más deliciosas y
            saludables para tu mejor amigo peludo.
            Su creador, Javier, los ha elaborada espacialmente a <?php echo $nombrePerro; ?>, un travieso labrador que
            se volvió loco de alegría al probar la primera receta. Desde entonces, las <?php echo $nombreProducto; ?> se
            han convertido en la favorita de toda mascota que las prueba.
            🌟 Promoción especial de lanzamiento: durante esta semana, llévate un 10% de descuento en tu primer paquete
            de <?php echo $nombreProducto; ?>.
            Están elaboradas con ingredientes naturales, sin azúcares añadidos y con ese toque irresistible que hace que
            tu perro mueva la cola sin parar.
            🛒 ¡Haz feliz a <?php echo $nombrePerro; ?> y consigue las tuyas hoy mismo en todo para: <a
                href="https://<?= $nombreTienda; ?>.com">www.<?= $nombreTienda; ?>.com</a> ! </p>
    </div>
    Con cariño,

    <footer>
        <p>&copy; El equipo de Todo para <?php echo $nombreTienda; ?> ❤️
        <p>
    </footer>

</body>

</html>