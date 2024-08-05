-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2024 a las 08:57:38
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
-- Base de datos: `sistemafarmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id_detallefactura` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `nomb_cliente` varchar(50) NOT NULL,
  `apell_cliente` varchar(50) NOT NULL,
  `dni_cliente` varchar(10) NOT NULL,
  `vendedor_id` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `iva` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `laboratorio` varchar(150) NOT NULL,
  `presentacion` varchar(150) NOT NULL,
  `concentracion` varchar(150) NOT NULL,
  `tipo_producto` varchar(150) NOT NULL,
  `dis_cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_prod`, `laboratorio`, `presentacion`, `concentracion`, `tipo_producto`, `dis_cantidad`, `precio_unitario`, `fecha_vencimiento`) VALUES
(1, 'Paracetamol', 'Pfizer', 'Tableta', '200 mg', 'Analgésico', 100, 10.50, '2024-07-15'),
(2, 'Ibuprofeno', 'Roche', 'Cápsula', '200 mg', 'Antiinflamatorio', 200, 15.75, '2024-08-22'),
(3, 'Amoxicilina', 'Novartis', 'Jarabe', '1000 ml', 'Antibiótico', 150, 20.25, '2024-05-10'),
(4, 'Omeprazol', 'GlaxoSmithKline', 'Inyectable', '20 ml', 'Antiácido', 300, 8.99, '2024-07-05'),
(5, 'Loratadina', 'Bayer', 'Crema', '50 mg', 'Antihistamínico', 250, 12.30, '2024-11-18'),
(6, 'Metformina', 'Sanofi', 'Gotas', '10 ml', 'Antidiabético', 180, 18.60, '2023-12-30'),
(7, 'Acetaminofén', 'Merck', 'Supositorio', '250 mg', 'Antipirético', 120, 25.00, '2025-01-08'),
(8, 'Aspirina', 'Johnson & Johnson', 'Spray nasal', '5 ml', 'Analgésico', 400, 30.45, '2025-02-14'),
(9, 'Ciprofloxacino', 'Abbott Laboratories', 'Solución', '40 mg', 'Antibiótico', 500, 40.20, '2025-03-20'),
(10, 'Ranitidina', 'Bristol Myers Squibb\r\n', 'Suspensión', '75 mg', 'Antiácido', 350, 22.75, '2023-12-10'),
(11, 'Dipirona', 'AstraZeneca', 'Pomada', '150 mg', 'Analgésico', 600, 35.90, '2024-05-15'),
(12, 'Clonazepam', 'Eli Lilly', 'Gel', '80 mg', 'Ansiolítico', 700, 42.15, '2025-06-25'),
(13, 'Atorvastatina', 'Novo Nordisk', 'Emulsión', '25 ml', 'Hipolipemiante', 450, 28.40, '2024-06-01'),
(14, 'Tramadol', 'Teva Pharmaceutical', 'Polvo', '600 mg', 'Analgésico', 550, 32.80, '2025-08-09'),
(15, 'Prednisona', 'Gilead Sciences', 'Aerosol', '300 mg', 'Corticoide', 800, 50.60, '2025-09-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tusuario` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tusuario`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(400) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `dni`, `direccion`, `telefono`, `correo`, `contrasena`, `tipo_usuario_id`) VALUES
(1, 'Steven', 'Armijos', '1111111111', 'deraqasswadfsds', '0985642156', 'sdsdffgfggfg@dfddf.com', '$2y$10$aZoG9ZHfaqwZdnP6UK3tT.ISyP.jfzzsAjwBiAu1sY7Fa5Y/t8SqS', 1),
(2, 'Juan', 'Perez', '2222222222', 'ddddddddd', '0956425865', 'cbchjdbjd@fdfesk.com', '$2y$10$E8NCXhKrLmduaKwqkOIiLOcJKFLxpiXkgaqQYEZ76xZCzuNqCNqDa', 1),
(3, 'Pedro', 'Alvarado', '3333333333', 'bcnemsoiehrrnttrd', '0956874258', 'lksirekskdlnd@mnanjfd.com', '$2y$10$WsbUC0rTi1O6Tllbl9str.GI4kMzqM3AnkbooO2xbOChNkaHN8ZVe', 2),
(4, 'Usuario N1', 'Prueba', '5555555555', 'gggggggggg', '1472583690', 'asahsydgys@gmail.com', '$2y$10$DEsaffVBKMNqsN5xT60v2e7XBmbPl1oYCbEONZLRHUS6Oe1QYe8OS', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id_detallefactura`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `vendedor_id` (`vendedor_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo_usuario_id` (`tipo_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id_detallefactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`vendedor_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id_tusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
