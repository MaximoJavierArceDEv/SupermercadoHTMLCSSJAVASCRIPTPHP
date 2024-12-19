-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2023 a las 01:02:51
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `super`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` bigint(13) NOT NULL,
  `descrip` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `sector` varchar(3) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `descrip`, `stock`, `precio`, `sector`, `marca`, `foto`) VALUES
(7284158987001, 'Shampoo Elvive 2 en 1 Reparación Total 5 x 750ml', 45, 9197.23, 'PER', 'Elvive', 'shampoo_elvive.jpg'),
(7475981120014, 'Azúcar Ledesma Clásica x 1 kg.', 115, 934.99, 'ALM', 'Ledesma', 'azucar_ledesma.jpg'),
(7485510102478, 'Gaseosa Cunnington Cola x 2.25 L.', 23, 990, 'BEB', 'Cunnington', 'cunington_cola.jpg'),
(7509246686523, 'Crema Dental Colgate Triple Acción x 90g.', 23, 2145.66, 'PER', 'Colgate', 'colgate_tri.jpg'),
(7509546667577, 'Crema Dental Colgate Luminous White Lovers x 70g.', 36, 6220, 'PER', 'Colgate', 'colgate_lumi.jpg'),
(7584565418988, 'Leche Descremada 0% Las Tres Niñas 1lt.', 32, 1750, 'LAC', 'Las Tres Niñas', 'leche_3ninas.jpg'),
(7768954821354, 'Alimento Raza Perros Adultos Carne x 15 kg.', 8, 34599, 'MAS', 'Raza', 'alim_raza.jpg'),
(7784512548210, 'Desodorante En Aerosol Dove Extra Fresh 150ml', 45, 7097, 'PER', 'Dove', 'desod_dove.jpg'),
(7790150211908, 'Té La Virginia x 25u.', 23, 734.69, 'ALM', 'La Virginia', 'te_virginia.jpg'),
(7790520995377, 'Tabletas Raid contra los Mosquitos 12 noches', 62, 4020.99, 'LIM', 'Raid', 'tabletas_raid.jpg'),
(7790520996602, 'Tabletas Fuyi contra los Mosquitos 12 noches', 55, 3899.99, 'LIM', 'Fuyi', 'tabletas_fuyi.jpg'),
(7790742770202, 'Crema Larga Vida para batir La Serenísima x 200ml.', 10, 1566.99, 'LAC', 'La Serenísima', 'crema_ls.jpg'),
(7790895648267, 'Jugo Cepita Naranja Tentación x 1L.', 15, 2090.55, 'BEB', 'Cepita', 'jugo_cepita.jpg'),
(7791905023623, 'Alcohol en Aerosol al 70% Aktiol', 56, 1595, 'LIM', 'Aktiol', 'alcohol_aktiol.jpg'),
(7793253001245, 'Lavandina Común Ayudín x 1 Lt.', 52, 1200, 'LIM', 'Ayudín', 'lavan2_ayudin.jpg'),
(7793253005801, 'Lavandina Gel Ayudín Original x 750ml', 25, 1550.49, 'LIM', 'Ayudín', 'lavan_ayudin.jpg'),
(7793913013252, 'Yogur Arándano Treggar x 169g.', 15, 963.99, 'LAC', 'Treggar', 'yogur_treggar.jpg'),
(7793913013287, 'Dulce de Leche Clásico La Serenísima x 400g.', 12, 1875.33, 'LAC', 'La Serenísima', 'dulce_ls.jpg'),
(7794000005624, 'Caldo de Verduras Knorr x 6u.', 23, 1371.99, 'ALM', 'Knorr', 'caldos_knorr.jpg'),
(7795854612488, 'Café La Virginia Clásico x 170g.', 10, 5275, 'ALM', 'La Virginia', 'cafe_virginia.jpg'),
(7797453000796, 'Sobrecito Pedigree Adulto sabor Carne', 32, 689.99, 'MAS', 'Pedigree', 'sobre_pedigree.jpg'),
(7797453971843, 'Snack Cuidado Oral Dentastix Mediano x 7u. ', 18, 3082.44, 'MAS', 'Pedigree', 'snacks_dentastix.jpg'),
(7797470000564, 'Paté de Foie Marolio', 16, 419.99, 'ALM', 'Marolio', 'pate_marolio.jpg'),
(7874512021457, 'Detergente Ala Ultra Desengrase Limón x 300ml', 45, 1239.49, 'LIM', 'Ala', 'deter_ala.jpg'),
(7898422746759, 'Jabón Dove Original x 90g.', 31, 1227.30, 'PER', 'Dove', 'jabon_dove.jpg'),
(7978456110004, 'Tratamiento Elvive Reparación Total 5 x 300g.', 12, 5267, 'PER', 'Elvive', 'tratam_elvive.jpg'),
(7978514006744, 'Gaseosa Coca Cola Botella 1.5L ', 52, 3190, 'BEB', 'Coca Cola', 'coca_bot.jpg'),
(7978855664401, 'Gaseosa Coca Cola Lata x 354ml.', 152, 1319.99, 'BEB', 'Coca Cola', 'coca_lata.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
