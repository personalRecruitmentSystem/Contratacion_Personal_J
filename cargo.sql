-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-03-2024 a las 07:45:16
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
-- Base de datos: `cargo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID_Cargo` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Codigo_Cargo` varchar(10) NOT NULL,
  `Departamento` varchar(20) NOT NULL,
  `Descripcion_Cargo` varchar(100) NOT NULL,
  `Nivel_De_Formacion_Requerido` varchar(100) NOT NULL,
  `Horas_De_Trabajo` int(11) NOT NULL,
  `Requisitos_De_Tiempo_Experiencia` varchar(15) NOT NULL,
  `Sueldo` float NOT NULL,
  `Nro_Empleados_Debe_Tener` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID_Cargo`, `Nombre`, `Codigo_Cargo`, `Departamento`, `Descripcion_Cargo`, `Nivel_De_Formacion_Requerido`, `Horas_De_Trabajo`, `Requisitos_De_Tiempo_Experiencia`, `Sueldo`, `Nro_Empleados_Debe_Tener`) VALUES
(1, 'Desarrollo', 'IS0001', 'Dep desarrollo', 'Area de desarrollo de software', 'Ing. en informatica o ing en sistemas', 35, '3 años', 5000.56, 10),
(2, 'Gerente', 'GP001', 'Dep de proyectos', 'Responsable de la gestion de proyectos', 'Licenciatura', 40, '5 años', 6000.8, 4),
(3, 'Administrativo', 'AA003', 'Dep administrativo', 'Apoyo en tareas administrativas', 'Educacion media', 30, '1 año', 3500, 15),
(4, 'Analista', 'SS002', 'Dep Marketing', 'Analista de Marketing', 'Licenciatura', 35, '3 años', 5500, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocatoria`
--

CREATE TABLE `convocatoria` (
  `ID_convocatoria` int(11) NOT NULL,
  `Fch_inicio` date NOT NULL,
  `Fch_fin` date NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convocatoria`
--

INSERT INTO `convocatoria` (`ID_convocatoria`, `Fch_inicio`, `Fch_fin`, `Descripcion`) VALUES
(1, '2023-04-01', '2024-03-30', 'Se require un desarrolador de software para el area  de desarrollo con años de experiencia '),
(2, '2023-07-01', '2027-03-19', 'Se require un getente para el area de RRHH'),
(3, '2023-11-14', '2024-04-17', 'Se necesita un analista para el area de Marketing'),
(4, '2024-03-31', '2024-04-10', 'Se require un contador con buena experiencia laboral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_postulacion`
--

CREATE TABLE `detalle_postulacion` (
  `ID_Cargo` int(11) NOT NULL,
  `ID_Postulante` int(11) NOT NULL,
  `Fecha_de_Postulacion` date DEFAULT NULL,
  `PDF_Postulacion` varchar(50) NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_postulacion`
--

INSERT INTO `detalle_postulacion` (`ID_Cargo`, `ID_Postulante`, `Fecha_de_Postulacion`, `PDF_Postulacion`, `Estado`) VALUES
(1, 1, '2023-11-08', 'por definir..................................!!!', 'Pendiente'),
(2, 1, '2023-11-08', 'por definir..................................!!!', 'Aceptado'),
(3, 2, '2024-01-12', 'por definir..................................!!!', 'Aceptado'),
(4, 3, '2024-03-05', 'por definir..................................!!!', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_Empleado` int(11) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellido_Paterno` varchar(40) NOT NULL,
  `Apellido_Materno` varchar(40) NOT NULL,
  `fch_Nacimiento` date NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Genero` varchar(10) NOT NULL,
  `numero_Telefono` int(11) NOT NULL,
  `Correo_Electronico` varchar(40) NOT NULL,
  `fch_de_Contratacion` date NOT NULL,
  `Nro_Seguro_Social` varchar(40) NOT NULL,
  `Lvl_De_Formacion` varchar(40) NOT NULL,
  `Tiempo_de_Contrato` varchar(40) NOT NULL,
  `ID_Cargo` int(11) NOT NULL,
  `ID_convocatoria` int(11) NOT NULL,
  `fk_SubCargoID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_Empleado`, `Nombres`, `Apellido_Paterno`, `Apellido_Materno`, `fch_Nacimiento`, `Direccion`, `Genero`, `numero_Telefono`, `Correo_Electronico`, `fch_de_Contratacion`, `Nro_Seguro_Social`, `Lvl_De_Formacion`, `Tiempo_de_Contrato`, `ID_Cargo`, `ID_convocatoria`, `fk_SubCargoID`) VALUES
(1, 'Juan', 'Perez', 'Garcia', '2014-03-10', 'Calle 123', 'Masculino', 5896134, 'juan.perez@gmail.com', '2024-03-01', '5484-98', 'Licenciadom en ingenieria de sistemas', 'Indefinido', 1, 1, 4),
(2, 'Maria', 'Ganzales', 'Rodrigues', '2004-03-09', 'Avenida Principal 456', 'Femenino', 986335, 'maria.gonzales@gmail.com', '2024-03-01', '987-632-65', 'licenciado en administracion de empresas', 'Indefinido', 3, 4, 3),
(3, 'Carlos', 'Martinez', 'Lopez', '2004-03-25', 'Calle Libertad 987', 'Masculino', 9862531, 'carlos.mart@gmail.com', '2024-03-15', '987-632-68', 'Licenciadom en ingenieria de sistemas', 'Indefinido', 4, 1, 1),
(4, 'Ana', 'López', 'Sánchez', '1990-05-15', 'Calle 456, Colonia Centro', 'Femenino', 987654321, 'ana.lopez@example.com', '2023-09-12', '123-45-6789', 'Licenciatura en Contaduría Pública', 'Indefinido', 2, 3, 10),
(5, 'Luis', 'Rodríguez', 'Pérez', '1985-11-20', 'Avenida Principal 789', 'Masculino', 123456789, 'luis.rodriguez@example.com', '2022-03-12', '987-65-4321', 'Ingeniería Industrial', 'Indefinido', 2, 2, 11),
(6, 'Patricia', 'García', 'Pérez', '1993-09-25', 'Calle del Bosque 123', 'Femenino', 987123456, 'patricia.garcia@example.com', '2022-09-16', '456-78-9123', 'Maestría en Administración de Empresas', 'Indefinido', 3, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `ID_Experiencia` int(11) NOT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_FIn` date DEFAULT NULL,
  `Cargo` varchar(20) NOT NULL,
  `Descripcion` varchar(400) NOT NULL,
  `ID_Postulante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`ID_Experiencia`, `Fecha_Inicio`, `Fecha_FIn`, `Cargo`, `Descripcion`, `ID_Postulante`) VALUES
(1, '2023-03-05', '2023-06-21', 'Administrador', 'Encargado de controlar y administrar eficientemente los sistemas y recursos informáticos de la empresa. Responsable de garantizar la seguridad y la integridad de los datos, así como de optimizar los procesos internos para mejorar la productividad y eficacia de las operaciones', 1),
(2, '2022-03-13', '2022-09-26', 'Coordinador de Proye', 'Encargado de liderar y supervisar la ejecución de proyectos, desde la fase de planificación hasta la entrega final. Coordina a los equipos multidisciplinarios, asigna tareas y recursos, y garantiza el cumplimiento de los objetivos y plazos establecidos.', 1),
(3, '2020-03-05', '2021-03-12', 'Analista de Sistemas', 'Responsable de analizar, diseñar y desarrollar soluciones informáticas para mejorar los procesos empresariales.', 2),
(4, '2021-03-06', '2022-03-07', 'Especialista en Segu', 'Encargado de proteger la infraestructura tecnológica y los datos de la empresa contra amenazas internas y externas.', 3),
(5, '2022-03-20', '2023-03-21', 'Gerente de Proyecto', 'Responsable de planificar, ejecutar y controlar proyectos para alcanzar objetivos específicos dentro de plazos y presupuestos establecidos. ', 3),
(6, '2023-04-04', '2024-02-05', 'Supervisor de Ventas', 'Dirige y supervisa el equipo de ventas para alcanzar los objetivos de ventas y de ingresos.', 3),
(7, '1983-07-13', '2021-10-06', 'Iusto accusamus labo', 'Totam velit et non ', 15),
(8, '1983-07-13', '2021-10-06', 'Iusto accusamus labo', 'Totam velit et non ', 16),
(9, '2021-12-19', '2014-04-10', 'Magna repudiandae se', 'Veniam ut et sint f', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `ID_Formacion` int(11) NOT NULL,
  `Nivel_Educacion` varchar(100) NOT NULL,
  `Institucion` varchar(100) NOT NULL,
  `Anio_Inicio` year(4) DEFAULT NULL,
  `Anio_Fin` year(4) DEFAULT NULL,
  `ID_Postulante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`ID_Formacion`, `Nivel_Educacion`, `Institucion`, `Anio_Inicio`, `Anio_Fin`, `ID_Postulante`) VALUES
(1, 'Bachillerato', 'Colegio Nacional', '2015', '2018', 1),
(2, 'Licenciatura', 'Universidad Nacional Autónoma de México (UNAM)', '2018', '2022', 1),
(3, 'Bachillerato', 'Instituto Tecnológico de Buenos Aires (ITBA)', '2014', '2017', 2),
(4, 'Licenciatura', 'Universidad de Buenos Aires (UBA)', '2018', '2022', 2),
(5, 'Diplomado', 'Universidad Torcuato Di Tella (UTDT)', '2023', '2024', 2),
(6, 'Bachillerato', 'Instituto Secundario del Sur', '2010', '2014', 3),
(7, 'Licenciatura', 'Universidad Nacional de México (UNM)', '2015', '2019', 3),
(8, 'Diplomado', 'Instituto Tecnológico Mexicano (ITM)', '2020', '2021', 3),
(9, 'Maestría', 'Universidad Metropolitana (UM)', '2022', '2024', 3),
(12, '1', '11', '2001', '2001', 13),
(13, '2', '2', '2002', '2002', 13),
(14, '4', '4', '2004', '2004', 14),
(15, '5', '5', '2005', '2005', 14),
(16, 'Sed molestiae et sun', 'Dolorum consequuntur', '0000', '0000', 15),
(17, 'Architecto dolor mod', 'Consequatur labore ', '0000', '0000', 15),
(18, 'Sed molestiae et sun', 'Dolorum consequuntur', '0000', '0000', 16),
(19, 'Architecto dolor mod', 'Consequatur labore ', '0000', '0000', 16),
(20, '1111', '111', '0000', '0000', 17),
(21, '22222', '22222', '2000', '2001', 17),
(22, '1111', '111', '0000', '0000', 18),
(23, '22222', '22222', '2000', '2001', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulante`
--

CREATE TABLE `postulante` (
  `ID_Postulante` int(11) NOT NULL,
  `Nombres` varchar(40) NOT NULL,
  `Apellido_Paterno` varchar(40) NOT NULL,
  `Apellido_Materno` varchar(40) NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `Tipo_Documento` varchar(40) NOT NULL,
  `Nro_Documento` int(11) NOT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Sexo` varchar(15) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Celular_Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postulante`
--

INSERT INTO `postulante` (`ID_Postulante`, `Nombres`, `Apellido_Paterno`, `Apellido_Materno`, `Foto`, `Tipo_Documento`, `Nro_Documento`, `Fecha_Nacimiento`, `Sexo`, `Direccion`, `Correo`, `Celular_Telefono`) VALUES
(1, 'Juan Carlos', 'Martinez', 'Fernandez', 'uploads/hombre_1.png', 'CI', 16712351, '1985-02-17', 'Masculino', 'Calle Rivadavia #789', 'usuario@hotmail.com', 71234567),
(2, 'Maria Jose', 'Garcia', 'Lopez', 'uploads/mujer_1.png', 'Pasaporte', 17231651, '1978-02-01', 'Femenino', 'Av. Insurgentes Sur #123', 'ejemplo1@gmail.com', 72345678),
(3, 'Gabriela', 'Diaz', 'Martinez', 'uploads/mujer_2.png', 'CI', 21115135, '1991-02-25', 'Femenino', 'Av. Libertador #456', 'gabriela_fernandez@gmail.com', 73456789),
(11, 'ddddddddddd', 'aaaaa', 'sssssssss', '../uploads/aaaaa_sssssssss_ddddddddddd.png', 'Pasaporte', 24, '1986-06-05', 'Commodo explica', 'Quia nostrud harum m', 'Et necessitatibus a ', 12),
(12, 'ddddddddddd', 'aaaaa', 'sssssssss', '../uploads/aaaaa_sssssssss_ddddddddddd.png', 'Pasaporte', 24, '1986-06-05', 'Commodo explica', 'Quia nostrud harum m', 'Et necessitatibus a ', 12),
(13, 'ddddddddddd', 'aaaaa', 'sssssssss', '../uploads/aaaaa_sssssssss_ddddddddddd.png', 'Pasaporte', 24, '1986-06-05', 'Commodo explica', 'Quia nostrud harum m', 'Et necessitatibus a ', 12),
(14, '1111', '1111', '1111', '../uploads/1111_1111_1111.png', 'CI', 16, '1995-10-11', 'Ipsam irure por', 'Dignissimos nobis be', 'Rerum sit est offic', 18),
(15, '5555555', '5555555', '55555', '../uploads/5555555_55555_5555555.png', 'Pasaporte', 55, '1988-12-01', 'Porro dolorem q', 'Nisi inventore volup', 'Fugiat sit dolorib', 71),
(16, '5555555', '5555555', '55555', '../uploads/5555555_55555_5555555.png', 'Pasaporte', 55, '1988-12-01', 'Porro dolorem q', 'Nisi inventore volup', 'Fugiat sit dolorib', 71),
(17, 'qqqqq', 'qqqq', 'qqqqqq', '../uploads/qqqq_qqqqqq_qqqqq.png', 'Pasaporte', 10, '1998-10-16', 'Quo deserunt ve', 'Delectus ea dolores', 'Excepturi magna quia', 23),
(18, 'qqqqq', 'qqqq', 'qqqqqq', '../uploads/qqqq_qqqqqq_qqqqq.png', 'Pasaporte', 10, '1998-10-16', 'Quo deserunt ve', 'Delectus ea dolores', 'Excepturi magna quia', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_de_trabajo`
--

CREATE TABLE `registro_de_trabajo` (
  `ID_RegistroTrabajo` int(11) NOT NULL,
  `Dias_No_Trabajados` int(11) NOT NULL,
  `Dias_Trabajados` int(11) NOT NULL,
  `Dias_Feriado` int(11) NOT NULL,
  `Dias_Vacaciones` int(11) NOT NULL,
  `ID_Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_de_trabajo`
--

INSERT INTO `registro_de_trabajo` (`ID_RegistroTrabajo`, `Dias_No_Trabajados`, `Dias_Trabajados`, `Dias_Feriado`, `Dias_Vacaciones`, `ID_Empleado`) VALUES
(1, 2, 22, 1, 0, 3),
(2, 0, 20, 2, 0, 2),
(3, 3, 18, 0, 1, 1),
(4, 3, 24, 2, 1, 4),
(5, 1, 28, 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_cargo`
--

CREATE TABLE `sub_cargo` (
  `ID_Sub_Cargo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `ID_Cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sub_cargo`
--

INSERT INTO `sub_cargo` (`ID_Sub_Cargo`, `Nombre`, `ID_Cargo`) VALUES
(1, 'FrontEnd', 1),
(2, 'BackEnd', 1),
(3, 'Finanzas', 3),
(4, 'Analista de Riesgos', 4),
(5, 'Analista de Datos', 4),
(6, 'FullStack', 1),
(7, 'Gerente de Ventas', 2),
(8, 'Gerente de Marketing', 2),
(9, 'Desarrolo de App Web', 1),
(10, 'Gerente Financiero', 2),
(11, 'Gerente de Calidad', 2),
(12, 'Logística', 3),
(13, 'Servicio al Cliente', 3),
(14, 'Analista de Negocios', 4),
(15, 'Soporte Tecnico', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uinion`
--

CREATE TABLE `uinion` (
  `ID_convocatoria` int(11) NOT NULL,
  `ID_Cargo` int(11) NOT NULL,
  `Nro_Vacantes` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `comentarios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `uinion`
--

INSERT INTO `uinion` (`ID_convocatoria`, `ID_Cargo`, `Nro_Vacantes`, `estado`, `comentarios`) VALUES
(1, 1, 2, 'Cerrada', 'Las entrevistas están en proceso. Se espera seleccionar a los candidatos'),
(1, 2, 5, 'Cerrada', '...'),
(2, 1, 10, 'Cerrada', '...'),
(2, 2, 7, 'Cerrada', '...'),
(2, 3, 1, 'Cerrada', 'Todas las vacantes han sido cubiertas'),
(3, 4, 3, 'Cerrada', 'Se espera cubrir las vacantes antes del final del mes'),
(4, 1, 5, 'Abierta', '...'),
(4, 2, 3, 'Abierta', '...'),
(4, 3, 7, 'Abierta', '...'),
(4, 4, 6, 'Abierta', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_Usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `contraseña` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`id_Usuario`, `nombre`, `contraseña`) VALUES
(1, 'armando', 12345),
(2, 'jason', 1234),
(3, 'maria', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID_Cargo`);

--
-- Indices de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  ADD PRIMARY KEY (`ID_convocatoria`);

--
-- Indices de la tabla `detalle_postulacion`
--
ALTER TABLE `detalle_postulacion`
  ADD PRIMARY KEY (`ID_Cargo`,`ID_Postulante`),
  ADD KEY `ID_Cargo` (`ID_Cargo`,`ID_Postulante`),
  ADD KEY `ID_Postulante` (`ID_Postulante`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_Empleado`),
  ADD KEY `ID_Cargo` (`ID_Cargo`),
  ADD KEY `ID_convocatoria` (`ID_convocatoria`),
  ADD KEY `fk_SubCargoID` (`fk_SubCargoID`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`ID_Experiencia`),
  ADD KEY `ID_Postulante` (`ID_Postulante`);

--
-- Indices de la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`ID_Formacion`),
  ADD KEY `ID_Postulante` (`ID_Postulante`);

--
-- Indices de la tabla `postulante`
--
ALTER TABLE `postulante`
  ADD PRIMARY KEY (`ID_Postulante`);

--
-- Indices de la tabla `registro_de_trabajo`
--
ALTER TABLE `registro_de_trabajo`
  ADD PRIMARY KEY (`ID_RegistroTrabajo`),
  ADD KEY `ID_Empleado` (`ID_Empleado`),
  ADD KEY `ID_Empleado_2` (`ID_Empleado`);

--
-- Indices de la tabla `sub_cargo`
--
ALTER TABLE `sub_cargo`
  ADD PRIMARY KEY (`ID_Sub_Cargo`),
  ADD KEY `ID_Cargo` (`ID_Cargo`);

--
-- Indices de la tabla `uinion`
--
ALTER TABLE `uinion`
  ADD PRIMARY KEY (`ID_convocatoria`,`ID_Cargo`),
  ADD KEY `ID_Cargo` (`ID_Cargo`),
  ADD KEY `ID_convocatoria` (`ID_convocatoria`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `convocatoria`
--
ALTER TABLE `convocatoria`
  MODIFY `ID_convocatoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `ID_Experiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `formacion`
--
ALTER TABLE `formacion`
  MODIFY `ID_Formacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `postulante`
--
ALTER TABLE `postulante`
  MODIFY `ID_Postulante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `registro_de_trabajo`
--
ALTER TABLE `registro_de_trabajo`
  MODIFY `ID_RegistroTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sub_cargo`
--
ALTER TABLE `sub_cargo`
  MODIFY `ID_Sub_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_postulacion`
--
ALTER TABLE `detalle_postulacion`
  ADD CONSTRAINT `detalle_postulacion_ibfk_1` FOREIGN KEY (`ID_Cargo`) REFERENCES `cargo` (`ID_Cargo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_postulacion_ibfk_2` FOREIGN KEY (`ID_Postulante`) REFERENCES `postulante` (`ID_Postulante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `Empleado_ibfk_1` FOREIGN KEY (`ID_Cargo`) REFERENCES `cargo` (`ID_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Empleado_ibfk_2` FOREIGN KEY (`ID_convocatoria`) REFERENCES `convocatoria` (`ID_convocatoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SubCargoID` FOREIGN KEY (`fk_SubCargoID`) REFERENCES `sub_cargo` (`ID_Sub_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `experiencia_ibfk_1` FOREIGN KEY (`ID_Postulante`) REFERENCES `postulante` (`ID_Postulante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD CONSTRAINT `formacion_ibfk_1` FOREIGN KEY (`ID_Postulante`) REFERENCES `postulante` (`ID_Postulante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_de_trabajo`
--
ALTER TABLE `registro_de_trabajo`
  ADD CONSTRAINT `Registro_De_Trabajo_ibfk_1` FOREIGN KEY (`ID_Empleado`) REFERENCES `empleado` (`ID_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_cargo`
--
ALTER TABLE `sub_cargo`
  ADD CONSTRAINT `Sub_Cargo_ibfk_1` FOREIGN KEY (`ID_Cargo`) REFERENCES `cargo` (`ID_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `uinion`
--
ALTER TABLE `uinion`
  ADD CONSTRAINT `uinion_ibfk_1` FOREIGN KEY (`ID_Cargo`) REFERENCES `cargo` (`ID_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uinion_ibfk_2` FOREIGN KEY (`ID_convocatoria`) REFERENCES `convocatoria` (`ID_convocatoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
