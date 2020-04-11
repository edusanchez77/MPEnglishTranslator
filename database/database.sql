-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-04-2020 a las 23:52:16
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mp`
--
DROP DATABASE IF EXISTS `mp`;
CREATE DATABASE IF NOT EXISTS `mp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `mp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

DROP TABLE IF EXISTS `agencia`;
CREATE TABLE IF NOT EXISTS `agencia` (
  `age_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id de la agencia',
  `age_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la agencia',
  `age_direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Direccion de la agencia',
  `age_telefono` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Telefono de la agencia',
  `age_email` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Mail de la agencia',
  `age_periodoPago` tinyint(4) NOT NULL COMMENT 'Periodo de pago',
  `age_palabraEnEs` float UNSIGNED NOT NULL COMMENT 'Tarifa por palabra EN-ES',
  `age_palabraEsEn` float UNSIGNED NOT NULL COMMENT 'Tarifa por palabra ES-EN',
  `age_horaEnEs` float UNSIGNED NOT NULL COMMENT 'Tarifa por hoja EN-ES',
  `age_horaEsEn` float UNSIGNED NOT NULL COMMENT 'Tarifa por hoja EN-ES',
  PRIMARY KEY (`age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `con_id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'Id del contacto',
  `con_age_id` tinyint(3) UNSIGNED NOT NULL COMMENT 'Id de la agencia',
  `con_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del contacto',
  `con_puesto` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Puesto del contacto dentro de la agencia',
  `con_skype` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Direccion de Skype del contacto',
  `con_telefono` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Telefono del contacto',
  `con_deleted` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Flag de eliminado [Y/N]',
  `con_deleted_date` datetime DEFAULT NULL COMMENT 'Fecha de delete',
  PRIMARY KEY (`con_id`),
  KEY `FK_contactoAgencia` (`con_age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

DROP TABLE IF EXISTS `facturacion`;
CREATE TABLE IF NOT EXISTS `facturacion` (
  `fc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de la facturacion',
  `fc_age_id` tinyint(3) UNSIGNED NOT NULL COMMENT 'Id de la agencia',
  `fc_month` date NOT NULL COMMENT 'Mes de facturacion',
  `fc_importe` double UNSIGNED NOT NULL COMMENT 'Importe de facturacion',
  `fc_check_cobro` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Flag de cobro [Y = Cobrado / N = No cobrado]',
  `fc_date` datetime DEFAULT NULL COMMENT 'Fecha de cobro',
  `fc_deleted` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Flag de eliminado [Y/N]',
  `fc_deleted_date` datetime DEFAULT NULL COMMENT 'Fecha de delete',
  PRIMARY KEY (`fc_id`),
  KEY `FK_facturacionAgencia` (`fc_age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `pro_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id del proyecto',
  `pro_age_id` tinyint(3) UNSIGNED NOT NULL COMMENT 'Id de la agencia',
  `pro_fecha` date NOT NULL COMMENT 'Fecha inicial del proyecto',
  `pro_nro_proyecto` int(10) UNSIGNED NOT NULL COMMENT 'Nro del proyecto',
  `pro_parIdiomas` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Par de Idiomas',
  `pro_cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cuenta a la que corresponde el proyecto',
  `pro_importe` float UNSIGNED NOT NULL COMMENT 'Importe del proyecto',
  `pro_deadline` datetime NOT NULL COMMENT 'Fecha de entrega del proyecto',
  `pro_cattool` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Herramienta para realizar el proyecto',
  `pro_end` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Proyecto terminado [SI/NO]',
  `pro_end_date` datetime DEFAULT NULL COMMENT 'Fecha de finalización del proyecto',
  `pro_charged` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Proyecto cobrado [SI/NO]',
  `pro_charged_date` datetime DEFAULT NULL COMMENT 'Fecha de cobro del proyecto',
  `pro_deleted` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'N' COMMENT 'Proyecto eliminado [SI/NO]',
  `pro_deleted_date` date DEFAULT NULL COMMENT 'Fecha en que se elimino el proyecto',
  PRIMARY KEY (`pro_id`),
  KEY `FK_proyectoAgencia` (`pro_age_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Id User',
  `usr_email` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email del usuario',
  `usr_password` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Password del usuario',
  PRIMARY KEY (`usr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `FK_contactoAgencia` FOREIGN KEY (`con_age_id`) REFERENCES `agencia` (`age_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `FK_facturacionAgencia` FOREIGN KEY (`fc_age_id`) REFERENCES `agencia` (`age_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `FK_proyectoAgencia` FOREIGN KEY (`pro_age_id`) REFERENCES `agencia` (`age_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
