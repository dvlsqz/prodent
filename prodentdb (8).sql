-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2018 a las 05:07:57
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prodentdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_alerta` datetime DEFAULT NULL,
  `medicamento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `paciente_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id`, `tipo`, `descripcion`, `paciente_id`) VALUES
(1, 'Cardiaco', 'Problemas cardiacos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backup`
--

CREATE TABLE `backup` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora` time NOT NULL,
  `detalles` text,
  `estado` varchar(45) DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE `clinica` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `detalles` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id`, `nombre`, `direccion`, `logo`, `detalles`) VALUES
(1, 'SProdent', 'San Lorenzo', NULL, 'Clínica Dental');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `num_lote` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` float NOT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `forma_pago_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `num_lote`, `fecha`, `total`, `detalles`, `doctor_id`, `forma_pago_id`) VALUES
(1, 1234, '2018-10-27 00:00:00', 500, 'por falta de stock', 2, 1),
(2, 1341234, '2018-10-27 00:00:00', 0, 'ninguno', 2, 1),
(3, 1221, '2018-10-27 00:00:00', 0, NULL, 2, 1),
(4, 1234, '2018-10-27 00:00:00', 0, NULL, 2, 1),
(5, 1234234, '2018-10-27 00:00:00', 0, 'esta si', 7, 1),
(6, 123127876, '2018-10-27 00:00:00', 0, 'ninguno', 7, 1),
(7, 11, '2018-10-27 00:00:00', 0, 'ssss', 7, 1),
(12, 1111, '2018-10-27 00:00:00', 0, 'asdfsad', 2, 1),
(16, 111, '2018-10-27 00:00:00', 0, 'bbbbb', 2, 1),
(17, 333, '2018-10-27 00:00:00', 0, 'cccccc', 2, 1),
(25, 1111, '2018-10-27 00:00:00', 0, 'sdsdsd', 2, 1),
(26, 56, '2018-10-28 00:00:00', 0, 'ojala si', 7, 1),
(27, 777, '2018-10-29 00:00:00', 0, 'xxxxxxx', 2, 1),
(33, 12090902, '2018-10-30 00:00:00', 0, 'prueba', 2, 1),
(34, 2147483647, '2018-10-31 00:00:00', 0, 'prueba 2', 2, 1),
(35, 6666, '2018-10-30 00:00:00', 0, 'prueba3', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(10) UNSIGNED NOT NULL,
  `saldo` float DEFAULT NULL,
  `fecha` date NOT NULL,
  `tratamiento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `cuenta`
--
DELIMITER $$
CREATE TRIGGER `tr_updSaldoTratamiento` BEFORE INSERT ON `cuenta` FOR EACH ROW UPDATE tratamiento SET saldo_actual = saldo_actual - NEW.saldo
    WHERE tratamiento.id = NEW.tratamiento_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_updSaldoTratamientoDelete` BEFORE DELETE ON `cuenta` FOR EACH ROW UPDATE tratamiento SET saldo_actual = saldo_actual + OLD.saldo
    WHERE tratamiento.id = OLD.tratamiento_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `medicamento_id` int(10) UNSIGNED NOT NULL,
  `compra_id` int(10) UNSIGNED NOT NULL,
  `proveedor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `cantidad`, `precio`, `subtotal`, `medicamento_id`, `compra_id`, `proveedor_id`) VALUES
(1, 100, 5, 500, 1, 1, 3),
(2, 100, 7, 700, 1, 5, 1),
(3, 1, 1, NULL, 1, 1, 1),
(4, 1, 1, NULL, 1, 17, 1),
(6, 1, 2, NULL, 1, 25, 1),
(7, 1, 2, NULL, 1, 25, 1),
(8, 1, 0.02, NULL, 1, 33, 1),
(9, 1, 0.02, NULL, 1, 34, 1),
(10, 3, 0.04, NULL, 3, 34, 1),
(11, 2, 0.01, NULL, 3, 35, 1);

--
-- Disparadores `detalle_compra`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockCompra` BEFORE INSERT ON `detalle_compra` FOR EACH ROW UPDATE medicamento SET stock = stock + NEW.cantidad
    WHERE medicamento.id = NEW.medicamento_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_recibo`
--

CREATE TABLE `detalle_recibo` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `medicamento_id` int(10) UNSIGNED DEFAULT NULL,
  `recibo_id` int(10) UNSIGNED NOT NULL,
  `tratamiento_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_recibo`
--

INSERT INTO `detalle_recibo` (`id`, `cantidad`, `precio`, `subtotal`, `medicamento_id`, `recibo_id`, `tratamiento_id`) VALUES
(1, 10, 70, 70, 1, 1, 1),
(2, 2, 0.02, NULL, 1, 3, 1),
(3, 1, 0.02, NULL, 1, 4, 1),
(4, 3, 0.1, NULL, 3, 5, 2),
(5, 10, 1.3, NULL, 1, 6, 1),
(6, 20, 7.5, NULL, 3, 6, 1),
(7, 12, 12, NULL, 3, 7, 2);

--
-- Disparadores `detalle_recibo`
--
DELIMITER $$
CREATE TRIGGER `tr_updStockRecibo` BEFORE INSERT ON `detalle_recibo` FOR EACH ROW UPDATE medicamento SET stock = stock - NEW.cantidad
WHERE medicamento.id = NEW.medicamento_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `clinica_id` int(10) UNSIGNED DEFAULT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `nombre`, `apellido`, `direccion`, `fecha_nac`, `clinica_id`, `genero_id`, `users_id`) VALUES
(2, 'Willy', 'de León', '6ta calle 10-98 zona 1', '1995-10-03', NULL, 1, 1),
(7, 'Mardoqueo', 'Rabanales', 'San Lorenzo', '1980-10-20', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `id` int(10) UNSIGNED NOT NULL,
  `forma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`id`, `forma`) VALUES
