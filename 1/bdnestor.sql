-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 19:48:51
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
-- Base de datos: `bdnestor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_distrito` int(11) DEFAULT NULL,
  `nombre_distrito` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_distrito`, `nombre_distrito`) VALUES
(1, 'Cotahuma'),
(2, 'San Antonio'),
(3, 'Miraflores'),
(4, 'Sopocachi'),
(5, 'Villa Fatima'),
(6, 'San Jorge'),
(7, 'San Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `ci`, `telefono`, `correo`) VALUES
(1, 'Andrés', 'Pérez', '8153157', '64133711', 'andrés.pérez@yahoo.com'),
(2, 'David', 'Fernández', '4593996', '66141353', 'david.fernández@gmail.com'),
(3, 'Ana', 'Hernández', '1960174', '68638435', 'ana.hernández@yahoo.com'),
(4, 'María', 'Pérez', '2740245', '76810261', 'maría.pérez@outlook.com'),
(5, 'Ana', 'Ruiz', '4875502', '61111721', 'ana.ruiz@gmail.com'),
(6, 'Pedro', 'Hernández', '8557183', '75166120', 'pedro.hernández@yahoo.com'),
(7, 'José', 'Sánchez', '4993354', '61277091', 'josé.sánchez@yahoo.com'),
(8, 'Marta', 'Morales', '6369530', '68954355', 'marta.morales@hotmail.com'),
(9, 'María', 'Pérez', '4235039', '77667594', 'maría.pérez@hotmail.com'),
(10, 'Miguel', 'García', '4133958', '79600842', 'miguel.garcía@gmail.com'),
(11, 'Andrés', 'Gómez', '6386478', '70849347', 'andrés.gómez@hotmail.com'),
(12, 'Carlos', 'Fernández', '9794462', '70246117', 'carlos.fernández@hotmail.com'),
(13, 'Andrés', 'Rodríguez', '8657176', '75605556', 'andresrodriguez@yahoo.com'),
(14, 'Lucía', 'Vargas', '2809715', '62305435', 'luciavargas@hotmail.com'),
(15, 'Juan', 'Vargas', '7327646', '60802638', 'juanvargas@outlook.com'),
(19, 'Nestor ', 'Apaza', '8470251', '76265957', 'pentex@gmail.com'),
(20, 'Rosa', 'Calle', '9494666', '79633928', 'rosa@gmail.com'),
(24, 'Nicolas', 'Maldini', '61697979', '794616549', 'mal@gmail.com'),
(25, 'Ethan ', 'Winters', '498746', '79464979', 're7@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE `propiedad` (
  `id_propiedad` int(11) NOT NULL,
  `zona` varchar(30) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `codigo_catastral` varchar(30) DEFAULT NULL,
  `distrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`id_propiedad`, `zona`, `id_persona`, `codigo_catastral`, `distrito`) VALUES
(1, 'Miraflores', 20, '112345', 1),
(2, 'Sopocachi', 13, '231567', 1),
(3, 'Achumani', 15, '154879', 6),
(4, 'Calacoto', 20, '312456', 18),
(5, 'San Pedro', 5, '274321', 2),
(6, 'Villa Fátima', 6, '193876', 7),
(7, 'El Alto', 7, '243765', 8),
(8, 'Obrajes', 8, '178432', 3),
(9, 'Alto Obrajes', 9, '311287', 14),
(10, 'Cota Cota', 10, '219753', 6),
(11, 'Sopocachi', 14, '216466', 2),
(12, 'Obrajes', 12, '264976', 3),
(13, 'Obrajes', 19, '316468', 3),
(16, 'Jardines de San Pedro', 24, '3164979', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `ci_persona` varchar(30) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contrasena`, `rol`, `ci_persona`) VALUES
(5, 'nestor', 'pentex78', 'funcionario', '8470251'),
(6, 'rosa', 'rose', 'usuario', '9494666'),
(10, 'nico', 'maldini', 'usuario', '61697979');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `id_zona` int(11) DEFAULT NULL,
  `id_distrito` int(11) DEFAULT NULL,
  `nombre_zona` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona`
--

INSERT INTO `zona` (`id_zona`, `id_distrito`, `nombre_zona`) VALUES
(1, 1, 'Villa Armonia'),
(2, 1, '23 de Marzo'),
(3, 1, 'Las Lomas'),
(4, 1, 'Pura Pura'),
(5, 2, 'San Antonio'),
(6, 2, 'Villa Salome'),
(7, 2, 'Villa Esperanza'),
(8, 2, 'El Carmen'),
(9, 3, 'Miraflores Norte'),
(10, 3, 'Santa Rosa'),
(11, 3, 'San Miguel'),
(12, 3, 'Florida'),
(13, 4, 'Sopocachi'),
(14, 4, 'Rosas Pampa'),
(15, 4, 'El Tejar'),
(16, 4, 'El Albo'),
(17, 5, 'Villa Fatima'),
(18, 5, 'Villa Duran'),
(19, 5, 'Abaroa'),
(20, 5, 'El Alto'),
(21, 6, 'San Jorge'),
(22, 6, 'Alto Lima'),
(23, 6, 'Los Pinos'),
(24, 6, 'La Merced'),
(25, 7, 'San Juan'),
(26, 7, '24 de Septiembre'),
(27, 7, 'Jardines de San Pedro'),
(28, 7, 'Alto Los Pinos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  ADD PRIMARY KEY (`id_propiedad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `propiedad`
--
ALTER TABLE `propiedad`
  MODIFY `id_propiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
