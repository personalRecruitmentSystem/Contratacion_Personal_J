-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2024 a las 00:22:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_contratacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `ID_Postulante` int(11) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellidos` varchar(40) NOT NULL,
  `Cargo a postular` varchar(40) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Nacionalidad` varchar(40) NOT NULL,
  `CI o pasaporte` varchar(40) NOT NULL,
  `Fecha de nacimiento` date NOT NULL,
  `Sexo` varchar(40) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Celular o telefono` varchar(40) NOT NULL,
  `Idiomas` varchar(40) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Fotos` varchar(100) NOT NULL,
  `PDF de la postulación` varchar(100) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `Fecha de postulacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`ID_Postulante`, `Nombres`, `Apellidos`, `Cargo a postular`, `Foto`, `Nacionalidad`, `CI o pasaporte`, `Fecha de nacimiento`, `Sexo`, `Direccion`, `Celular o telefono`, `Idiomas`, `Correo`, `Fotos`, `PDF de la postulación`, `Estado`, `Fecha de postulacion`) VALUES
(1, 'Juan Carlos', 'Martinez Ferandez', 'Secretaria', 'uploads/hombre_1.png', 'Boliviana', '16712351', '1985-02-17', 'Masculino', 'Calle Rivadavia #789', '68291231', 'Ingles_A1 - Frances_Ninguno', 'usuario@hotmail.com', '', 'screenshots/Martinez Ferandez_JuanCarlos.png', 'Por Revisar', '2024-02-28'),
(2, 'Maria Jose', 'Garcia Lopez', 'RRHH', 'uploads/mujer_1.png', 'Mexicana', '17231651', '1978-02-01', 'Femenino', 'Av. Insurgentes Sur #123', '79210232', 'Ingles_B2 - Frances_A1', 'ejemplo1@gmail.com', '', 'screenshots/Garcia Lopez_Maria Jose.png', 'Por Revisar', '2024-02-28'),
(3, 'Gabriela', 'Diaz Martinez', 'Sistemas', 'uploads/mujer_2.png', 'Boliviana', '21115135', '1991-02-25', 'Femenino', 'Av. Libertador #456', '68129311', 'Ingles_C1 - Frances_B1', 'gabriela_fernandez@gmail.com', '', 'screenshots/Diaz Martinez_Gabriela.png', 'Por Revisar', '2024-02-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`ID_Postulante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `ID_Postulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
