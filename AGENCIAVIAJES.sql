-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 21:17:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `callesCliente` varchar(50) NOT NULL,
  `coloniaCliente` varchar(50) NOT NULL,
  `codigoPostal` varchar(10) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `usuariosId` int(11) NOT NULL,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `callesCliente`, `coloniaCliente`, `codigoPostal`, `pais`, `usuariosId`, `usuarioModifica`, `fechaModifica`, `estatus`) VALUES
(3, 'Calle S49AAA', 'Quitumbe1', '2222222', 'Chile', 16, 1, '2023-05-24 17:35:11', 1),
(7, 'calle111111111111', 'colonia', '234234', 'Ecuador', 26, 1, '2023-05-30 00:34:52', 1),
(11, 's3838', 'Colonia Pueba', '2342323', 'Bolivia', 31, 0, '2023-05-30 15:28:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `idDestino` int(11) NOT NULL,
  `destino` varchar(40) NOT NULL,
  `precioDestino` decimal(10,2) NOT NULL,
  `duracion` varchar(15) NOT NULL,
  `img` varchar(120) NOT NULL,
  `descripcion` longtext NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`idDestino`, `destino`, `precioDestino`, `duracion`, `img`, `descripcion`, `estatus`, `usuarioModifica`, `fechaModifica`) VALUES
