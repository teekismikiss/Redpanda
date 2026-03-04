# CRUD NADINE   


- Crear base de datos con contenido de ejemplo a mano (AdminNeo)
    - si lo haces con chatgpt guarda los comandos
- archivo de lectura de datos w3schools MySQL Select Data

- Separar footer, header, elementos reutilizables


## Crear tabla
```sql
CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    curso VARCHAR(255),
    email VARCHAR(255),
    telefono VARCHAR(9),
    fecha_registro DATE
);
```


## Insertar datos en la tabla

```sql
INSERT INTO alumnos (nombre, curso, email, telefono, fecha_registro) VALUES
('Juan Pérez', 'PHP desde Cero', 'juan.perez@mail.com', '611000101', '2026-01-10'),
('Lucía Gómez', 'JavaScript Moderno', 'lucia.gomez@mail.com', '611000102', '2026-01-12'),
('Mario Sánchez', 'Python Básico', 'mario.sanchez@mail.com', '611000103', '2026-01-15'),
('Sofía Ramírez', 'SQL y Bases de Datos', 'sofia.ramirez@mail.com', '611000104', '2026-01-18'),
('Pedro Navarro', 'React Inicial', 'pedro.navarro@mail.com', '611000105', '2026-01-20'),
('Claudia Ortiz', 'PHP desde Cero', 'claudia.ortiz@mail.com', '611000106', '2026-01-22'),
('Diego Morales', 'JavaScript Moderno', 'diego.morales@mail.com', '611000107', '2026-01-25'),
('Elena Castro', 'Python Básico', 'elena.castro@mail.com', '611000108', '2026-01-28'),
('Javier Molina', 'SQL y Bases de Datos', 'javier.molina@mail.com', '611000109', '2026-02-01'),
('Paula Herrera', 'React Inicial', 'paula.herrera@mail.com', '611000110', '2026-02-03'),
('Adrián Vega', 'PHP desde Cero', 'adrian.vega@mail.com', '611000111', '2026-02-05'),
('Natalia Cruz', 'JavaScript Moderno', 'natalia.cruz@mail.com', '611000112', '2026-02-07'),
('Raúl Domínguez', 'Python Básico', 'raul.dominguez@mail.com', '611000113', '2026-02-10'),
('Andrea Gil', 'SQL y Bases de Datos', 'andrea.gil@mail.com', '611000114', '2026-02-12'),
('Hugo León', 'React Inicial', 'hugo.leon@mail.com', '611000115', '2026-02-15');

 ```