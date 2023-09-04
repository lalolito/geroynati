-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2023 a las 00:18:37
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hndcs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double(200,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `img`, `codigo`, `nombre`, `precio`) VALUES
(1, 'vista/img/blusa1.jpg', 'HJUB', 'blusa', 20.000),
(2, 'vista/img/blusa2.jpg', 'FYFY', 'blusa2', 25.000),
(3, 'vista/img/blusa2.jpg\r\n', 'UYGH', 'gvfbt', 25.000),
(4, 'vista/img/blusa2.jpg\r\n', 'HUY', 'gvfbt', 25.000),
(5, 'vista/img/blusa2.jpg\r\n', 'AWW', 'gvfbt', 25.000),
(6, 'vista/img/blusa2.jpg\r\n', 'WWW', 'gvfbt', 25.000),
(7, 'vista/img/blusa2.jpg\r\n', 'QWW', 'gvfbt', 25.000),
(8, 'vista/img/blusa2.jpg\r\n', 'EWW', 'gvfbt', 25.000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `anotacion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `nombre`, `anotacion`, `fecha`) VALUES
(1, 'gtg', ' grt', '2023-08-11 20:36:15'),
(2, 'aaaaaaaa', ' aaaaaaaaaaa', '2023-08-16 18:03:10'),
(3, 'fregfr', ' tgrt', '2023-08-25 23:56:03'),
(4, 'deisy', ' hola\r\n', '2023-09-01 18:49:29'),
(5, 'Juan', 'Â¿Con que metodos de pago puedo comprar la ropa?', '2023-09-01 21:34:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crud`
--

CREATE TABLE `crud` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `crud`
--

INSERT INTO `crud` (`cod`, `nombre`, `correo`, `tel`) VALUES
(115, 'uwu', 'uwu@uwu', 11166),
(116, 'nally', 'tgr@rfgr', 5435);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrarse`
--

CREATE TABLE `registrarse` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Apellidos` varchar(30) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registrarse`
--

INSERT INTO `registrarse` (`id`, `Nombre`, `Apellidos`, `Telefono`, `Correo`, `Password`, `rol_id`) VALUES
(1, 'gggggggg', 'ggggggggg', 6666, 'llllll@cccccc', 'uwu', 1),
(2, 'aaaa', 'aaaaa', 333, 'fdfr@fgrefg', 'grre', NULL),
(3, 'uww', 'grt', 56464, 'nnnnnnnn@nnnnnnnnn', 'aa', NULL),
(4, 'eeeeeeee', 'eeeeeeeee', 11111111, 'qqqq@aaaaaaaa', 'pp', NULL),
(5, 'juan alimaÃ±a', 'alimaÃ±a', 2147483647, 'jaun2023@gmail.com', '123456', NULL),
(6, 'feerif', 'rftgrf', 54654, 'ferre@fgrfgtr', 'grtgtr5gr5', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `registrarse`
--
ALTER TABLE `registrarse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `crud`
--
ALTER TABLE `crud`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `registrarse`
--
ALTER TABLE `registrarse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registrarse`
--
ALTER TABLE `registrarse`
  ADD CONSTRAINT `registrarse_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
