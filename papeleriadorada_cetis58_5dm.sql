-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 22:45:05
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleriadorada_cetis58_5dm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `IDArticulo` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `NameArticulo` text NOT NULL,
  `Marca` varchar(200) NOT NULL,
  `PrecioActual` int(11) NOT NULL,
  `CantidadDisponible` int(11) NOT NULL,
  `FechaRegistro` date NOT NULL,
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IDArticulo`, `Foto`, `NameArticulo`, `Marca`, `PrecioActual`, `CantidadDisponible`, `FechaRegistro`, `Estado`) VALUES
(1, '1.png', 'Plumas unitarias (azul)', 'Bic', 10, 50, '2021-10-21', 'DISPONIBLE'),
(2, '2.png', 'Paquete de crayones', 'Crayola', 20, 50, '2019-11-18', 'DISPONIBLE'),
(4, '4.png', 'Paquete de Plumones', 'Crayola', 75, 50, '2020-06-18', 'DISPONIBLE'),
(5, '5.png', 'Borrador', 'Norma', 15, 50, '2020-02-03', 'DISPONIBLE'),
(6, '6.png', 'Libreta rayada (100 hojas)', 'Kiut', 40, 50, '2021-02-20', 'DISPONIBLE'),
(8, '8.png', 'Libreta cuadricula (100 hojas)', 'Scribe', 35, 50, '2021-05-12', 'DISPONIBLE'),
(11, '11.png', 'Libreta tipo Italiana (100 hojas)', 'Scribe', 200, 50, '2021-05-29', 'DISPONIBLE'),
(15, '15.png', 'Plumas unitarias (rojas)', 'Norma', 150, 50, '2021-06-13', 'DISPONIBLE'),
(16, '16.png', 'Plumas unitarias (verde)', 'Norma', 150, 50, '2021-06-13', 'DISPONIBLE'),
(24, '24.png', 'Paquete de Highlighters', 'Bic', 70, 50, '2021-10-14', 'DISPONIBLE'),
(27, '', 'Paquete de plumas (multicolores)', 'Norma', 185, 50, '2021-11-17', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IDCliente` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `APaterno` varchar(200) NOT NULL,
  `AMaterno` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `CorreoElectronico` varchar(200) NOT NULL,
  `Contrasena` varchar(200) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IDCliente`, `Foto`, `APaterno`, `AMaterno`, `Nombre`, `CorreoElectronico`, `Contrasena`, `Estado`) VALUES
(1, '1.png', 'Gutiérrez', 'Hernández', 'Tifani', 'naomi312@gmail.com', '123456', '1'),
(3, '2.png', 'Parra', 'Carranza', 'Camila', 'camila478@gmail.com', '123456', '1'),
(4, '4.png', 'Pérez', 'Gámez', 'Pablo', 'pablo243@gmail.com', '123456', '1'),
(5, '5.png', 'Hernández', 'Ayala', 'Carina', 'carian568@gmail.com', '123456', '1'),
(6, '6.png', 'Rodríguez', 'Marqués', 'Camilo', 'camilo478@gmail.com', '123456', '1'),
(11, '11.png', 'Morelos', 'Parra', 'Aaron', 'aaron467@gmail.com', '123456', '1'),
(15, '15.png', 'Rodríguez', 'Tovar', 'Elizabeth', 'elizabeth487@gmail.com', '123456', '1'),
(16, '16.png', 'Martinez', 'Herrera', 'Carlos', 'carlo167@gmail.com', '123456', '1'),
(17, '17.png', 'García', 'Ruíz', 'Gabriela', 'Gabriela375@gmail.com', '123456', '1'),
(19, '19.jpeg', 'Pérez', 'Hernández', 'Camila', 'camila345@gmail.com', '123456', '1'),
(20, '20.png', 'Calderon', 'Herrera', 'Mario', 'mario987@gmail.com', '123456', '1'),
(22, '22.png', 'Ruíz', 'Zepeda', 'Sara', 'sara@gmail.com', '123456', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quejas`
--

