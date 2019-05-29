-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2019 a las 08:06:32
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dev_desayunosgourmet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Para Ellas'),
(2, 'Para Él'),
(3, 'Cumpleaños'),
(4, 'Nacimientos'),
(5, 'Día del Padre'),
(6, 'Día de la Madre'),
(7, 'San Valentin'),
(8, 'Arma tu Pedido'),
(9, 'Promociones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio_transacciones`
--

CREATE TABLE `comercio_transacciones` (
  `id` int(11) NOT NULL,
  `orden_compra` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_comuna_delivery` int(11) NOT NULL,
  `fecha_delivery` date NOT NULL,
  `monto_compra` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `correo_usuario` varchar(255) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha_transaccion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comercio_transacciones`
--

INSERT INTO `comercio_transacciones` (`id`, `orden_compra`, `estado`, `direccion`, `id_comuna_delivery`, `fecha_delivery`, `monto_compra`, `nombre_usuario`, `correo_usuario`, `mensaje`, `fecha_transaccion`) VALUES
(1, 'DEG-1', 99, '1', 1, '2019-03-29', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-23 02:12:26'),
(2, 'DEG-2', 99, '1', 1, '2019-03-28', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-23 02:15:51'),
(3, 'DEG-3', 0, '1', 1, '2019-03-27', 20000, 'miguel marquez', 'no.efects@hotmail.com', 'mensaje test', '2019-03-23 02:17:52'),
(4, 'DEG-4', 0, '1', 18, '2019-03-28', 20000, 'asd', 'asddddd', 'mensaje test', '2019-03-23 02:19:55'),
(5, 'DEG-5', 0, '1', 34, '2019-03-28', 20000, 'asdasd', 'asddddd', 'mensaje test', '2019-03-23 02:21:33'),
(6, 'DEG-6', 0, '1', 2, '2019-03-29', 20000, 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaa', 'mensaje test', '2019-03-23 02:23:27'),
(7, 'DEG-7', 0, '1', 3, '2019-03-29', 20000, 'avvvvvvvvvvvvv', 'qqqqqqqqqqqqqqqqqq', 'mensaje test', '2019-03-23 02:25:21'),
(8, 'DEG-8', 99, '1', 1, '2019-03-29', 20000, 'q111', '222', 'mensaje test', '2019-03-23 02:31:31'),
(9, 'DEG-9', 0, '1', 1, '2019-03-28', 20000, '123', 'fd3f33f', 'mensaje test', '2019-03-23 02:34:25'),
(10, 'DEG-10', 99, '1', 3, '2019-03-26', 20000, 'gggg', '4444', 'mensaje test', '2019-03-23 02:36:47'),
(11, 'DEG-11', 0, '1', 1, '2019-03-26', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'mensaje test', '2019-03-23 03:49:30'),
(12, 'DEG-12', 0, '1', 3, '2019-03-26', 20000, 'miguel marquez', 'hola@hola.cl', 'mensaje test', '2019-03-23 03:51:51'),
(13, 'DEG-13', 0, '1', 1, '2019-03-27', 20000, 'sebastian vasquez', 'svasquez.music@gmail.com', 'mensaje test', '2019-03-23 03:53:09'),
(14, 'DEG-14', 0, '1', 4, '2019-03-28', 20000, 'maria juana pincheirea', 'mjp@gmail.com', 'mensaje test', '2019-03-23 03:54:49'),
(15, 'DEG-15', 0, '1', 1, '2019-03-28', 20000, 'roberto manfinfla', 'rm@gmail.com', 'mensaje test', '2019-03-23 03:57:52'),
(16, 'DEG-16', 0, '1', 3, '2019-03-28', 20000, 'miguel marquez ', 'mikemreyes.mm@gmail.com', 'bla bla', '2019-03-23 06:20:40'),
(17, 'DEG-17', 99, '1', 4, '2019-03-30', 20000, 'miguel marquez', 'mikemreyes.mm@gmail.com', 'asdasdasd', '2019-03-23 06:23:25'),
(18, 'DEG-18', 0, '1', 3, '2019-03-31', 20000, 'miguel marquez', 'mike@gmail.com', 'asdasda sd', '2019-03-23 06:23:46'),
(19, 'DEG-19', -3, '1', 1, '2019-03-29', 20000, 'maria julia hernandez', 'maria_julia@gmail.com', 'asd asd asd ', '2019-03-23 06:26:57'),
(20, 'DEG-20', 0, 'calle 2, calle 2, comuna 3', 3, '2019-03-30', 20000, 'Lasting lucio last', 'Lastinginline@dio.cl', 'Test', '2019-03-26 07:04:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `nombre`, `valor`) VALUES
(1, 'Estación Central', 5000),
(2, 'Huechuraba', 5000),
(3, 'Independencia', 5000),
(4, 'La Cisterna', 5000),
(5, 'La Florida', 5000),
(6, 'La Granja', 5000),
(7, 'La Reina', 5000),
(8, 'Las Condes', 5000),
(9, 'Lo Barnechea', 5000),
(10, 'Lo Espejo', 5000),
(11, 'Lo Prado', 5000),
(12, 'Macul', 5000),
(13, 'Maipú', 5000),
(14, 'Nuñoa', 5000),
(15, 'Padre Hurtado', 5000),
(16, 'Pedro aguirre cerda', 5000),
(17, 'Peñalolen', 5000),
(18, 'Providencia', 5000),
(19, 'Pudahuel', 5000),
(20, 'Puente Alto', 5000),
(21, 'Quilicura', 5000),
(22, 'Quinta Normal', 5000),
(23, 'Recoleta', 5000),
(24, 'Renca', 5000),
(25, 'San Bernardo', 5000),
(26, 'San Joaquin', 5000),
(27, 'San Miguel', 5000),
(28, 'San Ramon', 5000),
(29, 'Santiago', 5000),
(30, 'Vitacura', 5000),
(31, 'Buin', 5000),
(32, 'Calera de Tango', 5000),
(33, 'Cerrillos', 5000),
(34, 'Cerro Navia', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `detalle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `precio`, `stock`, `fecha_creacion`, `imagen`, `categoria`, `detalle`) VALUES
(4, 'Saludable', 8000, 10, '2019-03-08 13:50:28', 'cart3.jpg', 9, '- Yogur\n- Leche\n- Granola\n- Frutas\n- Jugo\n- Paso\n- Caca\n- Pichi\n- Poto\n- Teta\n- Pico\n- Coco'),
(6, 'media luna', 1212, 12, '2019-03-14 04:22:44', 'cart3.jpg', 1, 'asad'),
(7, 'donnut', 1, 1, '2019-03-14 04:23:11', 'cart2.jpg', 5, '1'),
(8, 'sebastian', 200000, 12, '2019-03-16 23:56:45', '8.jpg', 1, 'asdasdasd'),
(9, 'canasta', 25000, 3, '2019-03-23 01:49:21', '5.jpg', 4, '- Muchas cosas lindas para los bebes'),
(10, 'Cafe late', 1500, 30, '2019-03-25 17:04:08', 'cart2.jpg', 1, 'cafe late con endulzante'),
(11, 'Pan integral aliado', 2000, 30, '2019-03-25 17:05:00', '2.jpg', 1, 'Pan aliado con jamon y queso'),
(12, 'Chaparrita light', 3000, 30, '2019-03-25 17:05:42', '8.jpg', 1, 'Chaparrita exquisita hecha con ingredientes light'),
(13, 'Muffin Aarandano', 990, 30, '2019-03-25 17:06:53', '4.jpg', 1, 'Muffin arandano natural'),
(14, 'Muffin Chips Chocolate', 1090, 25, '2019-03-25 17:07:30', 'cart3.jpg', 1, 'Muffin con chips de chocolate amargo'),
(15, 'Pan pita', 1000, 15, '2019-03-25 17:08:09', '9.jpg', 1, 'Pan pita, blanco sin aditivos'),
(16, 'Agua aloe vera', 3500, 10, '2019-03-25 17:08:51', 'cart3.jpg', 1, 'Agua natural fitness de aloe vera'),
(17, 'cafe express', 1000, 20, '2019-03-25 23:56:08', 'cart1.jpg', 2, 'cafe sin azucar'),
(18, 'cafe mocha', 1290, 20, '2019-03-25 23:56:35', 'cart2.jpg', 2, 'cafe mocha'),
(19, 'Cafe Americano', 1350, 20, '2019-03-25 23:58:20', '8.jpg', 2, 'cafe americano'),
(20, 'Cafe con menta', 1350, 20, '2019-03-26 00:00:43', '8.jpg', 2, 'cafe mentolado'),
(21, 'Aliado', 2000, 20, '2019-03-26 00:00:43', '8.jpg', 2, 'marraqueta con jamon y queso'),
(22, 'Jugo de fruta natural', 3500, 20, '2019-03-26 00:00:43', '8.jpg', 2, 'jugo de piña'),
(23, 'Pan tostado', 990, 20, '2019-03-26 00:00:43', '8.jpg', 2, 'pan tostado con mantequilla de selección'),
(24, 'Chaparrita', 990, 20, '2019-03-26 00:00:43', '8.jpg', 2, 'chaparrita simple'),
(25, 'Sushi', 4000, 20, '2019-03-26 00:01:24', '8.jpg', 2, '16 suaves piezas de sushi para el medio dia'),
(26, 'Berlines', 990, 20, '2019-03-26 00:06:14', '8.jpg', 3, 'Berlin de manjar'),
(27, 'Torta maracuyá', 2500, 20, '2019-03-26 00:06:14', '8.jpg', 3, 'Pieza individual de torta de maracuyá'),
(28, 'Pan de molde', 1000, 20, '2019-03-26 00:06:14', '8.jpg', 3, 'Pan de molde'),
(29, 'Pizza', 990, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Trozo individual de pizza clasica'),
(30, 'Torta chocolate Fam', 5600, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Torta de chocolate familiar'),
(31, 'Pie de limon Fam', 6500, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Pie de limón familiar para compartir'),
(32, 'Pan de hotdog', 3000, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Pan de hot dog 12 unidades'),
(33, 'Mini pie de limón', 350, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Trozos individuales de pie de limón, listo para servir'),
(34, 'Merengues', 150, 20, '2019-03-26 00:06:15', '8.jpg', 3, 'Ricos merenguitos para los niños'),
(35, 'Uva natural', 1500, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Uva para comer'),
(36, 'Postre de frutas', 2550, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Ensalada de frutas'),
(37, 'Jugo light', 1500, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Jugo light con sabor a frutilla'),
(38, 'Sandia trozada', 2500, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Sandia trozada en un pote'),
(39, 'Palomitos', 2500, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Palomos'),
(40, 'Jalea sabores', 150, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Jalea multisabor'),
(41, 'Frugelette', 10, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Clasicos dulces frutales'),
(42, 'Torta milhoja', 1500, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'Torta individual de milhoja'),
(43, 'producto1', 2345, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'abc abc abc'),
(44, 'producto2', 3400, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'asd'),
(45, 'producto3', 6700, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'asd'),
(46, 'porducto4', 12000, 20, '2019-03-26 00:12:16', 'cart2.jpg', 4, 'asd'),
(47, 'Asado', 1500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(48, 'Postre de frutas', 2550, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(49, 'Jugo light', 1500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(50, 'Completos', 2500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(51, 'Cerveza Budweiser', 2500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(52, 'Coca-cola', 150, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(53, 'Cigarros Camell', 3500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(54, 'Choripanes', 1500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(55, 'Empanadas', 2355, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(56, 'producto2', 3500, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(57, 'producto3', 6700, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(58, 'porducto5', 12000, 20, '2019-03-26 00:16:45', 'cart1.jpg', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(59, 'Pastel chocolate', 1600, 20, '2019-03-26 00:18:51', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(60, 'Cafe con crema', 2660, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(61, 'Caja de bombones', 1600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(62, 'Chocolate amargo', 2600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(63, 'Chocolate relleno de frutilla', 2600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(64, 'Frutas bañadas en chocolate', 160, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(65, 'Jugos light variedades', 3600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(66, 'Empanaditas', 1600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(67, 'Sopaipillas', 2366, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(68, 'producto2', 3600, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(69, 'producto3', 6700, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(70, 'porducto6', 12000, 20, '2019-03-26 00:18:52', 'cart1.jpg', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(71, 'Cigarros', 1700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(72, 'Vino tinto 120', 2770, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(73, 'Merlott', 1700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(74, 'Chandell postre', 2700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(75, 'Frutas bañadas en chocolate', 2700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(76, 'Marshmallows bañados en chocolate', 170, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(77, 'Chocolate amargo', 3700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(78, 'Chocolate relleno de fruta', 1700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(79, 'Cheescake', 2377, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(80, 'producto2', 3700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(81, 'producto3', 7700, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(82, 'porducto7', 12000, 20, '2019-03-26 00:21:42', 'cart1.jpg', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(83, 'A', 1800, 20, '2019-03-26 00:23:00', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(84, 'B', 2880, 20, '2019-03-26 00:23:00', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(85, 'C', 1800, 20, '2019-03-26 00:23:00', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(86, 'DASDAS ASD ASDASD', 2800, 20, '2019-03-26 00:23:00', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(87, 'ÑÑÑÑÑÑ ÁÁÁÉÉÉ', 2800, 20, '2019-03-26 00:23:00', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(88, ' ASD ASD ASDAS D', 180, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(89, 'ASDASDASDASDASD', 3800, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(90, 'QWEQWEQWE233E3E3E', 1800, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(91, 'ASDA 333 EDFASD ', 2388, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(92, 'producto2', 3800, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(93, 'producto3', 8800, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(94, 'porducto8', 12000, 20, '2019-03-26 00:23:01', 'cart1.jpg', 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(95, 'A', 1900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(96, 'B', 2990, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(97, 'C', 1900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(98, 'DASDAS ASD ASDASD', 2900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(99, 'ÑÑÑÑÑÑ ÁÁÁÉÉÉ', 2900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(100, ' ASD ASD ASDAS D', 190, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(101, 'ASDASDASDASDASD', 3900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(102, 'QWEQWEQWE233E3E3E', 1900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(103, 'ASDA 333 EDFASD ', 2399, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(104, 'producto2', 3900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(105, 'producto3', 9900, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr'),
(106, 'porducto9', 12000, 20, '2019-03-26 00:23:21', 'cart1.jpg', 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lorem elit, cursus nec libero ac, gravida faucibus enim. Nulla a risus nec nisi vulputate blandit vel at nisi. Donec aliquam porta odio, sit amet ultrices leo dictum faucibus. Aliquam sodales pr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_compras`
--

CREATE TABLE `productos_compras` (
  `id` int(11) NOT NULL,
  `orden_compra` varchar(50) NOT NULL DEFAULT '0',
  `id_producto` int(11) NOT NULL DEFAULT '0',
  `cantidad_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbk_transacciones`
--

CREATE TABLE `tbk_transacciones` (
  `id` int(11) NOT NULL,
  `orden_compra` varchar(255) DEFAULT NULL,
  `tbk_token_transaccion` varchar(255) DEFAULT NULL,
  `codigo_tipo_pago` varchar(255) DEFAULT NULL,
  `numero_tarjeta` varchar(255) DEFAULT NULL,
  `fecha_expiracion_tarjeta` varchar(255) DEFAULT NULL,
  `tbk_codigo_autorizacion` int(11) DEFAULT NULL,
  `tbk_codigo_transaccion` int(11) DEFAULT NULL,
  `codigo_comercio` int(11) DEFAULT NULL,
  `monto_compra` int(11) NOT NULL,
  `tbk_url_retorno` varchar(255) DEFAULT NULL,
  `tbk_vci` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbk_transacciones`
--

INSERT INTO `tbk_transacciones` (`id`, `orden_compra`, `tbk_token_transaccion`, `codigo_tipo_pago`, `numero_tarjeta`, `fecha_expiracion_tarjeta`, `tbk_codigo_autorizacion`, `tbk_codigo_transaccion`, `codigo_comercio`, `monto_compra`, `tbk_url_retorno`, `tbk_vci`, `fecha_registro`) VALUES
(1, 'DEG-1', 'eae25a78f1f927dd023ea055437a7ba56251d1f9d93c417957258786e58cd4fa', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:12:27'),
(2, 'DEG-2', 'e169e60c942cd7cc9c643bc1d48bf0132275e81b60bfbd63f73c1cb742b5785b', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:15:52'),
(3, 'DEG-3', 'e4d2fb425bfd50a217c6b6cdc61034c42a80eea764bad8e4f95fe0bf23bd0eb9', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:17:52'),
(4, 'DEG-4', 'e28c5fa0a244ba479c1c8984eec47bd7ed62001ca1cae9d700e9030fd639372d', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:19:56'),
(5, 'DEG-5', 'efbf85b03df0ac70c63ff09cc08754b26d3ec66372b2a2e4694cb579c56775cb', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:21:34'),
(6, 'DEG-6', 'e6817aac255c945b7dbbf95fe527dec98491b1d9f78df0764de7496da3f28ac1', 'VD', '1', '', 159483, 0, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-22 23:23:28'),
(7, 'DEG-7', 'e8121c28b36b605987fa5734ed915f01fcf23ba91bd80c5e70518a47b25cdc20', 'VD', '1', '', 253113, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 23:25:21'),
(8, 'DEG-8', 'ed1c3889e237240cfacb67cf078a722e23417014ec7b2702f259cec53bdff083', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-22 23:31:32'),
(9, 'DEG-9', 'e350102b8ac6a44ab2d778122371c1b850a27479c7f9c4884bb9567bdf01a24f', 'VD', '6623', '', 1213, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-22 23:34:26'),
(10, 'DEG-10', 'e001df7a2db5aa4e8bb27d4c9fcaff964301deed85f04d7a38037dc1df96cada', 'SI', '0568', '', 0, -3, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-22 23:36:47'),
(11, 'DEG-11', 'e095706267f720cd12a4e7668be651a9a889b52d1abf6ab27025c0d646751a17', 'VD', '1', '', 186564, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:49:30'),
(12, 'DEG-12', 'e3642d994d02041042342117153f44489cc312e25b56c16cc2c8552578e34205', 'VD', '1', '', 179755, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:51:51'),
(13, 'DEG-13', 'e290eb970bd7bdb24a62c0844a8ee7fff3354bd384a44cca7daa74ed61798ef7', 'VD', '1', '', 167784, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:53:10'),
(14, 'DEG-14', 'e0404f7ae1392b7cc2a8324f7450d9ec6637accababf040bee57d606a9d69be9', 'S2', '6623', '', 1213, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 00:54:50'),
(15, 'DEG-15', 'ebb0a28183172696f769efd4b5363663da7595a3ff1310d244dd57f42d3ba918', 'SI', '6623', '', 1213, 0, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-23 00:57:52'),
(16, 'DEG-16', 'ed434bc8d42448e2928143edf89a9e893426bf67bb89481247e2a445bbc39ffb', 'VD', '1', '', 115325, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 03:18:26'),
(17, 'DEG-16', 'ec9aed56c5c65ac04bcd976b7788af3e0692367f4f95fa4e88ef9731efa51ed0', 'VD', '1', '', 115325, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 03:20:41'),
(18, 'DEG-17', 'e7659ddfb16367a81d495a3f891cbff8534be7108b4aac46f1c40b5ae014e50d', '', 'NULL', 'NULL', 0, 1, 0, 20000, 'NULL', 'NULL', '2019-03-23 03:23:26'),
(19, 'DEG-18', 'e74a13fbb8227622604dae6366209801cb94ed424bf878f0f56d643996bb930d', 'VD', '1', '', 113050, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-23 03:23:46'),
(20, 'DEG-19', 'e42719ed94210c4848f8cf023ec790ff04be5f93b20cb3b6574ad937f77bb226', 'S2', '0568', '', 0, -3, 2147483647, 20000, 'https://localhost/Proyectos/desayunosestilogourmet/boucher_final.php', 'TSY', '2019-03-23 03:26:58'),
(21, 'DEG-20', 'e4769a3dc8afb6214612115b1e326b7dfc63047830d07991af50f297aab61193', 'VD', '1', '', 564970, 0, 2147483647, 20000, 'https://webpay3gint.transbank.cl/webpayserver/voucher.cgi', 'TSY', '2019-03-26 07:04:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(1000) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `clave`, `fecha_registro`) VALUES
(1, 'admin', 'admin2019', '2019-03-02 20:08:49');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comercio_transacciones`
--
ALTER TABLE `comercio_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_compras`
--
ALTER TABLE `productos_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbk_transacciones`
--
ALTER TABLE `tbk_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comercio_transacciones`
--
ALTER TABLE `comercio_transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `productos_compras`
--
ALTER TABLE `productos_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbk_transacciones`
--
ALTER TABLE `tbk_transacciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