(2, 'Tour Turkia', '450.00', '5 dias', 'destinosimg_ebfab6c5b5f5f5c138b7c04bf06862b5.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2023-05-24 22:28:13'),
(3, 'Tour Caribe', '760.89', '7 dias', 'destinosimg_f5118d9f35a53cfa976c242d826f96f3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2023-05-24 22:29:38'),
(4, 'Tour M&eacute;xico ', '1200.00', '10 dias', 'destinosimg_5f1623b8172c5f5e2a268ad97e407a46.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, 1, '2023-05-24 22:40:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_hotel`
--

CREATE TABLE `direccion_hotel` (
  `idDireccion` int(11) NOT NULL,
  `calles` varchar(30) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `pais` varchar(15) NOT NULL,
  `hotelesId` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion_hotel`
--

INSERT INTO `direccion_hotel` (`idDireccion`, `calles`, `colonia`, `cp`, `pais`, `hotelesId`, `estatus`) VALUES
(11, 'aaa', 's3838111', '34534', 'Honduras', 12, 1),
(14, 'sdf3454', 'Colonia Pueba', '345345', 'M&eacute;xico', 15, 1),
(15, 'test editado', 'editado', '123423432', 'Guatemala', 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idHotel`, `estatus`, `nombre`, `telefono`, `usuarioModifica`, `fechaModifica`) VALUES
(12, 1, 'Hotel Punta Arenas', '23123123', 1, '2023-05-25 22:56:39'),
(15, 1, 'Holel Monte Verde', '5345345345', 1, '2023-05-25 23:58:44'),
(16, 1, 'test', '234234', 1, '2023-05-26 21:39:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `clienteReserva` int(11) NOT NULL,
  `hotelReserva` int(11) NOT NULL,
  `destinoReserva` int(11) NOT NULL,
  `llegada` datetime NOT NULL,
  `salida` datetime NOT NULL,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estatus` int(1) NOT NULL DEFAULT 1,
  `matriculaTransporte` varchar(15) NOT NULL,
  `modeloTransporte` varchar(11) NOT NULL,
  `tipoTransporte` varchar(15) NOT NULL,
  `operador` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `clienteReserva`, `hotelReserva`, `destinoReserva`, `llegada`, `salida`, `usuarioModifica`, `fechaModifica`, `estatus`, `matriculaTransporte`, `modeloTransporte`, `tipoTransporte`, `operador`) VALUES
(18, 3, 12, 1, '2023-05-17 10:08:00', '2023-05-30 10:08:00', 1, '2023-05-26 15:09:04', 1, 'N123AB', 'Boeing 737', 'Boeing', 'test'),
(19, 3, 12, 2, '2023-05-25 16:47:00', '2023-05-30 16:47:00', 1, '2023-05-26 21:47:18', 1, 'N123AB', 'Boeing 737', 'Boeing', 'test'),
(20, 3, 12, 18, '2023-05-26 17:02:00', '2023-05-30 17:02:00', 1, '2023-05-26 22:02:24', 1, 'N123AB', 'Boeing 737', 'irbus A350', 'test'),
(22, 11, 12, 22, '2023-05-30 10:30:00', '2023-06-07 10:30:00', 1, '2023-05-30 15:31:05', 1, 'N123AB', 'irbus A350', 'Boeing', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(20) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`, `estatus`) VALUES
(1, 'Administrador', 1),
(2, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_hotel`
--

CREATE TABLE `servicio_hotel` (
  `idServicios` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(40) NOT NULL,
  `descripcion` longtext NOT NULL,
  `hotelId` int(11) NOT NULL,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio_hotel`
--

INSERT INTO `servicio_hotel` (`idServicios`, `estatus`, `nombre`, `descripcion`, `hotelId`, `usuarioModifica`, `fechaModifica`) VALUES
(4, 1, 'Servicio Taxi', 'Lorem Ipsum', 12, 1, '2023-05-26 00:14:49'),
(5, 1, 'Servicio lavado', 'test', 12, 1, '2023-05-26 00:14:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `passUsuario` varchar(120) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `aPaterno` varchar(30) DEFAULT NULL,
  `aMaterno` varchar(30) DEFAULT NULL,
  `telefonosUsuario` varchar(15) DEFAULT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `fechaRegistro` date DEFAULT NULL,
  `usuarioModifica` int(11) NOT NULL,
  `fechaModifica` datetime DEFAULT NULL,
  `rolUsuario` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `username`, `passUsuario`, `nombres`, `aPaterno`, `aMaterno`, `telefonosUsuario`, `estatus`, `fechaRegistro`, `usuarioModifica`, `fechaModifica`, `rolUsuario`) VALUES
(1, 'admin', '$2y$10$Mf3MxpjWwD46s4KPkTbzMuoTSh.6CBUPT0plBxSGHK7y2izvKaJ8W', 'Angie1 Maria1', 'Ortiz2', 'Velez2', '345345', 1, '2023-05-18', 1, NULL, 1),
(16, 'cliente_1', '$2y$10$RWEb5zQOho6cg1GyPsC5Su2N6JF964KuCEUkRK1yM1OLJc6Prr7hG', 'Monica1234 aaaaa', 'Sanchez', 'Perez', '5433453', 1, '2023-05-23', 0, NULL, 2),
(25, 'test', '$2y$10$.QrABEpTdSZZGZ1DuV3CbOZTLU6GUAyJ8e3BqBsVYU9vsmo9Je2C6', 'test test', 'test', 'test', '234524234', 1, '2023-05-26', 0, NULL, 1),
(26, 'test32', '$2y$10$ENKmBH0.N87dYP4qTp9ACOCiFFd0JkgK7aY4H85dd3S7WxkZx2tnG', 'test2 test2', 'test2', 'test2', '4324324', 1, '2023-05-26', 0, NULL, 2),
(28, 'prueba', '$2y$10$1rwRyoKM3wRephe11ISZ/uPrLKgLwxtcx172QmhTN0fnxzqDTDbHm', 'test prueba', 'prueba', 'prueba', '23123', 1, '2023-05-30', 0, NULL, 1),
(31, 'usuario_cliente', '$2y$10$BNqREgjwWvAtjBT5Zf.8Ye98.A2hTOf1Lia2IEdDXFn/K13GmNbVa', 'Veronica  Maria', 'Flores', 'Gutierrez', '1234', 1, '2023-05-30', 0, NULL, 2),
(34, 'aaaaaaaa', '$2y$10$RTOgs7AM/NV3yJXzCNWp3OM2dnn9fKtk0MEiqYnZ3nUkigONPQFoK', 'fsdfsd sdfsf', 'sfsdf', 'sdf', '12312', 1, '2023-05-30', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `idViaje` int(11) NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 2 COMMENT '0=cancelado\r\n1=Reservado\r\n2=Solicitado',
  `origen` varchar(40) NOT NULL,
  `destino` varchar(40) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `fechaReserva` date DEFAULT NULL,
  `duracion` varchar(10) DEFAULT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`idViaje`, `estatus`, `origen`, `destino`, `precio`, `fechaReserva`, `duracion`, `idCliente`) VALUES
(1, 1, 'M&eacute;xico', 'Tour Turkia', 450.00, '2023-05-28', '3 dias', 16),
(2, 1, 'M&eacute;xico', 'Tour Turkia', 450.00, '2023-05-28', '4 dias', 16),
(4, 0, 'Colombia', 'Tour Turkia', 450.00, '2023-06-14', '8 dias', 16),
(16, 2, 'test', 'Tour Caribe', 760.89, '2023-05-26', NULL, 16),
(17, 2, 'Ecuador', 'Tour Turkia', 450.00, '2023-05-30', NULL, 16),
(18, 1, 'Peru', 'Tour Caribe', 760.89, '2023-05-30', NULL, 16),
(21, 2, 'Venezuela', 'Tour Turkia', 450.00, '2023-06-03', '5 dias', 16),
(22, 1, 'Bolivia', 'Tour Caribe', 760.89, '2023-06-07', '7 dias', 31);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `usuarios_id` (`usuariosId`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`idDestino`);

--
-- Indices de la tabla `direccion_hotel`
--
ALTER TABLE `direccion_hotel`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `hoteles_id` (`hotelesId`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `cliente_reservas` (`clienteReserva`,`hotelReserva`,`destinoReserva`),
  ADD KEY `hotel_reservas` (`hotelReserva`),
  ADD KEY `destino_reservas` (`destinoReserva`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `servicio_hotel`
--
ALTER TABLE `servicio_hotel`
  ADD PRIMARY KEY (`idServicios`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `rol_usuarios` (`rolUsuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`idViaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `idDestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `direccion_hotel`
--
ALTER TABLE `direccion_hotel`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio_hotel`
--
ALTER TABLE `servicio_hotel`
  MODIFY `idServicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`usuariosId`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion_hotel`
--
ALTER TABLE `direccion_hotel`
  ADD CONSTRAINT `direccion_hotel_ibfk_1` FOREIGN KEY (`hotelesId`) REFERENCES `hotel` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`hotelReserva`) REFERENCES `hotel` (`idHotel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`destinoReserva`) REFERENCES `viaje` (`idViaje`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rolUsuario`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
