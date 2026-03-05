<?php
// datos de conexion transform $servname en const 
const SERV = "localhost";
const USER= "root";
const PASS = "root";
const DBNM = "RedPanda";

// Create connection
$conn = new mysqli(SERV,USER,PASS,DBNM);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//Mostrar toda
$sql = "SELECT * FROM alumnos";

//CRUD

///// READ
// Mostrar solo una (ficha.php)
// $sql = "SELECT * FROM productos_pasteleria where id=1";


/////// DELETE
// Borrar alumno (borrar.php)
// $sql = "DELETE FROM alumnos where id=1";


//////// UPDATE
/* Editar (editar.php)
    $sql = "UPDATE `alumnos` SET
    `nombre` = 'Juan Pérez',
    `curso` = 'PHP desde Cero',
    `email` = 'juan.perez@mail.com',
    `telefono` = '611000101',
    `fecha_registro` = '2026-01-10'
    WHERE `id` = '1';";
*/


//////// CREATE
/* Crear nuevo registro / Nuevo alumno (crear.php)
$sql="INSERT INTO alumnos (nombre, curso, email, telefono, fecha_registro) VALUES
('Juan Pérez', 'PHP desde Cero', 'juan.perez@mail.com', '611000101', '2026-01-10'),
*/



// Ejecutar Consulta SQL
$result = $conn->query($sql);

//Array donde almacenaremos los datos de la consulta
$datos = [];

// Recorrer consulta y meter los dtos en el array
if ($result->num_rows > 0) {
    // Recorre consultas y lo mete limpio dentro de un array
    while ($fila = $result->fetch_assoc()) {
        $datos[] = $fila;
    }
} else {
    echo "No hay nuevos alumnos registrados";
}

//Cerrar conexión
$conn->close();
?>

<?php  // Testeo
    /*
    echo '<pre>';
    print_r($datos);
    echo '</pre>';
    */
?>



<br>
<?php include __DIR__ . '/inc/header.php'; ?>
<ul class="pastel">
    

<?php
    foreach($datos as $alumno):
    ?>

    <li>
        <p>id: <?= $alumno['id']?></p>
        <h2><?= $alumno['nombre']?></h2>
        <p><?= $alumno['curso']?></p>
        <p>Email: <?= $alumno['email']?></p>
       <p>Tel: <?= $alumno['telefono']?></p>
       <p>Desde: <?= $alumno['fecha_registro']?></p>
       <a href="ficha.php?id=<?=$alumno['id']?>">Ver ficha</a>
       <a href="editar.php?id=<?=$alumno['id']?>">Editar</a>
       <a href="borrar.php?id=<?=$alumno['id']?>">Borrar</a>
    </li>
    
<? endforeach; ?>

</ul>

<?php include __DIR__ . '/inc/footer.php'; ?>