(1, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(10) UNSIGNED NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_cita`
--

CREATE TABLE `historial_cita` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `tratamiento_id` int(10) UNSIGNED DEFAULT NULL,
  `cita_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_tratamiento`
--

CREATE TABLE `historial_tratamiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `detalles` varchar(45) DEFAULT NULL,
  `tratamiento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_tratamiento`
--

INSERT INTO `historial_tratamiento` (`id`, `fecha`, `detalles`, `tratamiento_id`) VALUES
(5, '2018-10-26', 'Procedimiento exitoso', 1),
(6, '2018-10-24', 'Limpieza terminada al paciente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_cad` date NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `presentacion` varchar(255) DEFAULT NULL,
  `precio_costo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `proveedor_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id`, `codigo`, `nombre`, `fecha_cad`, `stock`, `stock_minimo`, `presentacion`, `precio_costo`, `precio_venta`, `estado`, `proveedor_id`) VALUES
(1, '002', 'Paracetamol', '2020-10-25', 239, 15, 'Tabletas', 4.15, 6.5, 'Activo', NULL),
(3, '003', 'Diclofenaco', '2021-11-26', 5, 11, 'Tabletas', 2.22, 3.5, 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `apellido`, `fecha_nac`, `direccion`, `telefono`, `fecha_registro`, `genero_id`) VALUES
(2, 'Alejandro', 'Cifuentes', '2000-05-09', '6ta calle 10-98 zona 1', '47086461', '2018-10-21 00:00:00', 1),
(3, 'Willy', 'de León', '1995-10-03', '6ta calle 10-98 zona 1', '47086467', '2018-10-25 00:00:00', 1),
(4, 'Vanessa', 'González', '1994-04-15', 'San Antonio', '59653014', '2018-10-25 00:00:00', 2),
(5, 'Francisco', 'Vásquez', '2018-10-25', 'San Andrés Chápil', '57556015', '2018-10-25 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `num_cuenta` varchar(255) DEFAULT NULL,
  `telefono1` varchar(15) DEFAULT NULL,
  `telefono2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `direccion`, `correo`, `num_cuenta`, `telefono1`, `telefono2`) VALUES
(1, 'Proveedor1', 'proveedor@gmail.com', NULL, 'No tiene..', '77605152', '57596542'),
(3, 'Proveedor 3', 'Quetzaltenango', 'Ninguno', 'Ninguno', '77602326', '45624526');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id` int(10) UNSIGNED NOT NULL,
  `indicaciones` text,
  `fecha` datetime DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `medicamento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id`, `indicaciones`, `fecha`, `doctor_id`, `paciente_id`, `medicamento_id`) VALUES
(4, 'Tomar cada 8 horas por 7 dias', '2018-10-27 00:00:00', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id` int(10) UNSIGNED NOT NULL,
  `serie` varchar(15) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `detalles` varchar(255) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED NOT NULL,
  `forma_pago_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id`, `serie`, `fecha`, `descuento`, `total`, `detalles`, `estado`, `paciente_id`, `forma_pago_id`) VALUES
