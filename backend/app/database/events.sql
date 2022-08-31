-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-08-2022 a las 04:15:36
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `events`
--
CREATE DATABASE `events` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `events`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(25) NOT NULL AUTO_INCREMENT,
  `dni` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `password_alt` text,
  `code` varchar(45) DEFAULT NULL,
  `nivel` int(2) DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `password`, `password_alt`, `code`, `nivel`, `active`, `created_at`, `updated_at`, `photo`) VALUES
(1, '99999', '$2y$10$04pE3kZwd.v1WuNuhlViyOKxc7V2flJGU0GqmAmyTP9AZSSPeK7oS', 'Admin', NULL, 1, 1, '2022-08-30 20:05:40', NULL, 'user.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
