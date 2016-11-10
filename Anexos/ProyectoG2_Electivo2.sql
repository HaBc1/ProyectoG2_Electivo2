-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2016 a las 10:48:59
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electivo2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Area_Actualizar` (IN `area` VARCHAR(50), IN `id_area` INT, IN `estado_area` CHAR(1))  BEGIN                                                                                         

UPDATE `area` SET `nom_area`=area,`estado_area`=estado_area WHERE `id_area`=id_area;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nom_area` varchar(50) NOT NULL,
  `estado_area` enum('A','I') DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `area`
--
DELIMITER $$
CREATE TRIGGER `validar_actualizar` BEFORE UPDATE ON `area` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_area = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_area = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_area` BEFORE INSERT ON `area` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_area = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_area = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL,
  `inicio_cita` time NOT NULL,
  `fin_cita` time NOT NULL,
  `estado_cita` enum('R','C','F') NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `cita`
--
DELIMITER $$
CREATE TRIGGER `validar_cita` BEFORE INSERT ON `cita` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.inicio_cita >= new.fin_cita) THEN
SET msg = 'Hora de Cita Incorrecta';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.inicio_cita = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.inicio_cita = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;


IF (new.fin_cita = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.fin_cita = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_cita_actualizar` BEFORE UPDATE ON `cita` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.inicio_cita >= new.fin_cita) THEN
SET msg = 'Hora de Cita Incorrecta';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.inicio_cita = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.inicio_cita = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;