(1, '1', '2018-10-27', 0, 70, 'para continuar con tratamiento', 'Pagada', 2, 1),
(3, '1', '2018-10-30', NULL, NULL, NULL, NULL, 2, 1),
(4, '1', '2018-10-30', NULL, NULL, NULL, NULL, 2, 1),
(5, '32', '2018-11-01', NULL, NULL, 'prueba hoy', NULL, 3, 1),
(6, '43', '2018-11-01', NULL, NULL, 'segunda prueba', NULL, 2, 1),
(7, '454', '2018-11-06', NULL, NULL, 'ninguna', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE `responsable` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `parentesco` varchar(45) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `genero_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`id`, `nombre`, `apellido`, `parentesco`, `fecha_nac`, `direccion`, `telefono`, `paciente_id`, `genero_id`) VALUES
(1, 'Daniel', 'Jiménez', 'Padre', '1988-06-21', 'San Lorenzo', '48495263', 2, 1),
(2, 'Roberto', 'Aguilar', 'Padre', '1983-03-01', '6ta calle 10-98 zona 1', '45424659', 4, 1),
(3, 'Andrea', 'Martínez', 'Madre', '1984-08-16', 'San Lorenzo', '59585745', 3, 2),
(4, 'Hernán', 'Figueroa', 'Padre', '1974-05-09', 'San Lorenzo', '46785969', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `detalle` text,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `saldo_actual` float NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `nombre`, `tipo`, `detalle`, `fecha_inicio`, `fecha_fin`, `precio`, `saldo_actual`, `estado`, `paciente_id`) VALUES
(1, 'Extracción', 'Ortodoncia', 'extracción de muela', '2018-10-25', '2018-10-25', 200, 225, 'Activo', 2),
(2, 'Limpieza Bucal', 'Limpieza', 'limpieza completa', '2018-10-24', '2018-10-24', 200, 200, 'Activo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Willy', 'willy@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'maX0SmBNcq4xiVxEb7HzexOVom2q1cEEJblXJZgvCasoQ51BQWXK3Uc9wxdq', '2018-10-08 06:00:00', NULL),
(2, 'Mardoqueo', 'mardoqueo@gmail.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'v2RFrAIzR63dLPDFaulpT8oNW8Nd9mq1DkxfAlnS9oF30fBh04ACinFHqG6W', '2018-10-08 06:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `es_admin` tinyint(4) DEFAULT NULL,
  `verificado` tinyint(4) DEFAULT NULL,
  `token_verificacion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `proveedor_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`id`, `nombre`, `apellido`, `correo`, `direccion`, `telefono`, `proveedor_id`) VALUES
(1, 'Fernando', 'Fuentes', 'Ninguno', 'San Antonio', '57591232', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Alerta_medicamento1_idx` (`medicamento_id`);

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antecedentes_paciente1_idx` (`paciente_id`);

--
-- Indices de la tabla `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cita_doctor1_idx` (`doctor_id`);

--
-- Indices de la tabla `clinica`
--
ALTER TABLE `clinica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_compra_doctor1_idx` (`doctor_id`),
  ADD KEY `fk_compra_forma_pago1_idx` (`forma_pago_id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuenta_tratamiento1_idx` (`tratamiento_id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_compra_medicamento1_idx` (`medicamento_id`),
  ADD KEY `fk_detalle_compra_compra1_idx` (`compra_id`),
  ADD KEY `fk_detalle_compra_proveedor1_idx` (`proveedor_id`);

--
-- Indices de la tabla `detalle_recibo`
--
ALTER TABLE `detalle_recibo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_recibo_medicamento1_idx` (`medicamento_id`),
  ADD KEY `fk_detalle_recibo_recibo1_idx` (`recibo_id`),
  ADD KEY `fk_detalle_recibo_tratamiento1_idx` (`tratamiento_id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor_clinica1_idx` (`clinica_id`),
  ADD KEY `fk_doctor_genero1_idx` (`genero_id`),
  ADD KEY `fk_doctor_user1_idx` (`users_id`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_cita`
--
ALTER TABLE `historial_cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_cita_paciente1_idx` (`paciente_id`),
  ADD KEY `fk_historial_cita_tratamiento1_idx` (`tratamiento_id`),
  ADD KEY `fk_historial_cita_cita1_idx` (`cita_id`);

--
-- Indices de la tabla `historial_tratamiento`
--
ALTER TABLE `historial_tratamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historial_tratamiento_tratamiento1_idx` (`tratamiento_id`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medicamento_proveedor1_idx` (`proveedor_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_paciente_genero1_idx` (`genero_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_receta_doctor1_idx` (`doctor_id`),
  ADD KEY `fk_receta_paciente1_idx` (`paciente_id`),
  ADD KEY `fk_receta_medicamento1_idx` (`medicamento_id`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta_paciente1_idx` (`paciente_id`),
  ADD KEY `fk_recibo_forma_pago1_idx` (`forma_pago_id`);

--
-- Indices de la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_responsable_paciente1_idx` (`paciente_id`),
  ADD KEY `fk_responsable_genero1_idx` (`genero_id`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_telefono_doctor1_idx` (`doctor_id`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tratamiento_paciente1_idx` (`paciente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendedor_proveedor1_idx` (`proveedor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clinica`
--
ALTER TABLE `clinica`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_recibo`
--
ALTER TABLE `detalle_recibo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial_cita`
--
ALTER TABLE `historial_cita`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_tratamiento`
--
ALTER TABLE `historial_tratamiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `fk_Alerta_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD CONSTRAINT `fk_antecedentes_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_cita_doctor1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_doctor1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_compra_forma_pago1` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `fk_cuenta_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `fk_detalle_compra_compra1` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_compra_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_compra_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_recibo`
--
ALTER TABLE `detalle_recibo`
  ADD CONSTRAINT `fk_detalle_recibo_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_recibo_recibo1` FOREIGN KEY (`recibo_id`) REFERENCES `recibo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_recibo_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `fk_doctor_clinica1` FOREIGN KEY (`clinica_id`) REFERENCES `clinica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctor_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_doctor_user1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_cita`
--
ALTER TABLE `historial_cita`
  ADD CONSTRAINT `fk_historial_cita_cita1` FOREIGN KEY (`cita_id`) REFERENCES `cita` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_historial_cita_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_historial_cita_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial_tratamiento`
--
ALTER TABLE `historial_tratamiento`
  ADD CONSTRAINT `fk_historial_tratamiento_tratamiento1` FOREIGN KEY (`tratamiento_id`) REFERENCES `tratamiento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD CONSTRAINT `fk_medicamento_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fk_paciente_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `fk_receta_doctor1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receta_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_receta_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `fk_recibo_forma_pago1` FOREIGN KEY (`forma_pago_id`) REFERENCES `forma_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_venta_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `fk_responsable_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_responsable_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `fk_telefono_doctor1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `fk_tratamiento_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD CONSTRAINT `fk_vendedor_proveedor1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
