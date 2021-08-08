-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2021 a las 22:44:10
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saludvida`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `codigo_cita` int(11) NOT NULL,
  `cedula_paciente` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cedula_medico` int(11) NOT NULL,
  `tipo_cita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `cedula_medico` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `n_colegiado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`cedula_medico`, `nombre`, `apellido`, `edad`, `direccion`, `telefono`, `correo`, `sexo`, `especialidad`, `n_colegiado`) VALUES
(6516515, 'Steven', 'Henrrique', 50, 'Calle 24', 2147483647, 'camiloternera_26@hotmail.com', 'M', 'Odontologo', 5651565),
(1002000539, 'Andrea Carolina', 'Nevado Lopez', 20, 'CALLE 74 # 65-30', 2147483647, 'carolinanevado30@gmail.com', 'F', 'Neonato', 5616165),
(1146544136, '    Angel David    ', '    Ternera Nevado    ', 21, '    CALLE 74 # 65-30    ', 3654, 'maaatriz91@gmail.com', 'M', ' Neonato', 5646516),
(1193038435, 'Camilo Andres', 'Ternera Duque', 24, 'CALLE 74 # 65-30', 25467, 'camiloterneraduque@gmail.com', 'M', 'Odontologo', 12165);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `cedula_paciente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sexo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`cedula_paciente`, `nombre`, `apellido`, `edad`, `direccion`, `telefono`, `correo`, `sexo`) VALUES
(46565151, '  Rosaira  ', ' Duque ', 42, '  CALLE 40 # 24 - 86  ', 1231165, 'rosairaduque@hotmail.com', 'F'),
(1146544136, 'Angel', 'Nevado', 16, 'CALLE 74 # 65-30', 2147483647, 'maaatriz91@gmail.com', 'Ma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(1) NOT NULL,
  `nom_rol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nom_rol`) VALUES
(1, 'admin'),
(2, 'medico'),
(3, 'paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `cedula_usuario` int(11) NOT NULL,
  `password_user` varchar(70) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula_usuario`, `password_user`, `id_rol`) VALUES
(1, 1193038435, 'Camilo123', 2),
(2, 1146544136, 'Angel123', 1),
(3, 1002000539, 'Andrea123', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`codigo_cita`),
  ADD KEY `cedula_paciente` (`cedula_paciente`),
  ADD KEY `cedula_medico` (`cedula_medico`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`cedula_medico`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`cedula_paciente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula_usuario` (`cedula_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `codigo_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`cedula_paciente`) REFERENCES `pacientes` (`cedula_paciente`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`cedula_medico`) REFERENCES `medicos` (`cedula_medico`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
