### Para evitar variables globales sueltas y para hacerlo más escalable, 
en index.php  cambiamos 

```php
<?php $address = 'Carretera Pola de Programadores, 33209 Gijón';
$tel = '985222222';
$movil = '604 22 06 17'; ?>
```
 por
```php
<?php
$datos = require __DIR__ . '/includes/datos.php';
$address = $datos['address'];
$tel = $datos['tel'];
$movil = $datos['movil'];
?>
```
y en datos.php vamos a transformar la variable suelta en array associativo -> return array (más limpio, eutilizable y organizado).(added:horario,email,nb de la academia)

Variable suelta
```php
<?php $address = 'Carretera Pola de Programadores, 33209 Gijón';
$tel = '9852bnjkjb';
$movil = '698522222'; ?>

 <a href="tel:985222222">📞
            <?php echo $tel; ?>
        </a>
        <a href="tel:698522222">📱
            <?php echo $movil; ?>
        </a>

```
Return array
```php
<?php
return [
    'address' => 'Carretera Pola de Programadores, 33209 Gijón',
    'tel' => '985777777',
    'movil' => '698522222',
    'email' => 'redpanda@email.com',
    'horario' => 'Lunes a Viernes: 9:00 - 14:00 16:00 - 20:00',
    'nombre_academia' => 'Red Panda',
];
```
añadir categorias elementos en datos y no olvirar de definir lo en index 
```php
<?php
$datos = require __DIR__ . '/includes/datos.php';
$address = $datos['address'];
$tel = $datos['tel'];
$movil = $datos['movil'];//definir aquí las variables
?>
```