IF (new.fin_cita = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.fin_cita = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `estado_consulta` enum('R','P','A') DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `consulta`
--
DELIMITER $$
CREATE TRIGGER `validar_consulta` BEFORE INSERT ON `consulta` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_consulta = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_consulta = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_consulta_actualizar` BEFORE UPDATE ON `consulta` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_consulta = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_consulta = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE `cronograma` (
  `id_cronograma` int(11) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `estado_cronograma` enum('A','I') DEFAULT 'A',
  `id_area` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `cronograma`
--
DELIMITER $$
CREATE TRIGGER `validar_cronograma` BEFORE INSERT ON `cronograma` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_cronograma = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_cronograma = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.dia = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.dia = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_cronograma_actualizar` BEFORE UPDATE ON `cronograma` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_cronograma = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_cronograma = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.dia = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.dia = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dentista`
--

CREATE TABLE `dentista` (
  `id_dentista` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `especialidad` varchar(30) NOT NULL,
  `estado_dentista` enum('A','I') DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `dentista`
--
DELIMITER $$
CREATE TRIGGER `validar_dentista` BEFORE INSERT ON `dentista` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_dentista = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_dentista = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_dentista_actualizar` BEFORE UPDATE ON `dentista` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_dentista = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_dentista = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diente`
--

CREATE TABLE `diente` (
  `id_diente` int(11) NOT NULL,
  `nom_diente` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diente`
--

INSERT INTO `diente` (`id_diente`, `nom_diente`) VALUES
(11, 'Canino Inferior Derecho'),
(12, 'Canino Inferior Izquierdo'),
(9, 'Canino Superior Derecho'),
(10, 'Canino Superior Izquierdo'),
(3, 'Incisivo Central Inferior Derecho'),
(4, 'Incisivo Central Inferior Izquierdo'),
(1, 'Incisivo Central Superior Derecho'),
(2, 'Incisivo Central Superior Izquierdo'),
(7, 'Incisivo Lateral Inferior Derecho'),
(8, 'Incisivo Lateral Inferior Izquierdo'),
(5, 'Incisivo Lateral Superior Derecho'),
(6, 'Incisivo Lateral Superior Izquierdo'),
(23, 'Primer Molar Inferior Derecho'),
(24, 'Primer Molar Inferior Izquierdo'),
(21, 'Primer Molar Superior Derecho'),
(22, 'Primer Molar Superior Izquierdo'),
(15, 'Primer Premolar Inferior Derecho'),
(16, 'Primer Premolar Inferior Izquierdo'),
(13, 'Primer Premolar Superior Derecho'),
(14, 'Primer Premolar Superior Izquierdo'),
(27, 'Segundo Molar Inferior Derecho'),
(28, 'Segundo Molar Inferior Izquierdo'),
(25, 'Segundo Molar Superior Derecho'),
(26, 'Segundo Molar Superior Izquierdo'),
(19, 'Segundo Premolar Inferior Derecho'),
(20, 'Segundo Premolar Inferior Izquierdo'),
(17, 'Segundo Premolar Superior Derecho'),
(18, 'Segundo Premolar Superior Izquierdo'),
(31, 'Tercer Molar Inferior Derecho'),
(32, 'Tercer Molar Inferior Izquierdo'),
(29, 'Tercer Molar Superior Derecho'),
(30, 'Tercer Molar Superior Izquierdo');

--
-- Disparadores `diente`
--
DELIMITER $$
CREATE TRIGGER `validar_diente` BEFORE INSERT ON `diente` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_diente = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_diente = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_diente_actualizar` BEFORE UPDATE ON `diente` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_diente = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_diente = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_promocion`
--

CREATE TABLE `dt_promocion` (
  `id_dtp` int(11) NOT NULL,
  `id_promocion` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `costo_servicio` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `dt_promocion`
--
DELIMITER $$
CREATE TRIGGER `validar_dt_promocion` BEFORE INSERT ON `dt_promocion` FOR EACH ROW BEGIN
DECLARE msg varchar(25);


IF (new.costo_servicio < 0) THEN
SET msg = 'No se Permiten Valores Negativos';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.costo_servicio = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.costo_servicio = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_dt_promocion_actualizar` BEFORE UPDATE ON `dt_promocion` FOR EACH ROW BEGIN
DECLARE msg varchar(25);


IF (new.costo_servicio < 0) THEN
SET msg = 'No se Permiten Valores Negativos';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.costo_servicio = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.costo_servicio = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_dentista` int(11) NOT NULL,
  `id_cronograma` int(11) NOT NULL,
  `estado_horario` enum('L','O') DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `horario`
--
DELIMITER $$
CREATE TRIGGER `validar_horario` BEFORE INSERT ON `horario` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_horario = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_horario = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_horario_actualizar` BEFORE UPDATE ON `horario` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_horario = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_horario = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `id_odontograma` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_diente` int(11) NOT NULL,
  `estado_diente` enum('B','P','E','C') DEFAULT 'B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `odontograma`
--
DELIMITER $$
CREATE TRIGGER `validar_odontograma_actualizar` BEFORE UPDATE ON `odontograma` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_diente = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_diente = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `estado_paciente` enum('A','I') DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `paciente`
--
DELIMITER $$
CREATE TRIGGER `generar_odontograma` AFTER INSERT ON `paciente` FOR EACH ROW BEGIN

  declare i INT;  

    set i = 1;
    while i<=32 do
    
INSERT INTO `odontograma`(`id_paciente`, `id_diente`, `estado_diente`) 
VALUES (new.id_paciente,i,"B");
      set i=i+1;
    end while;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_paciente` BEFORE INSERT ON `paciente` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_paciente = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_paciente = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_paciente_actualizar` BEFORE UPDATE ON `paciente` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_paciente = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_paciente = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nom_persona` varchar(75) NOT NULL,
  `ape_persona` varchar(75) NOT NULL,
  `dni_persona` char(8) NOT NULL,
  `direccion_persona` varchar(150) DEFAULT NULL,
  `email_persona` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `persona`
--
DELIMITER $$
CREATE TRIGGER `validar_persona` BEFORE INSERT ON `persona` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.nom_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.ape_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.ape_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.dni_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.dni_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_persona_actualizar` BEFORE UPDATE ON `persona` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.nom_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.ape_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.ape_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.dni_persona = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;
IF (new.dni_persona = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL,
  `nom_promocion` varchar(75) NOT NULL,
  `descripcion_promocion` varchar(150) NOT NULL,
  `fecha_incio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado_promocion` enum('R','A','I') DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `promocion`
--
DELIMITER $$
CREATE TRIGGER `validar_promocion` BEFORE INSERT ON `promocion` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_promocion = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_promocion = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_promocion_actualizar` BEFORE UPDATE ON `promocion` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.estado_promocion = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.estado_promocion = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nom_servicio` varchar(75) NOT NULL,
  `descripcion_servicio` varchar(150) DEFAULT NULL,
  `id_area` int(11) NOT NULL,
  `estado_servicio` enum('A','I') DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `servicio`
--
DELIMITER $$
CREATE TRIGGER `validar_servicio` BEFORE INSERT ON `servicio` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_servicio = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_servicio = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `validar_servicio_actualizar` BEFORE UPDATE ON `servicio` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_servicio = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_servicio = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(11) NOT NULL,
  `id_consulta` int(11) NOT NULL,
  `id_dtp` int(11) NOT NULL,
  `estado_tratamiento` enum('R','P','A') NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `nom_turno` varchar(25) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `turno`
--
DELIMITER $$
CREATE TRIGGER `validar_turno` BEFORE INSERT ON `turno` FOR EACH ROW BEGIN
DECLARE msg varchar(25);

IF (new.nom_turno = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.nom_turno = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.hora_inicio = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.hora_inicio = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.hora_fin = '') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.hora_fin = ' ') THEN
SET msg = 'Campo Vacio';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;

IF (new.hora_inicio < new.hora_fin) THEN
SET msg = 'Error en el Ingreso de la Horas';
SIGNAL SQLSTATE '45000' 
SET MESSAGE_TEXT = msg;
END IF;



END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD UNIQUE KEY `nom_area` (`nom_area`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`id_cronograma`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `dentista`
--
ALTER TABLE `dentista`
  ADD PRIMARY KEY (`id_dentista`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `diente`
--
ALTER TABLE `diente`
  ADD PRIMARY KEY (`id_diente`),
  ADD UNIQUE KEY `nom_diente` (`nom_diente`);

--
-- Indices de la tabla `dt_promocion`
--
ALTER TABLE `dt_promocion`
  ADD PRIMARY KEY (`id_dtp`),
  ADD KEY `id_promocion` (`id_promocion`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `id_dentista` (`id_dentista`),
  ADD KEY `id_cronograma` (`id_cronograma`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`id_odontograma`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_diente` (`id_diente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `dni_persona` (`dni_persona`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id_promocion`),
  ADD UNIQUE KEY `nom_promocion` (`nom_promocion`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD UNIQUE KEY `nom_servicio` (`nom_servicio`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `id_consulta` (`id_consulta`),
  ADD KEY `id_dtp` (`id_dtp`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id_turno`),
  ADD UNIQUE KEY `nom_turno` (`nom_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `id_cronograma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `dentista`
--
ALTER TABLE `dentista`
  MODIFY `id_dentista` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diente`
--
ALTER TABLE `diente`
  MODIFY `id_diente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `dt_promocion`
--
ALTER TABLE `dt_promocion`
  MODIFY `id_dtp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `id_odontograma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id_promocion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Filtros para la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD CONSTRAINT `cronograma_ibfk_1` FOREIGN KEY (`id_turno`) REFERENCES `turno` (`id_turno`),
  ADD CONSTRAINT `cronograma_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Filtros para la tabla `dentista`
--
ALTER TABLE `dentista`
  ADD CONSTRAINT `dentista_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `dt_promocion`
--
ALTER TABLE `dt_promocion`
  ADD CONSTRAINT `dt_promocion_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  ADD CONSTRAINT `dt_promocion_ibfk_2` FOREIGN KEY (`id_promocion`) REFERENCES `promocion` (`id_promocion`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_cronograma`) REFERENCES `cronograma` (`id_cronograma`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_dentista`) REFERENCES `dentista` (`id_dentista`);

--
-- Filtros para la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD CONSTRAINT `odontograma_ibfk_1` FOREIGN KEY (`id_diente`) REFERENCES `diente` (`id_diente`),
  ADD CONSTRAINT `odontograma_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `tratamiento_ibfk_1` FOREIGN KEY (`id_dtp`) REFERENCES `dt_promocion` (`id_dtp`),
  ADD CONSTRAINT `tratamiento_ibfk_2` FOREIGN KEY (`id_consulta`) REFERENCES `consulta` (`id_consulta`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
