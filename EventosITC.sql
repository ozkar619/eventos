-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-07-2013 a las 11:12:38
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `EventosITC`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_actividades`
--

CREATE TABLE IF NOT EXISTS `evt_actividades` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) DEFAULT NULL,
  `id_instructor` int(11) NOT NULL,
  `nombre_actividad` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `imagen` varchar(30) NOT NULL,
  PRIMARY KEY (`id_actividad`),
  UNIQUE KEY `evt_actividadesC4` (`id_actividad`),
  KEY `evt_actividadesC2` (`id_evento`),
  KEY `evt_actividadesC3` (`id_instructor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_asistentes`
--

CREATE TABLE IF NOT EXISTS `evt_asistentes` (
  `id_asistente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asistente` varchar(120) NOT NULL,
  `apellido_paterno` varchar(120) NOT NULL,
  `apellido_materno` varchar(120) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nctrl_rfc` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id_asistente`),
  UNIQUE KEY `evt_asistentesC2` (`id_asistente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evt_asistentes`
--

INSERT INTO `evt_asistentes` (`id_asistente`, `nombre_asistente`, `apellido_paterno`, `apellido_materno`, `genero`, `edad`, `email`, `nctrl_rfc`, `password`) VALUES
(1, '', 'grimaldo', 'aguayo', '', 25, 'oscar@itc.mx', '', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_asistentes_actividades`
--

CREATE TABLE IF NOT EXISTS `evt_asistentes_actividades` (
  `id_asistente_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_asistente` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `asistio` tinyint(1) NOT NULL,
  `pago` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_asistente_evento`),
  UNIQUE KEY `evt_asistentes_eventosC4` (`id_asistente_evento`),
  KEY `evt_asistentes_eventosC2` (`id_asistente`),
  KEY `evt_asistentes_eventosC3` (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_asistentes_tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `evt_asistentes_tipos_usuarios` (
  `id_asistente_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_asistente` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_asistente_tipo_usuario`),
  UNIQUE KEY `evt_asistentes_tipos_usuariosC4` (`id_asistente_tipo_usuario`),
  KEY `evt_asistentes_tipos_usuariosC2` (`id_asistente`),
  KEY `evt_asistentes_tipos_usuariosC3` (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_eventos`
--

CREATE TABLE IF NOT EXISTS `evt_eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(50) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `informacion` varchar(500) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `imagen` varchar(20) NOT NULL,
  PRIMARY KEY (`id_evento`),
  UNIQUE KEY `evt_eventoC2` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_eventos_admin`
--

CREATE TABLE IF NOT EXISTS `evt_eventos_admin` (
  `id_evento_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_asistente` int(11) NOT NULL,
  PRIMARY KEY (`id_evento_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_eventos_tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `evt_eventos_tipos_usuarios` (
  `id_evento_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_evento_tipo_usuario`),
  UNIQUE KEY `evt_eventos_tipos_usuariosC4` (`id_evento_tipo_usuario`),
  KEY `evt_eventos_tipos_usuariosC2` (`id_evento`),
  KEY `evt_eventos_tipos_usuariosC3` (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evt_tipos_usuarios`
--

CREATE TABLE IF NOT EXISTS `evt_tipos_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`),
  UNIQUE KEY `evt_tipos_usuariosC2` (`id_tipo_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evt_actividades`
--
ALTER TABLE `evt_actividades`
  ADD CONSTRAINT `evt_actividadesC2` FOREIGN KEY (`id_evento`) REFERENCES `evt_eventos` (`id_evento`),
  ADD CONSTRAINT `evt_actividadesC3` FOREIGN KEY (`id_instructor`) REFERENCES `evt_asistentes` (`id_asistente`);

--
-- Filtros para la tabla `evt_asistentes_actividades`
--
ALTER TABLE `evt_asistentes_actividades`
  ADD CONSTRAINT `evt_asistentes_eventosC2` FOREIGN KEY (`id_asistente`) REFERENCES `evt_asistentes` (`id_asistente`),
  ADD CONSTRAINT `evt_asistentes_eventosC3` FOREIGN KEY (`id_actividad`) REFERENCES `evt_actividades` (`id_actividad`);

--
-- Filtros para la tabla `evt_asistentes_tipos_usuarios`
--
ALTER TABLE `evt_asistentes_tipos_usuarios`
  ADD CONSTRAINT `evt_asistentes_tipos_usuariosC2` FOREIGN KEY (`id_asistente`) REFERENCES `evt_asistentes` (`id_asistente`),
  ADD CONSTRAINT `evt_asistentes_tipos_usuariosC3` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `evt_tipos_usuarios` (`id_tipo_usuario`);

--
-- Filtros para la tabla `evt_eventos_tipos_usuarios`
--
ALTER TABLE `evt_eventos_tipos_usuarios`
  ADD CONSTRAINT `evt_eventos_tipos_usuariosC2` FOREIGN KEY (`id_evento`) REFERENCES `evt_eventos` (`id_evento`),
  ADD CONSTRAINT `evt_eventos_tipos_usuariosC3` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `evt_tipos_usuarios` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