CREATE TABLE `quejas` (
  `IDQueja` int(11) NOT NULL,
  `APaterno` varchar(200) NOT NULL,
  `AMaterno` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `CorreoElectronico` varchar(200) NOT NULL,
  `DetalleQueja` varchar(200) NOT NULL,
  `FechaQueja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `quejas`
--

INSERT INTO `quejas` (`IDQueja`, `APaterno`, `AMaterno`, `Nombre`, `CorreoElectronico`, `DetalleQueja`, `FechaQueja`) VALUES
(1, 'Ruíz', 'Zepeda', 'Sara', 'sara@gmail.com', 'Debería de revisar la calidad de la plumas, se les acaba la tinta muy rápido', '2021-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencias`
--

CREATE TABLE `sugerencias` (
  `IDSugerencia` int(11) NOT NULL,
  `APaterno` varchar(200) NOT NULL,
  `AMaterno` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `CorreoElectronico` varchar(200) NOT NULL,
  `DetalleSugerencia` varchar(200) NOT NULL,
  `FechaSugerencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sugerencias`
--

INSERT INTO `sugerencias` (`IDSugerencia`, `APaterno`, `AMaterno`, `Nombre`, `CorreoElectronico`, `DetalleSugerencia`, `FechaSugerencia`) VALUES
(1, 'Ruíz', 'Zepeda', 'Sara', 'sara@gmail.com', 'Hola buen día, deberían agregar más artículos de pintura.', '2021-11-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `IDTarjeta` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `nombreTitular` varchar(200) NOT NULL,
  `Numero` varchar(16) NOT NULL,
  `FechaVencimiento` date NOT NULL,
  `CVC` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`IDTarjeta`, `IDCliente`, `nombreTitular`, `Numero`, `FechaVencimiento`, `CVC`, `Estado`) VALUES
(1, 19, 'Camila Perez Hernandez', '9876543210987654', '2022-01-28', 123, 1),
(2, 1, 'Tifani Gutiérrez Hernández', '1920384756657473', '2022-05-31', 204, 1),
(3, 6, 'Camilo Rodríguez Marquéz', '5544661182345689', '2022-03-30', 456, 1),
(4, 1, 'Naomi Gutiérrez Hernández', '5674893456790863', '2022-06-13', 980, 1),
(5, 17, 'Gabriela García Ruíz', '7543476587986986', '2022-02-16', 675, 1),
(6, 22, 'Sara Ruíz Zepeda', '2345678930281734', '2022-03-31', 123, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(11) NOT NULL,
  `Foto` text NOT NULL,
  `APaterno` varchar(200) NOT NULL,
  `AMaterno` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `NombreUsuario` varchar(200) NOT NULL,
  `Contrasena` varchar(200) NOT NULL,
  `Estado` varchar(30) NOT NULL COMMENT '1.ACTIVO 2.BLOQUEADO 3.INCAPACIDAD 4.BAJA',
  `Puesto` varchar(200) NOT NULL,
  `Sucursal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `Foto`, `APaterno`, `AMaterno`, `Nombre`, `NombreUsuario`, `Contrasena`, `Estado`, `Puesto`, `Sucursal`) VALUES
(1, '1.jpeg', 'Herrera', 'García', 'Marcos', 'marcos', '123456', 'ACTIVO', 'SUPERADMIN', ''),
(2, '2.jpeg', 'Valenzuela', 'Turrubiates', 'Oscar', 'oscar', '123456', 'ACTIVO', 'DUENO', ''),
(3, '3.jpeg', 'Cruz', 'Fernández', 'María', 'maria', '123456', 'ACTIVO', 'GERENTE', ''),
(4, '4.jpeg', 'Ortiz', 'Díaz', 'Teresa', 'teresa', '123456', 'ACTIVO', 'CAPTURISTA', 'TIJUANA'),
(5, '5.jpeg', 'Reyes', 'Lopéz', 'José María', 'josemaria', '123456', 'ACTIVO', 'CAPTURISTA', 'ENSENADA'),
(6, '6.jpeg', 'Gutiérrez', 'Hernández', 'Naomi', 'naomi', '123456', 'ACTIVO', 'SUPERVISOR', 'TIJUANA'),
(10, '10.jpeg', 'Morelos', 'Pérez', 'Luis', 'luis', '123456', 'ACTIVO', 'SUPERVISOR', 'ENSENADA'),
(12, '12.png', 'Villa', 'Estrada', 'Paulina', 'paulina', '123456', 'ACTIVO', 'SUPERVISOR', 'ROSARITO'),
(13, '', 'Maya', 'Sanchez', 'Kenia', 'kenia', '123456', 'ACTIVO', 'CAPTURISTA', 'ROSARITO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IDVenta` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `CantArticulos` int(11) NOT NULL,
  `Descuento` float(6,2) NOT NULL,
  `subTotal` float(6,2) NOT NULL,
  `IVA` float(6,2) NOT NULL,
  `ImporteTotal` float(6,2) NOT NULL,
  `FechaVenta` date NOT NULL,
  `metodoPago` varchar(200) NOT NULL COMMENT '1.Efectivo, 2.Tarejeta Credito, 3.Terjeta Debito',
  `infoMetodoPago` varchar(16) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  `ventaEn` varchar(200) NOT NULL COMMENT '1.MOSTRADOR, 2.WEB'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IDVenta`, `IDCliente`, `CantArticulos`, `Descuento`, `subTotal`, `IVA`, `ImporteTotal`, `FechaVenta`, `metodoPago`, `infoMetodoPago`, `Estado`, `IDUsuario`, `ventaEn`) VALUES
(19, 1, 3, 10.00, 60.00, 4.80, 64.80, '2021-10-31', 'DEBITO', '1920384756657473', 'CANCELADO', 0, 'WEB'),
(20, 6, 4, 25.00, 240.00, 19.20, 259.20, '2021-11-01', 'CREDITO', '5544661182345689', 'CONFIRMADA', 0, 'WEB'),
(21, 1, 4, 0.00, 380.00, 30.40, 410.40, '2021-11-02', 'DEBITO', '5674893456790863', 'CONFIRMADA', 0, 'WEB'),
(22, 17, 5, 20.00, 245.00, 19.60, 264.60, '2021-11-02', 'CREDITO', '7543476587986986', 'CONFIRMADA', 0, 'WEB'),
(23, 22, 2, 10.00, 135.00, 10.80, 145.80, '2021-11-05', 'DEBITO', '2345678930281734', 'CONFIRMADA', 0, 'WEB'),
(24, 22, 2, 0.00, 150.00, 12.00, 162.00, '2021-11-11', 'DEBITO', '2345678930281734', 'CONFIRMADA', 0, 'WEB'),
(25, 3, 4, 10.00, 70.00, 5.60, 75.60, '2021-11-16', 'EFECTIVO', '', 'CONFIRMADO', 4, 'MOSTRADOR'),
(29, 5, 7, 15.00, 230.00, 18.40, 248.40, '2021-11-16', 'EFECTIVO', '', 'CONFIRMADO', 5, 'MOSTRADOR'),
(30, 22, 1, 15.00, 135.00, 10.80, 145.80, '2021-11-17', 'DEBITO', '', 'CONFIRMADO', 4, 'MOSTRADOR'),
(31, 15, 2, 45.00, 315.00, 25.20, 340.20, '2021-11-17', 'CREDITO', '', 'CONFIRMADO', 10, 'MOSTRADOR'),
(32, 20, 1, 0.00, 150.00, 12.00, 162.00, '2021-11-22', 'EFECTIVO', '', 'CONFIRMADO', 13, 'MOSTRADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasdetalle`
--

CREATE TABLE `ventasdetalle` (
  `IDVentaDetalle` int(11) NOT NULL,
  `IDVenta` int(11) NOT NULL,
  `IDArticulo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` float(6,2) NOT NULL,
  `Descuento` float(6,2) NOT NULL,
  `Importe` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventasdetalle`
--

INSERT INTO `ventasdetalle` (`IDVentaDetalle`, `IDVenta`, `IDArticulo`, `Cantidad`, `Precio`, `Descuento`, `Importe`) VALUES
(1, 19, 5, 2, 15.00, 0.00, 30.00),
(2, 19, 6, 1, 40.00, 10.00, 30.00),
(3, 20, 5, 2, 15.00, 0.00, 30.00),
(4, 20, 8, 1, 35.00, 10.00, 25.00),
(5, 20, 11, 1, 200.00, 15.00, 185.00),
(6, 21, 6, 2, 40.00, 0.00, 80.00),
(7, 21, 15, 1, 150.00, 0.00, 150.00),
(8, 21, 16, 1, 150.00, 0.00, 150.00),
(9, 22, 5, 3, 15.00, 0.00, 45.00),
(10, 22, 15, 1, 150.00, 20.00, 130.00),
(11, 22, 24, 1, 70.00, 0.00, 70.00),
(12, 23, 4, 1, 75.00, 10.00, 65.00),
(13, 23, 24, 1, 70.00, 0.00, 70.00),
(14, 24, 4, 2, 75.00, 0.00, 150.00),
(15, 26, 0, 4, 20.00, 10.00, 70.00),
(16, 27, 0, 4, 20.00, 10.00, 70.00),
(17, 28, 2, 4, 20.00, 10.00, 70.00),
(18, 29, 8, 7, 35.00, 15.00, 230.00),
(19, 30, 15, 1, 150.00, 15.00, 135.00),
(20, 31, 27, 2, 180.00, 45.00, 315.00),
(21, 32, 16, 1, 150.00, 0.00, 150.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`IDArticulo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `quejas`
--
ALTER TABLE `quejas`
  ADD PRIMARY KEY (`IDQueja`);

--
-- Indices de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  ADD PRIMARY KEY (`IDSugerencia`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`IDTarjeta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IDVenta`);

--
-- Indices de la tabla `ventasdetalle`
--
ALTER TABLE `ventasdetalle`
  ADD PRIMARY KEY (`IDVentaDetalle`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IDArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `quejas`
--
ALTER TABLE `quejas`
  MODIFY `IDQueja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sugerencias`
--
ALTER TABLE `sugerencias`
  MODIFY `IDSugerencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `IDTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IDVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ventasdetalle`
--
ALTER TABLE `ventasdetalle`
  MODIFY `IDVentaDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
