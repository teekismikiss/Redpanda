-- AdminNeo 5.0.0 MySQL 8.0.35 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `curso` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `telefono` varchar(9) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish2_ci;

INSERT INTO `alumnos` (`id`, `nombre`, `curso`, `email`, `telefono`, `fecha_registro`) VALUES
(1,	'Juan Pérez',	'PHP desde Cero',	'juan.perez@mail.com',	'611000101',	'2026-01-10'),
(2,	'Lucía Gómez',	'JavaScript Moderno',	'lucia.gomez@mail.com',	'611000102',	'2026-01-12'),
(3,	'Mario Sánchez',	'Python Básico',	'mario.sanchez@mail.com',	'611000103',	'2026-01-15'),
(4,	'Sofía Ramírez',	'SQL y Bases de Datos',	'sofia.ramirez@mail.com',	'611000104',	'2026-01-18'),
(5,	'Pedro Navarro',	'React Inicial',	'pedro.navarro@mail.com',	'611000105',	'2026-01-20'),
(6,	'Claudia Ortiz',	'PHP desde Cero',	'claudia.ortiz@mail.com',	'611000106',	'2026-01-22'),
(7,	'Diego Morales',	'JavaScript Moderno',	'diego.morales@mail.com',	'611000107',	'2026-01-25'),
(8,	'Elena Castro',	'Python Básico',	'elena.castro@mail.com',	'611000108',	'2026-01-28'),
(9,	'Javier Molina',	'SQL y Bases de Datos',	'javier.molina@mail.com',	'611000109',	'2026-02-01'),
(10,	'Paula Herrera',	'React Inicial',	'paula.herrera@mail.com',	'611000110',	'2026-02-03'),
(11,	'Adrián Vega',	'PHP desde Cero',	'adrian.vega@mail.com',	'611000111',	'2026-02-05'),
(12,	'Natalia Cruz',	'JavaScript Moderno',	'natalia.cruz@mail.com',	'611000112',	'2026-02-07'),
(13,	'Raúl Domínguez',	'Python Básico',	'raul.dominguez@mail.com',	'611000113',	'2026-02-10'),
(14,	'Andrea Gil',	'SQL y Bases de Datos',	'andrea.gil@mail.com',	'611000114',	'2026-02-12'),
(15,	'Hugo León',	'React Inicial',	'hugo.leon@mail.com',	'611000115',	'2026-02-15');

-- 2026-03-04 22:10:00 UTC
