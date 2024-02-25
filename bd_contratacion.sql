-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2024 a las 19:01:30
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
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`ID_Postulante`, `Nombres`, `Apellidos`, `Cargo a postular`, `Foto`, `Nacionalidad`, `CI o pasaporte`, `Fecha de nacimiento`, `Sexo`, `Direccion`, `Celular o telefono`, `Idiomas`, `Correo`, `Fotos`, `PDF de la postulación`, `Estado`) VALUES
(1, 'María José', 'García López', 'Ingeniero de Software', '', 'Mexicana', '61271231', '1985-02-07', 'Femenino', 'Av. Insurgentes Sur #123', '+591 71923812', 'Inglés', 'ejemplo@gmail.com', '', '', 'Por Revisar'),
(2, 'Juan Carlos', 'Martínez Fernández', 'Asistente Administrativo', '', 'Colombiana', '71231287', '1990-06-20', 'Masculino', 'Calle Rivadavia #789', '+591 78533481', 'Inglés', 'usuario@hotmail.com', '', '', 'Revisado'),
(3, 'Gabriela', 'Díaz Martínez', 'Analista de Marketing', '', 'Chilena', '39992342', '1994-06-12', 'Femenino', 'Av. Libertador #456', '+34 612 345 678', '', 'gabriela_fernandez@gmail.com', '', '', 'Pendiente'),
(4, 'María Fernanda', 'López García', 'Desarrollador de Software', '', 'Mexicana', '1234567890', '1994-02-15', 'Femenino', 'Av. Juárez #123', '+52 55 1234 5678', 'Inglés', 'maria.fernanda@example.com', '', '', 'Entrevista Programad'),
(5, 'Jose Manuel', 'Martínez Rodríguez', 'Analista Financiero', '', 'Colombiana', '9876543210', '1985-05-10', 'Masculino', 'Calle Granada #456', '+57 310 123 4567', 'Inglés', 'juan.carlos@example.com', '', '', 'Rechazado');

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
  MODIFY `ID_Postulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
