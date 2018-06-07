-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2018 a las 18:31:07
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lsst`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiometria_oidoderecho`
--

CREATE TABLE `audiometria_oidoderecho` (
  `id` int(11) NOT NULL,
  `antecedenteaudiometria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ant_personalquirurgico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ant_personalgeneral` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_personalquirurgico` varchar(1800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_personalgeneral` varchar(1800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ant_familiarquirurgico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ant_familiargeneral` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_familiarquirurgico` varchar(1800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_familiargeneral` varchar(1800) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ant_audiometriaanterior` varchar(2500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `otoscopia_od` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hallazgo_od` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `250` int(11) NOT NULL,
  `500` int(11) NOT NULL,
  `1000` int(11) NOT NULL,
  `2000` int(11) NOT NULL,
  `4000` int(11) NOT NULL,
  `8000` int(11) NOT NULL,
  `promedio_od` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `observaciones` varchar(3500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `retamizaje` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `evaluaciondiagnostica` varchar(450) COLLATE utf8mb4_spanish_ci NOT NULL,
  `interconsulta` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `controlanual` varchar(120) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paciente_audiometria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `audiometria_oidoderecho`
--

INSERT INTO `audiometria_oidoderecho` (`id`, `antecedenteaudiometria`, `ant_personalquirurgico`, `ant_personalgeneral`, `desc_personalquirurgico`, `desc_personalgeneral`, `ant_familiarquirurgico`, `ant_familiargeneral`, `desc_familiarquirurgico`, `desc_familiargeneral`, `ant_audiometriaanterior`, `otoscopia_od`, `hallazgo_od`, `250`, `500`, `1000`, `2000`, `4000`, `8000`, `promedio_od`, `observaciones`, `retamizaje`, `evaluaciondiagnostica`, `interconsulta`, `controlanual`, `paciente_audiometria`) VALUES
(10, 'Si', 'Si', 'Si', 'actualizado,,, antecedentes quirurgico ejemplo personal,,,, Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'actualizado,,,antecedentes general ejemplo general,,, ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'Si', 'Si', 'actualizado,,,antecedentes quirurgico ejemplo familiar,,,,ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'actualizado,,,antecedentes general ejemplo familiar,,,, ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'actualizado,,,ejemplo antecedentes de audiometria anterior,,,ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'Si', 'actualizado,,,ejemplo hallazgo oido derecho,,,, ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras ', 20, 20, 20, 20, 10, 20, '18.333333333333332', 'actualizado,,,ejemplo observaciones audiometria ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'No', 'actualizado,,,ejemplo evaluaciones audiologica diagnostica ejemplo,,,,, Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'No', 'No', 35),
(11, 'No', 'No', 'No', 'no presenta', 'no presenta', 'No', 'No', 'no presenta', 'no presenta', 'no presenta', 'Si', 'normales', 30, 30, 30, 30, 30, 30, '30', 'oidos sanos ', 'No', 'oidos en perfecto estado', 'No', 'No', 43),
(14, 'No', 'No', 'No', '', '', 'No', 'No', '', '', 'no refiere', 'Si', 'oido derecho normal', 30, 30, 30, 30, 30, 30, '30', 'ejemplo observaciones', 'No', '', 'No', 'No', 49),
(15, 'Si', 'Si', 'No', 'operacion timpano Izquierdo del oido', '', 'No', 'No', '', '', 'ejemplo aqui antecedentes de audiometria anterior', 'Si', 'otoscopia normal oido derecho', 30, 30, 30, 30, 30, 30, '30', 'ejemplo observacion normal', 'No', 'ejemplo evaluacion audiologica normal', 'No', 'No', 53),
(16, 'No', 'No', 'No', 'ninguno', 'ninguno', 'No', 'No', 'ninguno', 'ninguno', 'ninguno', 'Si', 'ninguno', 30, 30, 30, 30, 30, 30, '30.00', 'oidos sanos ', 'No', 'oidos en perfecto estado', 'No', 'No', 54),
(17, 'No', 'No', 'No', 'ninguno', 'ninguno', 'No', 'No', 'ninguno', 'ninguno', 'ninguno', 'Si', 'ninguno', 30, 30, 30, 30, 30, 30, '30.00', 'ninguno', 'No', 'ninguno', 'No', 'No', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiometria_oidoizquierdo`
--

CREATE TABLE `audiometria_oidoizquierdo` (
  `id` int(11) NOT NULL,
  `otoscopia_oi` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hallazgo_oi` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `250_izq` int(11) NOT NULL,
  `500_izq` int(11) NOT NULL,
  `1000_izq` int(11) NOT NULL,
  `2000_izq` int(11) NOT NULL,
  `4000_izq` int(11) NOT NULL,
  `8000_izq` int(11) NOT NULL,
  `promedio_oi` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_audiometria_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `audiometria_oidoizquierdo`
--

INSERT INTO `audiometria_oidoizquierdo` (`id`, `otoscopia_oi`, `hallazgo_oi`, `250_izq`, `500_izq`, `1000_izq`, `2000_izq`, `4000_izq`, `8000_izq`, `promedio_oi`, `id_audiometria_paciente`) VALUES
(5, 'Si', 'actualizado,,,ejemplo hallazgo oido izquierdo,,,, ejemplo Un texto narrativo se caracteriza por contar una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 20, 20, 20, 20, 20, 30, '21.666666666666668', 10),
(6, 'Si', 'normales', 30, 30, 30, 30, 30, 30, '30', 11),
(9, 'Si', 'oido izquierdo normal', 30, 30, 30, 30, 30, 30, '30', 14),
(10, 'Si', 'otoscopia normal oido izquierdo', 30, 30, 30, 30, 30, 30, '30', 15),
(11, 'Si', 'ninguno', 30, 30, 30, 30, 30, 30, '30.00', 16),
(12, 'Si', 'ninguno', 30, 30, 30, 30, 30, 30, '30.00', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_basicos`
--

CREATE TABLE `datos_basicos` (
  `id_historia` int(11) NOT NULL,
  `motivo_evaluacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_empresa` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `actividad_economica` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_a_desempenar` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_empresa` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `numero_nit` int(11) NOT NULL,
  `telefono_empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(180) COLLATE utf8_spanish_ci NOT NULL,
  `hijos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` varchar(380) COLLATE utf8_spanish_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `escolaridad` varchar(380) COLLATE utf8_spanish_ci NOT NULL,
  `eps` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `arl` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `afp` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fk_d_complementario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_basicos`
--

INSERT INTO `datos_basicos` (`id_historia`, `motivo_evaluacion`, `fecha`, `hora`, `nombre_empresa`, `actividad_economica`, `cargo_a_desempenar`, `ciudad`, `direccion_empresa`, `numero_nit`, `telefono_empresa`, `edad`, `direccion`, `hijos`, `estado_civil`, `celular`, `escolaridad`, `eps`, `arl`, `afp`, `fk_d_complementario`) VALUES
(30, 'Ingreso', '2017-09-20', '02:39:25 PM', 'ops', 'constructora', 'obrero', 'barranquilla', 'cra 12 # 10-9', 223, '3119596', 21, 'cra 2 #10-14', 'si', 'Casado', 2147483647, 'Tecnologo', 'eps ', 'arl', 'afp', NULL),
(31, 'Ingreso', '2017-12-20', '03:26:34 PM', 's&sds', 'actEconomica', 'obrero12', 'barranquilla', 'cra 9 - c45', 202020, '2147483647', 21, 'cra 1d -g9', 'si', 'Casado', 2147483647, 'Post Grado', 'eps2', 'arl2', 'afp2', 5),
(35, 'Periodico', '2017-12-22', '03:26:34 PM', 's&sds', 'actEconomica', 'obrero12', 'barranquilla', 'cra 9 - c45', 202020, '2147483647', 21, 'cra 1d -g9', 'si', 'Casado', 2147483647, 'Post Grado', 'eps2', 'arl2', 'afp2', 5),
(39, 'Periodico', '2017-12-22', '10:47:35 AM', 'acd', 'constructora', 'obrero', 'barranquilla', 'cra 8 - 51D', 25253, '2147483647', 20, 'cra 21#1015', 'no', 'Soltero', 2147483647, 'Tecnologo', 'eps', 'arl', 'afp', 9),
(40, 'Ingreso', '2017-12-27', '10:29:51 AM', 'het&&tt', 'construccion', 'Obrero', 'barranquilla', 'cra 3 # 9 -10 ', 2103, '3458969', 21, 'cra 9 #12- 10 ', 'no', 'Soltero', 2147483647, 'Universitario', 'ejemplo eps', 'ejemplo arl', 'ejemplo afp', 10),
(41, 'Ingreso', '2017-12-28', '08:44:30 AM', 'uth ', 'comercio', 'obrero', 'barranquilla', 'cra 25 g 15a', 45452, '3458969', 21, 'cra 9 #11D - 13', 'no', 'Soltero', 2147483647, 'Tecnico', 'ejemplo eps', 'ejemplo arl', 'ejemplo afp', 11),
(42, 'Periodico', '2017-12-28', '09:50:28 AM', 's&sds', 'actEconomica', 'obrero12', 'barranquilla', 'cra 9 - c45', 202020, '2147483647', 21, 'cra 1d -g9', 'si', 'Casado', 2147483647, 'Post Grado', 'eps2', 'arl2', 'afp2', 5),
(43, 'Ingreso', '2018-02-26', '05:47:16 PM', 'strte', 'comercio y construccion', 'obrero', 'barranquilla', 'cra 9-10g', 12355, '3258958', 22, 'cra 7 # e 2125', 'no', 'Union libre', 3258987, 'Tecnologo', 'eps jemplo', 'arl ejemplo', 'afp ejemplo', 12),
(49, 'Ingreso', '2018-03-13', '05:29:31 PM', 'GTHIO', 'Construccion y mineria', 'maestro de obra', 'barranquilla', 'cra 12 # 10-9', 66661, '3402523 EXT 221', 23, 'cra 12 # 11D - 49 Barrio las gaviotas', 'no', 'Soltero', 2147483647, 'Tecnico', 'sura', 'sura', 'proteccion', 18),
(50, 'Ingreso', '2018-04-27', '05:01:59 PM', 'daga sa', 'constructora', 'obrero', 'barranquilla', 'cra 21-10g', 14444, '3215898', 20, 'cra 18 # 1D - 49 Barrio el silencio', 'no', 'Casado', 2147483647, 'Universitario', 'sura', 'sura', 'proteccion', 19),
(52, 'Ingreso', '2018-03-05', '09:08:59 AM', 'Sgrth', 'constructora', 'Salubrista', 'barranquilla', 'cra 8 # 17D-9', 8881, '3402526', 20, 'cra 1 # 11C - 49 Barrio Boston', 'no', 'Soltero', 2147483647, 'Tecnologo', 'Sura', 'sura', 'proteccion', 20),
(53, 'Ingreso', '2018-03-08', '10:48:31 AM', 'economop', 'Construccion y Comercio', 'Salubrista', 'barranquilla - Altlantico', 'carrera 18 # 12 B', 10001, '3245898', 20, 'carrera 5 D 25 Barrio Villa Esperanza', 'no', 'Casado', 315879856, 'Tecnologo', 'Coomeva', 'Sura', 'Proteccion', 21),
(54, 'Ingreso', '2017-05-06', '10:14:20 PM', 'Alkosto', 'Comercio', 'ayudante de bodega', 'barranquilla', 'cra 85 #10 b', 255899, '3704021', 21, 'cra 9 D #25-87 ', 'no', 'Soltero', 2147483647, 'Tecnico', 'sura ', 'proteccion', 'proteccion', 24),
(55, 'Ingreso', '2018-06-06', '12:48:31 AM', 'Panamericana', 'Comercio', 'Asistente administrativo', 'barranquilla', 'cra 7 #11 b 28 ', 9999, '3485958', 22, 'cra 9 D #25-87 ', 'si', 'Union libre', 2147483647, 'Tecnologo', 'coomeva', 'sura', 'sura', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_basicos_atencion`
--

CREATE TABLE `datos_basicos_atencion` (
  `id` int(11) NOT NULL,
  `inicio_timeaudiometria` time NOT NULL,
  `final_timeaudiometria` time NOT NULL,
  `inicio_timevisiometria` time NOT NULL,
  `final_timevisiometria` time NOT NULL,
  `inicio_timeespirometria` time NOT NULL,
  `final_timeespirometria` time NOT NULL,
  `inicio_timepsicologia` time NOT NULL,
  `final_timepsicologia` time NOT NULL,
  `inicio_timeenfermeria` time NOT NULL,
  `final_timeenfermeria` time NOT NULL,
  `inicio_timemedico` time NOT NULL,
  `final_timemedico` time NOT NULL,
  `id_datos_basicos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `datos_basicos_atencion`
--

INSERT INTO `datos_basicos_atencion` (`id`, `inicio_timeaudiometria`, `final_timeaudiometria`, `inicio_timevisiometria`, `final_timevisiometria`, `inicio_timeespirometria`, `final_timeespirometria`, `inicio_timepsicologia`, `final_timepsicologia`, `inicio_timeenfermeria`, `final_timeenfermeria`, `inicio_timemedico`, `final_timemedico`, `id_datos_basicos`) VALUES
(27, '11:03:27', '11:43:30', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 43),
(30, '05:04:33', '05:49:50', '12:06:48', '04:01:27', '08:44:21', '09:05:04', '09:18:52', '09:26:15', '10:17:19', '11:51:15', '09:46:08', '10:01:26', 49),
(31, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 50),
(33, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '03:14:02', '05:00:45', '00:00:00', '00:00:00', 52),
(34, '10:50:42', '11:00:33', '02:22:58', '03:20:23', '11:48:09', '03:40:02', '00:00:00', '04:15:35', '00:00:00', '02:59:55', '00:00:00', '03:43:52', 53),
(35, '11:10:46', '11:14:11', '00:00:00', '12:21:55', '00:00:00', '11:22:55', '11:26:07', '11:35:41', '10:20:28', '10:49:49', '00:00:00', '12:31:09', 54),
(36, '09:38:57', '09:41:09', '09:45:50', '09:48:11', '09:51:28', '09:51:55', '09:52:40', '09:54:10', '08:42:58', '09:00:45', '09:58:29', '10:05:42', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_basicos_tipo_documento`
--

CREATE TABLE `datos_basicos_tipo_documento` (
  `idtd` int(11) NOT NULL,
  `tipo_documento` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `datos_basicos_tipo_documento`
--

INSERT INTO `datos_basicos_tipo_documento` (`idtd`, `tipo_documento`) VALUES
(1, 'Cedula '),
(2, 'Cedula de extranjeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_complementarios`
--

CREATE TABLE `datos_complementarios` (
  `id` int(11) NOT NULL,
  `nombres_apellidos` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fk_tipo_documento` int(11) DEFAULT NULL,
  `numero_documento` int(11) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `genero` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `datos_complementarios`
--

INSERT INTO `datos_complementarios` (`id`, `nombres_apellidos`, `fk_tipo_documento`, `numero_documento`, `fecha_expedicion`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`) VALUES
(4, 'jose quintana nuÃ±ez', 1, 2236, '0000-00-00', '1996-12-20', 'barranquilla', 'masculino'),
(5, 'albeiro marquez nuÃ±ez', 1, 1020, '0000-00-00', '1997-12-03', 'palmar', 'masculino'),
(9, 'jaime molinares perez', 1, 8898, '0000-00-00', '1998-12-06', 'polonuevo', 'masculino'),
(10, 'Jhon Duque Marquez', 1, 1050, '0000-00-00', '1997-12-03', 'Soledad - Atlantico', 'masculino'),
(11, 'Juan Roa Cantillo', 1, 1050255, '0000-00-00', '1997-12-05', 'Malambo - Atlantico', 'masculino'),
(12, 'maicon dominguez castro', 1, 1048585979, '0000-00-00', '0995-02-01', 'puerto colombia - atlantico', 'masculino'),
(18, 'julian alcoba suarez', 1, 59595959, '0000-00-00', '1995-01-28', 'barranquilla', 'masculino'),
(19, 'alex campo pereira', 1, 36363636, '0000-00-00', '1998-02-25', 'barranquilla', 'masculino'),
(20, 'Paola Caceres Jimenez', 1, 323232, '2015-02-26', '1997-01-28', 'barranquilla', 'femenino'),
(21, 'Alfonso Perez Cortes', 1, 1048322678, '2016-02-27', '1998-03-06', 'Palmar - Atlantico', 'masculino'),
(23, 'juan pedro perez', 1, 14822558, '2018-04-11', '1997-04-04', 'Palmar - Atlantico', 'masculino'),
(24, 'Juan lopez restrepo', 1, 9048277, '2015-02-02', '1997-03-07', 'Polonuevo-Atlantico', 'masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_estado_atencion`
--

CREATE TABLE `db_estado_atencion` (
  `id` int(11) NOT NULL,
  `audiometria` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `visiometria` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `espirometria` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `psicologia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `enfermeria` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `medico` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `db_estado_atencion`
--

INSERT INTO `db_estado_atencion` (`id`, `audiometria`, `visiometria`, `espirometria`, `psicologia`, `enfermeria`, `medico`, `paciente`) VALUES
(4, 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 49),
(5, 'Priorizar Esta Atencion', 'Esperando Atencion', 'Esperando Atencion', 'Esperando Atencion', 'Esperando Atencion', 'Esperando Atencion', 50),
(7, 'Esperando Atencion', 'Priorizar Esta Atencion', 'Esperando Atencion', 'Esperando Atencion', 'Atencion Finalizada', 'Esperando Atencion', 52),
(8, 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 53),
(9, 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 54),
(10, 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 'Atencion Finalizada', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_accidentes`
--

CREATE TABLE `enfermeria_accidentes` (
  `id` int(11) NOT NULL,
  `accidentelaboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `accfecha` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `accempresa` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `causa` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `lesion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `afectacion` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `incapacidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `secuela` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_protec_personal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_accidentes`
--

INSERT INTO `enfermeria_accidentes` (`id`, `accidentelaboral`, `accfecha`, `accempresa`, `causa`, `lesion`, `afectacion`, `incapacidad`, `secuela`, `id_protec_personal`) VALUES
(5, 'Si', '2011-12-06', 'actualizado,,,empre uno', 'actualizado,,,causa uno', 'Si', 'actualizado,,,parte afectada 1', 'Si', 'Si', 5),
(6, 'No', '', '', '', '', '', '', '', 6),
(15, 'Si', '2018-02-26', 'empresa 1', 'causa 1', 'Si', 'parte 1', 'Si', 'Si', 15),
(17, 'Si', '2018-03-06', 'empresa1', 'causa1', 'Si', 'parte1', 'Si', 'Si', 17),
(19, '', '', '', '', '', '', '', '', 19),
(21, 'Si', '2016-09-03', 'solaring', 'caida por escaleras', 'si', 'columna', 'si', 'si', 21),
(22, 'No', '', '', '', '', '', '', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_antecedentes`
--

CREATE TABLE `enfermeria_antecedentes` (
  `id` int(11) NOT NULL,
  `infancia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hipertension_arterial` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `alergias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cirugias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hospitalizaciones` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_cardiaca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_piel_anexos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `hernias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tunel_carpo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_quervein` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `trauma` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_vias_renal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_oido_nariz_laringe` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_vascular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lumbalgias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_transmision_sexual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_pulmonar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_visual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `varicocele` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cancer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vacunas_dosis` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_acido_peptica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `diabetes` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_hepatica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fracturas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `toxicos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_mental` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enf_hematicos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `osteomuscular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dislipidemias` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ant_observaciones` varchar(3000) COLLATE utf8_spanish_ci NOT NULL,
  `familiar_ant` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desc_ant_familiar` varchar(3000) COLLATE utf8_spanish_ci NOT NULL,
  `personal_ant` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desc_ant_per` varchar(3000) COLLATE utf8_spanish_ci NOT NULL,
  `id_paciente_riesgos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_antecedentes`
--

INSERT INTO `enfermeria_antecedentes` (`id`, `infancia`, `hipertension_arterial`, `alergias`, `cirugias`, `hospitalizaciones`, `enf_cardiaca`, `enf_piel_anexos`, `hernias`, `tunel_carpo`, `enf_quervein`, `trauma`, `enf_vias_renal`, `enf_oido_nariz_laringe`, `enf_vascular`, `lumbalgias`, `enf_transmision_sexual`, `enf_pulmonar`, `enf_visual`, `varicocele`, `cancer`, `vacunas_dosis`, `enf_acido_peptica`, `diabetes`, `enf_hepatica`, `fracturas`, `toxicos`, `enf_mental`, `enf_hematicos`, `osteomuscular`, `dislipidemias`, `ant_observaciones`, `familiar_ant`, `desc_ant_familiar`, `personal_ant`, `desc_ant_per`, `id_paciente_riesgos`) VALUES
(5, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'actualizado,,,ejemplo observaciones antecedentes', '', 'actualizado,,,ejemplo familiar ant ', '', 'actualizado,,,ejemplo personal ant', 5),
(6, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'ninguna', 'Si', '', 'Si', '', 6),
(15, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'ejemplo observaciones personales', '', 'ejemplo antecedentes familiares', '', 'ejemplo antecedentes personales', 15),
(17, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'ejemplo observacion antecedentes personales - familiares', '', 'ejemplo antecedente familiar', 'Si', '', 17),
(19, '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'Si', '', 'Si', '', 23),
(21, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'Si', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'ninguna', 'Si', '', 'Si', '', 26),
(22, 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'Si', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'ninguna', 'Si', '', 'Si', '', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_enfermedad`
--

CREATE TABLE `enfermeria_enfermedad` (
  `id` int(11) NOT NULL,
  `enfermedadlaboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fechaenf` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `empresaenf` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `diagnosticoenf` varchar(900) COLLATE utf8_spanish_ci NOT NULL,
  `arlenf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `reubicacion` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `pension` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_accidente_trabajo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_enfermedad`
--

INSERT INTO `enfermeria_enfermedad` (`id`, `enfermedadlaboral`, `fechaenf`, `empresaenf`, `diagnosticoenf`, `arlenf`, `reubicacion`, `pension`, `id_accidente_trabajo`) VALUES
(5, 'Si', '2005-12-01', 'actualizado,,,emp uno ', 'actualizado,,,diag uno', '', 'Si', 'Si', 5),
(6, 'No', '', '', '', '', '', '', 6),
(12, '', '2018-01-25', 'empresa uno', 'diag 1', 'Si', 'Si', 'Si', 15),
(14, 'Si', '2018-07-02', 'emp5', 'diag5', 'No', 'No', 'No', 17),
(16, '', '', '', '', '', '', '', 19),
(18, 'Si', '2017-06-01', 'ternium', 'infeccion respiratoria', 'si ', 'no', 'no', 21),
(19, 'No', '', '', '', '', '', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_epp`
--

CREATE TABLE `enfermeria_epp` (
  `id` int(11) NOT NULL,
  `uso_epp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_empresa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `actual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `casco` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `guantes` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `botas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gafas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tapabocas` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `overol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `protectorauditivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `protectorrespiratorio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `otroepp` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `adecuados` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `adecuadosolo` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `id_ginecologia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_epp`
--

INSERT INTO `enfermeria_epp` (`id`, `uso_epp`, `cargo_empresa`, `actual`, `casco`, `guantes`, `botas`, `gafas`, `tapabocas`, `overol`, `protectorauditivo`, `protectorrespiratorio`, `otroepp`, `adecuados`, `adecuadosolo`, `id_ginecologia`) VALUES
(5, 'Si', 'Si', 'Si', 'Si', '', 'Si', 'Si', 'Si', 'Si', 'No', 'No', 'actualizado otros elementos proteccion', 'Si', 'actualizado guantes, botas, tapabocas', 5),
(6, 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', '', 6),
(15, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'No', 'No', 'No', 'ejemplo otro elemento de proteccion personal', 'Si', 'gafas, tapabocas, botas', 15),
(17, 'Si', 'Si', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'ejemplo otro elemento de pp', 'Si', '', 17),
(19, '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', '', 19),
(21, '', 'Si', 'No', 'Si', 'Si', 'No', 'No', 'Si', 'No', 'No', 'Si', '', '', 'casco y guantes', 21),
(22, 'Si', 'Si', 'Si', 'Si', 'No', 'Si', 'No', 'Si', 'No', 'No', 'Si', '', '', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_ginecologia`
--

CREATE TABLE `enfermeria_ginecologia` (
  `id` int(11) NOT NULL,
  `menarquia` int(11) NOT NULL,
  `ciclos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fichaobstetrica` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `planifica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `metodo` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `ultimamestruacion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `ultimacitologia` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `resultado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `flujovaginal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dolorpelvico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `dolorsenos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_ant_per_fam` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_ginecologia`
--

INSERT INTO `enfermeria_ginecologia` (`id`, `menarquia`, `ciclos`, `fichaobstetrica`, `planifica`, `metodo`, `ultimamestruacion`, `ultimacitologia`, `resultado`, `flujovaginal`, `dolorpelvico`, `dolorsenos`, `id_ant_per_fam`) VALUES
(5, 0, '', '', '', '', '', '', '', '', '', '', 5),
(6, 0, '', '', '', '', '', '', '', '', '', '', 6),
(15, 2, 'Regular', 'Gestacion | Hijos Vivos', 'Si', 'ejemplo planificacion', '2018-03-04', '2017-09-25', 'Normal', 'No', 'No', 'No', 15),
(17, 0, '', '', '', '', '', '', '', '', '', '', 17),
(19, 0, '', '', '', '', '', '', '', '', '', '', 19),
(21, 0, 'Seleccionar', '', '', '', '', '', '', '', '', '', 21),
(22, 0, 'Seleccionar', '', '', '', '', '', '', '', '', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_habitosaludable`
--

CREATE TABLE `enfermeria_habitosaludable` (
  `id` int(11) NOT NULL,
  `practicadeporte` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualdeporte` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `sedentario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ejerciciocardiopulmonar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `otroejercicio` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `frecuenciaejercicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_enfermedad_prof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_habitosaludable`
--

INSERT INTO `enfermeria_habitosaludable` (`id`, `practicadeporte`, `cualdeporte`, `sedentario`, `ejerciciocardiopulmonar`, `otroejercicio`, `frecuenciaejercicio`, `id_enfermedad_prof`) VALUES
(5, 'Si', 'actualizado,,,futbol', 'Si', 'Si', 'actualizado,,,otro deporte ejemplo', 'Diario', 5),
(6, 'Si', 'Caminar | Trotar', 'Si', 'Si', '', 'Semanal', 6),
(15, 'Si', 'Caminar | Trotar', 'Si', 'No', 'tenis', 'Semanal', 12),
(17, 'Si', 'Caminar | Trotar', 'Si', 'Si', '', 'Semanal', 14),
(19, '', '', '', '', '', '', 16),
(21, 'Si', 'Caminar | Trotar', 'Si', 'Si', 'futbol, basquet', 'Semanal', 18),
(22, 'Si', 'Caminar | Trotar | Levantamiento de Pesas', 'Si', 'Si', '', 'Semanal', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_habitotoxico`
--

CREATE TABLE `enfermeria_habitotoxico` (
  `id` int(11) NOT NULL,
  `fuma` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fumador` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fumadoranios` int(11) NOT NULL,
  `exfumador` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `exfumadoranios` int(11) NOT NULL,
  `cigarrillosdiarios` int(11) NOT NULL,
  `bebidahabitual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `aniosbebedor` int(11) NOT NULL,
  `frecuenciabebida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipolicor` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `problemadebebida` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualbebidaproblema` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `exbebedor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `aniosexbebedor` int(11) NOT NULL,
  `otrohabitotoxico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualhabitotoxico` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `medicamentoregular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualmedicamento` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `cirugiaeps` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualcirugia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `tratamientopendiente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cualtratamiento` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ultimaincapacidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `motivoincapacidad` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_hab_saludables` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_habitotoxico`
--

INSERT INTO `enfermeria_habitotoxico` (`id`, `fuma`, `fumador`, `fumadoranios`, `exfumador`, `exfumadoranios`, `cigarrillosdiarios`, `bebidahabitual`, `aniosbebedor`, `frecuenciabebida`, `tipolicor`, `problemadebebida`, `cualbebidaproblema`, `exbebedor`, `aniosexbebedor`, `otrohabitotoxico`, `cualhabitotoxico`, `medicamentoregular`, `cualmedicamento`, `cirugiaeps`, `cualcirugia`, `tratamientopendiente`, `cualtratamiento`, `ultimaincapacidad`, `motivoincapacidad`, `id_hab_saludables`) VALUES
(5, 'Si', 'No', 0, 'Si', 6, 9, 'Si', 12, 'Quincenalmente', 'actualizado,,,vino ', 'Si', 'actualizado,,,ejemplo bebida problem', 'Si', 8, 'Si', 'actualizado,,,ejemplo otros habitos', 'Si', 'actualizado,,,ejemplo medi regularmente', 'Si', 'actualizado,,,ejemplo cirugia pendiente', 'Si', 'actualizado,,,ejemplo tratamkiento pend', 'Si', 'actualizado,,,ejemplo motivo incapacidad', 5),
(6, 'No', 'No', 0, 'No', 0, 0, 'Si', 0, 'Ocacionalmente', 'Cerveza |  Vino', 'No', '', 'No', 0, 'No', '', 'No', '', 'No', '', 'No', '', 'No', '', 6),
(15, 'No', 'No', 0, 'No', 0, 0, 'Si', 3, 'Ocacionalmente', 'Cerveza | Ron', 'No', '', 'No', 0, 'Si', 'ejemplo otro habito toxico', 'Si', 'ejemplo otro medicamento', 'Si', 'ejemplo cirugia', 'Si', 'ejemplo tratamiento', 'Si', 'ejemplo motivo de incapacidad', 15),
(17, 'No', 'No', 0, 'No', 0, 0, 'Si', 8, 'Ocacionalmente', 'Cerveza | Ron', 'No', 'ninguna', 'No', 0, 'No', '', 'No', '', 'No', '', 'No', '', 'No', '', 17),
(19, '', '', 0, '', 0, 0, '', 0, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 19),
(21, 'No', 'No', 0, 'No', 0, 0, 'Si', 6, 'Ocacionalmente', 'Cerveza | Ron', 'No', '', 'No', 0, 'No', '', 'Si', 'traucetamadol', 'No', '', 'No', '', 'No', '', 21),
(22, 'No', 'Si', 1, 'No', 0, 0, 'Si', 7, 'Ocacionalmente', 'Cerveza | Ron', 'No', '', 'No', 0, 'No', '', 'No', '', 'No', '', 'No', '', 'No', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_historialaboral`
--

CREATE TABLE `enfermeria_historialaboral` (
  `id` int(11) NOT NULL,
  `historialaboral` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `aniosempresa` int(11) NOT NULL,
  `dependencia` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cargo` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcioncargo` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `turno` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `actividades` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `acciones` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paciente_enfermeria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_historialaboral`
--

INSERT INTO `enfermeria_historialaboral` (`id`, `historialaboral`, `aniosempresa`, `dependencia`, `cargo`, `descripcioncargo`, `turno`, `actividades`, `acciones`, `paciente_enfermeria`) VALUES
(5, 'Si', 17, '', 'actualizado,,,obrero', 'actualizado,,,ejemplo descripcion de cargo', 'Nocturno', 'actualizado,,,Pie |  Sentado |  Arrodillado | ejemplo, otras, actividades', 'actualizado,,,Alcanzar | Halar | Empujar | Arrastrar | Manuales | ejemplo, otras, acciones', 35),
(6, 'No', 0, '', '', '', '', '', '', 43),
(15, '', 2, 'Salud Ocupacional', 'Salubrista', 'mantener en ejecucion el sistema de riesgo', 'Diurno', 'Pie |  Sentado | ejemplo otra actividad', 'Alcanzar | ejemplo otra accion', 52),
(17, 'Si', 5, 'salud ocupacional', 'salubrista', 'ejecucion del programa vigilacia epidemiologica', 'Diurno', 'Pie |  Sentado | ', 'MMSS | MMII | ', 52),
(19, '', 0, '', '', '', '', '', 'Alcanzar | ', 53),
(21, '', 2, 'logistica', 'ayudante de bodega', 'organizar mercancia', 'Nocturno', 'Pie |  Sentado |  Inclinado | ', 'Alcanzar | Halar | Empujar | ', 54),
(22, 'Si', 3, 'logistica', 'ayudante de bodega', 'organizar mercancia en bodega', '', 'Pie |  Sentado |  Inclinado |  Arrodillado | ', 'Alcanzar | Halar | Empujar | Levantar | Arrastrar | Manuales | ', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_riesgos`
--

CREATE TABLE `enfermeria_riesgos` (
  `id` int(11) NOT NULL,
  `factoresriesgos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `empresariesgo` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `riesgos` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `cargoriesgo` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `tiemporiesgo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `proteccionriesgo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_riesgos`
--

INSERT INTO `enfermeria_riesgos` (`id`, `factoresriesgos`, `empresariesgo`, `riesgos`, `cargoriesgo`, `tiemporiesgo`, `proteccionriesgo`, `id_paciente`) VALUES
(5, 'No', 'actualizado,,,empresa uno ', '', 'actualizado,,,cargo uno ', 'actualizado,,,12 meses', 'actualizado,,,guantes', 5),
(6, 'No', '', '', '', '', '', 6),
(15, 'Si', 'empresa 1', 'SI', 'ejemplo cargo 1', '2 ', 'casco', 15),
(17, 'No', 'empresa 1', 'SI', 'cargo1', '1', 'ele1', 17),
(21, 'Si', 'empresa 1', 'si', 'carg 1', '1 aÃ±os', 'elemento 1', 19),
(22, 'Si', 'empresa 2', '', 'carg 2', '2 aÃ±os', 'elemento 2', 19),
(23, 'Si', 'empresa 3', '', 'carg 3', '3 aÃ±os', 'elemento 3', 19),
(25, '', 'quimicos costa', 'quimico', 'aseador', '6 meses', 'guantes, casco, tapabocas', 21),
(26, '', 'ternium', 'mecanico', 'operador', '1 aÃ±o', 'casco', 21),
(27, 'Array', 'alkosto', 'Fisico', 'ayudante de bodega', '1 aÃ±o', 'tapabocas, casco, botas', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_riesgosempresa`
--

CREATE TABLE `enfermeria_riesgosempresa` (
  `id` int(11) NOT NULL,
  `riesgosuministrado` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fisico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mecanico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `quimico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `psicosocial` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `biologico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `electrico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ergonomico` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `otrosriesgo` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_signos_vitales` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_riesgosempresa`
--

INSERT INTO `enfermeria_riesgosempresa` (`id`, `riesgosuministrado`, `fisico`, `mecanico`, `quimico`, `psicosocial`, `biologico`, `electrico`, `ergonomico`, `otrosriesgo`, `id_signos_vitales`) VALUES
(5, 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '', '', 'actualizado,,,ejemplo otro riesgo suministrado', 5),
(6, 'No', '', '', '', '', '', '', '', 'g', 6),
(8, 'No', '', '', '', '', '', '', '', '', 15),
(9, 'Si', 'Si', 'Si', 'Si', '', '', '', '', 'ejemplo otro riesgo suministrado por empresa', 17),
(11, '', '', '', '', '', '', '', '', '', 19),
(13, 'No', '', '', '', '', '', '', '', '', 21),
(14, 'No', '', '', '', '', '', '', '', '', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeria_signovital`
--

CREATE TABLE `enfermeria_signovital` (
  `id` int(11) NOT NULL,
  `extremidadhabil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cicatrices` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tatuajes` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `perimetroabdominal` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `perimetrotoraxico` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `otrasmediciones` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `tensionarterial` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `frecuenciacardiaca` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `frecuenciarespiratoria` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `talla` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `peso` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `pesodiagnostico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_habitos_toxicos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `enfermeria_signovital`
--

INSERT INTO `enfermeria_signovital` (`id`, `extremidadhabil`, `cicatrices`, `tatuajes`, `perimetroabdominal`, `perimetrotoraxico`, `otrasmediciones`, `tensionarterial`, `frecuenciacardiaca`, `frecuenciarespiratoria`, `talla`, `peso`, `pesodiagnostico`, `id_habitos_toxicos`) VALUES
(5, 'Diestro', 'Si', 'Si', '66', '67', 'actualizado,,,ejemplo otras mediciones', '26', '86', '66', '186', '68', 'Peso Bajo', 5),
(6, 'Diestro', 'No', 'No', '21', '32', '', '21', '33', '45', '2', '65', 'Peso Adecuado', 6),
(15, 'Diestro', 'Si', 'Si', '80', '45', 'ejemplo otra medicion 76, sdsd', '70', '80', '90', '179', '70', 'Peso Adecuado', 15),
(17, 'Diestro', 'No', 'No', '20', '30', 'ejemplo otra medicion: 40.', '80', '90', '100', '180', '65', 'Peso Adecuado', 17),
(19, '', 'No', 'No', '', '', '', '', '', '', '', '', '', 19),
(21, 'Diestro', 'No', 'No', '32', '22', 'ninguna', '68', '98', '120', '179', '68', 'Adecuado', 21),
(22, 'Diestro', 'Si', 'Si', '30', '22', 'ninguna', '63', '95', '168', '179', '69', 'Adecuado', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_laboratorio`
--

CREATE TABLE `equipos_laboratorio` (
  `id` int(11) NOT NULL,
  `referencia` int(11) NOT NULL,
  `nombre_equipo` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(900) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado_disp` int(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `equipos_laboratorio`
--

INSERT INTO `equipos_laboratorio` (`id`, `referencia`, `nombre_equipo`, `descripcion`, `estado_disp`) VALUES
(3, 1120, 'Luxometro', 'ddfdgdfgdfgd dgfdgsd sdsvacg asfcfscfaS AFscaf234', 1),
(4, 1124, 'equipoejemplo2', 'savchsg sghvxga xa sxbswft 12.sgy', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_prestados`
--

CREATE TABLE `equipos_prestados` (
  `id` int(11) NOT NULL,
  `equipo` varchar(450) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `devuelto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ficha_formativa` int(11) NOT NULL,
  `hora_salida` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora_entrada` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres_estudiante` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres_instructor` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombres_persona_entrega` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `observaciones` varchar(900) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `equipos_prestados`
--

INSERT INTO `equipos_prestados` (`id`, `equipo`, `fecha`, `estado`, `devuelto`, `ficha_formativa`, `hora_salida`, `hora_entrada`, `nombres_estudiante`, `nombres_instructor`, `nombres_persona_entrega`, `observaciones`, `id_equipo`) VALUES
(6, 'Luxometro', '2017-08-14', 'Bueno', 'Si', 1122, '10:16:33 AM', '11:06:40 AM', 'GINA SANCHEZ', 'JUAN PEREZ', 'luis zapata', 'BVBVCVCCCC', 3),
(7, 'equipoejemplo2', '2017-08-14', 'Bueno', 'Si', 1180, '11:58:55 AM', '12:06:54 PM', 'paola renteria', 'jhon caicedo', 'laura perez', 'hsajdhsja dhsavn cghasvgva afcwtycd sahgvdshg gg', 4),
(10, 'Luxometro', '2017-09-22', 'Bueno', 'Si', 1256, '01:43:27 PM', '02:05:49 PM', 'juana perez', 'garbriel sanchez', 'tatiana jimenez', 'obeservaciones equipo hsahdhs', 3),
(11, 'Luxometro', '2017-11-28', 'Bueno', 'No', 2430, '08:21:26 AM', '', 'Ana castro Perez', 'Roberto Hernandez', '', 'equipo de medicion de luz entregado en buen estado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_disponible`
--

CREATE TABLE `equipo_disponible` (
  `id_estado` int(11) NOT NULL,
  `estado_eq` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `equipo_disponible`
--

INSERT INTO `equipo_disponible` (`id_estado`, `estado_eq`) VALUES
(1, 'Disponible'),
(2, 'Prestado'),
(3, 'No disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espirometria`
--

CREATE TABLE `espirometria` (
  `id` int(11) NOT NULL,
  `examen_ruta` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `esp_diagnostico` varchar(1000) COLLATE utf8mb4_spanish_ci NOT NULL,
  `espirometria_paciente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `espirometria`
--

INSERT INTO `espirometria` (`id`, `examen_ruta`, `esp_diagnostico`, `espirometria_paciente`) VALUES
(1, '35.pdf', '', 35),
(3, '49.pdf', '', 49),
(6, '53.pdf', 'Espirometria diagnostico normal', 53),
(7, '54.pdf', 'dsf', 54),
(8, '55.pdf', 'dasdwaereef', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_cal`
--

CREATE TABLE `medico_cal` (
  `id` int(11) NOT NULL,
  `apto_trabajo_nivel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apto_trabajo_altura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apto_con_restricciones_no_intervienen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `aplazado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nueva_valoracion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apto_con_limitaciones_si_intervienen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `examen_diagnostico` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones_aptitud_laboral` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `enfasis_osteomuscular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfasis_cardiovascular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfasis_pulmonar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfasis_manipulacion_alimentos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `enfasis_otros` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ef_no_defectos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ef_disminuye_capacidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ef_condiciones_agravarse` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ef_condiciones_atendidas_por_eps` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `atencion_en_eps_antesingresar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `em_alteracion_salud` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_remision` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_cal`
--

INSERT INTO `medico_cal` (`id`, `apto_trabajo_nivel`, `apto_trabajo_altura`, `apto_con_restricciones_no_intervienen`, `aplazado`, `nueva_valoracion`, `apto_con_limitaciones_si_intervienen`, `apto`, `examen_diagnostico`, `observaciones_aptitud_laboral`, `enfasis_osteomuscular`, `enfasis_cardiovascular`, `enfasis_pulmonar`, `enfasis_manipulacion_alimentos`, `enfasis_otros`, `ef_no_defectos`, `ef_disminuye_capacidad`, `ef_condiciones_agravarse`, `ef_condiciones_atendidas_por_eps`, `atencion_en_eps_antesingresar`, `em_alteracion_salud`, `id_remision`) VALUES
(4, 'Si', 'Si', 'Si', 'No', 'No', 'No', 'Si', 'Normal', 'ejemplo observaciones concepto aptitud laboral', '', '', '', '', '', 'Si', 'Si', 'No', 'No', '', '', 4),
(5, 'Si', 'Si', 'Si', 'No', 'No', 'No', 'Si', 'Normal', 'ninguna', 'No', 'No', 'Si', 'Si', 'ejemplo otro enfsis', 'Si', 'Si', 'No', 'No', '', '', 5),
(6, '', '', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', 6),
(7, 'Si', 'No', 'Si', 'No', 'No', 'No', 'Si', 'Normal', 'ejemplo observaciones concepto de aptitup laboral', 'No', 'No', 'No', 'Si', 'ejemplo otros', 'Si', 'Si', 'No', 'No', 'No', '', 7),
(12, '', '', 'No', 'No', 'No', 'No', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', 13),
(13, 'Si', 'Si', 'No', 'No', 'No', 'No', '', 'Normal', 'ninguna', 'Si', 'Si', '', '', '', 'Si', 'Si', 'No', 'No', 'No', 'No', 14),
(14, 'Si', 'No', 'Si', 'No', 'No', 'No', '', 'Normal', 'ninguna', 'Si', '', '', 'Si', '', 'Si', 'Si', 'No', 'No', 'No', 'No', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_examenfisico`
--

CREATE TABLE `medico_examenfisico` (
  `id` int(11) NOT NULL,
  `cabeza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ojos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `oidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nariz` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dentadura` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lengua` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `amigdalas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cuello` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `torax` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pulmones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `corazon` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `hernia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `abdomen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genitales` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_superiores` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_inferiores` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `columna` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `viceras` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `piel_anexos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `neurologico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `muscular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `vascular` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `oseo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `otro_examen_fisico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones_ex_fisico` varchar(3000) COLLATE utf8_spanish_ci NOT NULL,
  `phalen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `babinski_weil` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lasegue` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `finkelstein` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `romber_sensibilidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `adams` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `braggard` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `romber` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `unterberger` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `shober` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tinel` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nariz_dedo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_superior_tono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_inferior_tono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_superior_fuerza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_inferior_fuerza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_superior_sensibilidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_inferior_sensibilidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_superior_arco_movimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembro_inferior_arco_movimiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `marcha` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_superiores_funcionales` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_inferiores_funcionales` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `coordinacion_funcionales` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `columna_funcional` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `reflejos_funcionales` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `hallazgos_funcionales` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `paciente_medico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_examenfisico`
--

INSERT INTO `medico_examenfisico` (`id`, `cabeza`, `ojos`, `oidos`, `nariz`, `dentadura`, `lengua`, `amigdalas`, `cuello`, `torax`, `pulmones`, `corazon`, `hernia`, `abdomen`, `genitales`, `miembros_superiores`, `miembros_inferiores`, `columna`, `viceras`, `piel_anexos`, `neurologico`, `muscular`, `vascular`, `oseo`, `otro_examen_fisico`, `observaciones_ex_fisico`, `phalen`, `babinski_weil`, `lasegue`, `finkelstein`, `romber_sensibilidad`, `adams`, `braggard`, `romber`, `unterberger`, `shober`, `tinel`, `nariz_dedo`, `miembro_superior_tono`, `miembro_inferior_tono`, `miembro_superior_fuerza`, `miembro_inferior_fuerza`, `miembro_superior_sensibilidad`, `miembro_inferior_sensibilidad`, `miembro_superior_arco_movimiento`, `miembro_inferior_arco_movimiento`, `marcha`, `miembros_superiores_funcionales`, `miembros_inferiores_funcionales`, `coordinacion_funcionales`, `columna_funcional`, `reflejos_funcionales`, `hallazgos_funcionales`, `paciente_medico`) VALUES
(2, 'Normal', 'Normal', 'No', 'Normal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ejemplo otros examenes fisicos,,,,Con origen en el latÃ­n textus, la palabra texto describe a un con', 'ejemplo examenes observaciones,,,, Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Normal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'Anormal', 'Normal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'Anormal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'Normal', 'Anormal', 'Normal', 'Normal', 'Anormal', 'Anormal', 'ejemplo hallazgo pruebas funcionales,,,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 35),
(3, 'Normal', 'Normal', 'No', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'no', 'ninguna', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ninguno', 43),
(4, 'Normal', 'Normal', 'No', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '', '', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', '', 49),
(5, 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'No Examinado', 'ejemplo otro examen fisico dabdhbsjdibdhabshdhja dahdhavghvds', 'ejemplo observaciones examen fisico njks busabdusbad ha sd sag dh h', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'm_inferior_fuerza', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ejemplo hallazgo pruebas funciones ', 49),
(10, 'Normal', 'Normal', 'No', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', '', '', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', 'Anormal', '', 53),
(11, 'Normal', 'Normal', 'No', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ninguno', 'ninguna', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ninguno', 54),
(12, 'Normal', 'Anormal', 'No', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'ninguno', 'dificultad ', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Normal', 'Anormal', 'ninguno', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_paraclinicos`
--

CREATE TABLE `medico_paraclinicos` (
  `id` int(11) NOT NULL,
  `colesterol` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `glicemia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `trigliceridos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `frotis_faringeo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `frotis_de_una` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `hemograma` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `coprologico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `columna_paraclinico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `torax_paraclinico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `abdomen_paraclinico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_superiores_paraclinico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `miembros_inferiores_paraclinico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `electrocardiograma` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `grupo_rh` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_tamizaje_visual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_audiometria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_visiometria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_psicologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_espirometria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_optometria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ex_otros` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `diagnosticos_paraclinicos` varchar(1500) COLLATE utf8_spanish_ci NOT NULL,
  `id_examen_fisico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_paraclinicos`
--

INSERT INTO `medico_paraclinicos` (`id`, `colesterol`, `glicemia`, `trigliceridos`, `frotis_faringeo`, `frotis_de_una`, `hemograma`, `coprologico`, `columna_paraclinico`, `torax_paraclinico`, `abdomen_paraclinico`, `miembros_superiores_paraclinico`, `miembros_inferiores_paraclinico`, `electrocardiograma`, `grupo_rh`, `ex_tamizaje_visual`, `ex_audiometria`, `ex_visiometria`, `ex_psicologico`, `ex_espirometria`, `ex_optometria`, `ex_otros`, `diagnosticos_paraclinicos`, `id_examen_fisico`) VALUES
(4, 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'otros, ejemplos, paraclinicos.', '', 2),
(5, 'X', 'X', 'X', 'X', 'X', 'X', '', '', '', '', '', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', '', '', 3),
(6, 'X', 'X', 'X', '', '', 'X', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4),
(7, 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'ejemplo otro examen paraclinico realizado', 'ejemplo diagnostico examen paraclinico', 5),
(12, 'X', 'X', 'X', '', '', 'X', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 10),
(13, 'X', 'X', 'X', 'X', '', 'X', 'X', 'X', 'X', 'X', '', '', 'X', 'X', '', 'X', 'X', 'X', 'X', '', '', 'normal', 11),
(14, 'X', 'X', 'X', '', '', 'X', 'X', 'X', 'X', '', 'X', 'X', 'X', 'X', 'X', '', 'X', 'X', 'X', '', 'ninguno ', 'normal', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_pve`
--

CREATE TABLE `medico_pve` (
  `id` int(11) NOT NULL,
  `pve` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_visual` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_auditivo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_cardiovascular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_respiratorio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_piel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_psicologico` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_osteomuscular` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pve_otro` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fk_recomendaciones` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_pve`
--

INSERT INTO `medico_pve` (`id`, `pve`, `pve_visual`, `pve_auditivo`, `pve_cardiovascular`, `pve_respiratorio`, `pve_piel`, `pve_psicologico`, `pve_osteomuscular`, `pve_otro`, `fk_recomendaciones`) VALUES
(1, 'Si', 'No', 'No', 'No', 'No', 'No', 'No', 'Si', 'ejemplo otro programa vigilacia epidemiologica', 7),
(6, '', '', '', '', '', '', '', '', '', 12),
(8, 'No', '', '', '', '', '', '', '', '', 13),
(9, 'No', '', '', '', '', '', '', '', '', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_recomendacion`
--

CREATE TABLE `medico_recomendacion` (
  `id` int(11) NOT NULL,
  `reco_trabajador` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `reco_empleador` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `rest_trabajador` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `rest_empleador` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `autorizacion_manejo_informacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_aptitud_laboral` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_recomendacion`
--

INSERT INTO `medico_recomendacion` (`id`, `reco_trabajador`, `reco_empleador`, `rest_trabajador`, `rest_empleador`, `autorizacion_manejo_informacion`, `id_aptitud_laboral`) VALUES
(4, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada y manejo del estres, 5-ejemplo otra recomendacion.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Seguir recomendaciones. 5-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas, 6-ejemplo otra, recomendacion', 'ejemplo restriccion, trabajador,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'ejemplo restriccion,,, empleador,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Si', 4),
(5, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada y manejo del estres.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Seguir recomendaciones. 5-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas.', 'ninguna', 'ninguna ', '', 5),
(6, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada y manejo del estres.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Seguir recomendaciones. 5-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas.', '', '', '', 6),
(7, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada y manejo del estres, 5-ejemplo otra recomendacion para el trabajador.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Seguir recomendaciones. 5-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas, 6-ejemplo otra recomendacion para el empleador.', 'ejemplo restricciones para el trabajador.', 'ejemplo restricciones para el empleador', 'Si', 7),
(12, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada, estilo de vida saludable y manejo del estres.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas. 5-Seguir recomendaciones.', '', '', '', 12),
(13, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada, estilo de vida saludable y manejo del estres.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas. 5-Seguir recomendaciones.', 'ninguna', 'ninguna', 'Si', 13),
(14, '1- Cuidar su salud y proteccion, cumpliendo con las acciones del SGSST. 2-Hacer Pausas Activas Periodicas. 3-Usar los elementos proteccion personal adecuados. 4-Dieta balanceada, estilo de vida saludable y manejo del estres, 6-consultar con optometria en su eps.', '1-Realizar los examenes medicos ocupacionales anual o segun la normatividad vigente, segun el caso. 2-Seguimiento y control del Sistema de Gestion de Seguridad y Salud en el Trabajo. 3-Realizar pausas activas en sus trabajadores. 4-Se recomienda entrenamiento para trabajos seguro en alturas y verificar competencias y habilidades para desempeÃ±ar trabajos en alturas. 5-Seguir recomendaciones.', 'no forzar la vista , utilizar prescripcion optica', 'ninguna', 'Si', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico_remision`
--

CREATE TABLE `medico_remision` (
  `id` int(11) NOT NULL,
  `remision` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desde` varchar(600) COLLATE utf8_spanish_ci NOT NULL,
  `hacia` varchar(700) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `motivo` varchar(4000) COLLATE utf8_spanish_ci NOT NULL,
  `remision_pendiente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `resultado_remision` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `recomendaciones_remision` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_contraremision` date NOT NULL,
  `id_paraclinico` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medico_remision`
--

INSERT INTO `medico_remision` (`id`, `remision`, `desde`, `hacia`, `especialidad`, `motivo`, `remision_pendiente`, `resultado_remision`, `recomendaciones_remision`, `fecha_contraremision`, `id_paraclinico`) VALUES
(4, 'No', 'Laboratorio Salud Ocupacional', '', '', '', 'No', '', '', '0000-00-00', 4),
(5, 'No', 'Laboratorio Salud Ocupacional', '', '', '', 'No', '', '', '0000-00-00', 5),
(6, 'No', 'Laboratorio Salud Ocupacional', '', '', '', 'No', '', '', '0000-00-00', 6),
(7, 'No', 'Laboratorio Salud Ocupacional', '1 remision', '', '', 'No', '', '', '0000-00-00', 7),
(12, 'Si', 'Laboratorio de Seguridad y Salud en el Trabajo - SST', 'lab1', 'esp1', 'motiv1', 'Si', '', '', '0000-00-00', 12),
(13, '', 'sst', 'lab2', 'esp2', 'motiv2', '', '', '', '0000-00-00', 12),
(14, 'No', '', '', '', '', 'No', '', '', '0000-00-00', 13),
(15, 'No', 'Laboratorio de Seguridad y Salud en el Trabajo - SST', '', '', '', 'No', '', '', '0000-00-00', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `psicologia_estadomental`
--

CREATE TABLE `psicologia_estadomental` (
  `id` int(11) NOT NULL,
  `orientacion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `orientacionhallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `atencionconcentracion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `concentracionhallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sensopercepcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sensopercepcionhallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `memoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `memoriahallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pensamiento` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pensamientohallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lenguaje` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `lenguajehallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `concepto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `conceptohallazgo` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `paciente_psicologia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `psicologia_estadomental`
--

INSERT INTO `psicologia_estadomental` (`id`, `orientacion`, `orientacionhallazgo`, `atencionconcentracion`, `concentracionhallazgo`, `sensopercepcion`, `sensopercepcionhallazgo`, `memoria`, `memoriahallazgo`, `pensamiento`, `pensamientohallazgo`, `lenguaje`, `lenguajehallazgo`, `concepto`, `conceptohallazgo`, `paciente_psicologia`) VALUES
(1, 'Difusion', 'Actualizado,,,ejemplo orientacion hallazgo ,,,,,,,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Difusion', 'Actualizado,,,ejemplo atencion hallazgo,,,, Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Difusion', 'Actualizado,,,ejemplo sensopercepcion hallazgo,,, Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Normal', 'Actualizado,,,ejemplo memoria hallazgo,,,, Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Normal', 'Actualizado,,,ejemplo pensamiento hallazgo,,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Normal', 'Actualizado,,,ejemplo lenguaje hallazgo,,,Con origen en el latÃ­n textus, la palabra texto describe a un conjunto de enunciados que permite dar un mensaje coherente y ordenado, ya sea de manera escrita o a travÃ©s de la palabra. Se trata de una estructura compuesta por signos y una escritura determinada que da espacio a una unidad con sentido.', 'Normal', '', 35),
(2, 'Normal', 'normal', 'Normal', 'normal', 'Normal', 'normal', 'Normal', 'normal', 'Normal', 'normal', 'Normal', 'normal', 'Normal', '', 49),
(3, 'Normal', 'hallazgo orientacion ghhhhhhhhhhhhhhhh bhdb hhb fhd fghd fhg sdh ggdv sgvdg sgd sgdts dsg  hgfhgd hg fdgh fgdh fhd hf dhg fhd fh dhf dh fhd fhd fh dhf dhg fhd fhd hgf dh fhd fhd hgf dhgf hd fh', 'Normal', 'hallazgo atencion', 'Normal', 'hallazgo sensopercepcion', 'Normal', 'hallazgo memoria', 'Normal', 'hallazgo pensamiento', 'Normal', 'hallazgo lenguaje', 'Normal', '', 53),
(4, 'Normal', 'estado de orientacion normal', 'Normal', 'estado de concentracion normal', 'Normal', 'estado de sensopercepcion normal', 'Normal', 'estado de memoria normal', 'Normal', 'condicion de pensamiento normal', 'Normal', 'normal', 'Normal', '', 54),
(5, 'Normal', 'estado orientacion normal', 'Normal', 'estado de concentracion normal', 'Normal', 'sensopercepcion normal', 'Normal', 'estado de memoria normal', 'Normal', 'estado normal', 'Normal', 'estado normal', 'Normal', '', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `tipo_identificacion` int(11) DEFAULT NULL,
  `ndocumento` int(11) NOT NULL,
  `nombre_completo` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(80) COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contrasena` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `tipo_identificacion`, `ndocumento`, `nombre_completo`, `fecha_nacimiento`, `genero`, `edad`, `email`, `telefono`, `direccion`, `usuario`, `contrasena`, `rol`) VALUES
(19, 1, 12345678, 'admin administrador administrador', '1997-01-29', 'Masculino', 20, 'emailejemplo@gmail.com', 32156545, 'cra 2 n 10 28', '4545', '12345678', 9),
(21, 1, 10263635, 'enfermeria enfermeria', '1998-11-02', 'masculino', 20, 'enf@gmail.com', 2147483647, 'Cra 13 NÂ° 5 - 12', '78945', '78945612', 2),
(25, 1, 10202526, 'Miguel Vargas', '1990-11-02', 'masculino', 25, 'mv@gmail.com', 2147483647, 'Cra 13 NÂ° 5 - 12', '1234', '12345678', 3),
(26, 1, 1205688, 'Espirometria espirometria ', '1990-11-15', 'masculino', 25, 'esp@gmail.com', 2147483647, 'Cra 13 NÂ° 5 - 12', '2525', '25252525', 4),
(27, 1, 52836569, 'Shirley Garcia Rodriguez', '1990-11-04', 'masculino', 25, 'sh@gamil.com', 30255688, 'Cra 13 NÂ° 5 - 12', '5454', '54545454', 5),
(29, 1, 15898696, 'Psicologia Psicologia ', '1990-11-10', 'masculino', 25, 'psi@gmail.com', 302586936, 'Cra 13 NÂ° 5 - 12', '3333', '33333333', 7),
(30, 1, 5236987, 'Irlena Ahumada', '2017-11-10', 'femenino', 25, 'ia@gmail.com', 2147483647, 'Cra 13 NÂ° 5 - 12', '6060', '60606060', 8),
(31, 1, 1025878968, 'Luis Fernando Manotas Restrepo', '1990-11-03', 'masculino', 25, 'lf@gmail.com', 2147483647, 'Cra 13 NÂ° 5 - 12', '5858', '58585858', 6),
(33, 1, 1255455, 'alterno altern alt', '1998-11-02', 'masculino', 20, 'altern@gmail.com', 2123120, 'Cra 13 NÂ° 5 - 12', 'alterno', 'alterno1', 1),
(34, 1, 1234569, 'recep recepcion', '1999-11-02', 'femenino', 20, 'rece@gamil.com', 30258866, 'Cra 13 NÂ° 5 - 12', 'recepcion', 'recepcion', 1),
(35, 1, 4546696, 'juan', '2017-12-04', 'masculino', 25, 'juancho@gmail.com', 34202563, 'cra 5 d f58', '8888', '88888888', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `id` int(11) NOT NULL,
  `area` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`id`, `area`) VALUES
(1, 'Recepcion'),
(2, 'Enfermeria'),
(3, 'Audiometria'),
(4, 'Espirometria'),
(5, 'Visiometria'),
(6, 'Medico'),
(7, 'Psicologia'),
(8, 'Higiene'),
(9, 'Administracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visiometria_campovisual`
--

CREATE TABLE `visiometria_campovisual` (
  `id` int(11) NOT NULL,
  `antecedentepersonal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desc_antpersonal` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `antecedentelaboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `desc_antlaboral` varchar(3500) COLLATE utf8_spanish_ci NOT NULL,
  `prescripcionoptica` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `35_nasal_derecho` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `55_temporal_derecho` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `70_temporal_derecho` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `85_temporal_derecho` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `35_nasal_izquierdo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `55_temporal_izquierdo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `70_temporal_izquierdo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `85_temporal_izquierdo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `paciente_visiometria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visiometria_campovisual`
--

INSERT INTO `visiometria_campovisual` (`id`, `antecedentepersonal`, `desc_antpersonal`, `antecedentelaboral`, `desc_antlaboral`, `prescripcionoptica`, `35_nasal_derecho`, `55_temporal_derecho`, `70_temporal_derecho`, `85_temporal_derecho`, `35_nasal_izquierdo`, `55_temporal_izquierdo`, `70_temporal_izquierdo`, `85_temporal_izquierdo`, `paciente_visiometria`) VALUES
(2, '', 'actualizadoo,,,,antecedentes personales visiometria,,,, Un texto narrativo se caracteriza por â€œcontarâ€ una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', '', 'actualizadoo,,,,antecedentes profesionales visiometria,,,, Un texto narrativo se caracteriza por â€œcontarâ€ una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'Si', '', '', 'X', 'X', 'X', 'X', '', '', 35),
(4, 'No Refiere', '', 'No Refiere', '', 'Si', '', '', '', '', '', '', '', '', 49),
(8, 'No Refiere', '', 'No Refiere', '', 'No', '', '', 'X', '', '', '', 'X', '', 53),
(9, 'No refiere', 'Ninguno', 'No refiere', 'Ninguno', 'Si', 'X', '', 'X', '', 'X', '', 'X', '', 54),
(10, 'No refiere', 'ninguno', 'No refiere', 'ninguno', 'No', '', 'X', 'X', '', '', 'X', 'X', '', 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visiometria_percepcionforia`
--

CREATE TABLE `visiometria_percepcionforia` (
  `id` int(11) NOT NULL,
  `percepcion_profundidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `percepcion_color` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foria_vertical_vision_lejana` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foria_horizontal_vision_lejana` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `foria_horizontal_vision_proxima` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `resultado_visiometria` varchar(3500) COLLATE utf8mb4_spanish_ci NOT NULL,
  `alteracion_visual` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_vision_proxima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `visiometria_percepcionforia`
--

INSERT INTO `visiometria_percepcionforia` (`id`, `percepcion_profundidad`, `percepcion_color`, `foria_vertical_vision_lejana`, `foria_horizontal_vision_lejana`, `foria_horizontal_vision_proxima`, `resultado_visiometria`, `alteracion_visual`, `id_vision_proxima`) VALUES
(7, 'Derecha 20', 'Nada', '7', '15', '14', 'actualizadoo,,,,Ejemplo resultado diagnostico,,,, Un texto narrativo se caracteriza por â€œcontarâ€ una historia. Es un relato, ficticio o no, creado por el autor. El gÃ©nero narrativo es sumamente amplio. A continuaciÃ³n, se presenta ejemplos de obras que pertenecen a este estilo, entre ellas se encuentran obras emblemÃ¡ticas de la literatura espaÃ±ola.', 'Si', 7),
(9, '', '', '', '', '', '', '', 9),
(13, 'Izquierda 40', '16', '5', '11', '11', 'ejemplo diagnostico normal', 'No', 13),
(14, 'Derecha 30', '16', '5', '12', '11', 'Vision en optimo estado', 'No', 14),
(15, '', '16', '6', '12', '13', 'problemas de vision a lejana distancia', 'Si', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visiometria_visionlejana`
--

CREATE TABLE `visiometria_visionlejana` (
  `id` int(11) NOT NULL,
  `con_correccion_vl_aj` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_lejana_ambos_ojos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `con_correccion_vl_od` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_lejana_ojo_derecho` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `con_correccion_vl_oi` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_lejana_ojo_izquierdo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_campo_visual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visiometria_visionlejana`
--

INSERT INTO `visiometria_visionlejana` (`id`, `con_correccion_vl_aj`, `vision_lejana_ambos_ojos`, `con_correccion_vl_od`, `vision_lejana_ojo_derecho`, `con_correccion_vl_oi`, `vision_lejana_ojo_izquierdo`, `id_campo_visual`) VALUES
(7, 'No', '20/10', 'No', '20/15', 'No', '20/17', 2),
(9, '', '', '', '', '', '', 4),
(13, 'No', '20/22', 'No', '20/22', 'No', '20/22', 8),
(14, 'No', '20/20', 'No', '20/20', 'No', '20/20', 9),
(15, '', '20/18', '', '20/18', '', '20/18', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visiometria_visionproxima`
--

CREATE TABLE `visiometria_visionproxima` (
  `id` int(11) NOT NULL,
  `con_correccion_vp_ao` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_proxima_ambos_ojos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `con_correccion_vp_od` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_proxima_ojo_derecho` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `con_correccion_vp_oi` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `vision_proxima_ojo_izquierdo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_vision_lejana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `visiometria_visionproxima`
--

INSERT INTO `visiometria_visionproxima` (`id`, `con_correccion_vp_ao`, `vision_proxima_ambos_ojos`, `con_correccion_vp_od`, `vision_proxima_ojo_derecho`, `con_correccion_vp_oi`, `vision_proxima_ojo_izquierdo`, `id_vision_lejana`) VALUES
(7, 'No', '20/18', 'No', '20/20', 'No', '20/20', 7),
(9, '', '', '', '', '', '', 9),
(13, 'No', '20/22', 'No', '20/22', 'No', '20/22', 13),
(14, 'No', '20/20', 'No', '20/20', 'No', '20/20', 14),
(15, '', '20/20', '', '20/20', '', '20/18', 15);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audiometria_oidoderecho`
--
ALTER TABLE `audiometria_oidoderecho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_audiometria` (`paciente_audiometria`);

--
-- Indices de la tabla `audiometria_oidoizquierdo`
--
ALTER TABLE `audiometria_oidoizquierdo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_audiometria_paciente` (`id_audiometria_paciente`),
  ADD KEY `id_audiometria_paciente_2` (`id_audiometria_paciente`),
  ADD KEY `id_audiometria_paciente_3` (`id_audiometria_paciente`);

--
-- Indices de la tabla `datos_basicos`
--
ALTER TABLE `datos_basicos`
  ADD PRIMARY KEY (`id_historia`),
  ADD KEY `fk_d_complementario` (`fk_d_complementario`);

--
-- Indices de la tabla `datos_basicos_atencion`
--
ALTER TABLE `datos_basicos_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datos_basicos` (`id_datos_basicos`);

--
-- Indices de la tabla `datos_basicos_tipo_documento`
--
ALTER TABLE `datos_basicos_tipo_documento`
  ADD PRIMARY KEY (`idtd`);

--
-- Indices de la tabla `datos_complementarios`
--
ALTER TABLE `datos_complementarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_documento` (`fk_tipo_documento`);

--
-- Indices de la tabla `db_estado_atencion`
--
ALTER TABLE `db_estado_atencion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `enfermeria_accidentes`
--
ALTER TABLE `enfermeria_accidentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_protec_personal` (`id_protec_personal`);

--
-- Indices de la tabla `enfermeria_antecedentes`
--
ALTER TABLE `enfermeria_antecedentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente_riesgos` (`id_paciente_riesgos`),
  ADD KEY `id_paciente_riesgos_2` (`id_paciente_riesgos`);

--
-- Indices de la tabla `enfermeria_enfermedad`
--
ALTER TABLE `enfermeria_enfermedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_accidente_trabajo` (`id_accidente_trabajo`),
  ADD KEY `id_accidente_trabajo_2` (`id_accidente_trabajo`),
  ADD KEY `id_accidente_trabajo_3` (`id_accidente_trabajo`);

--
-- Indices de la tabla `enfermeria_epp`
--
ALTER TABLE `enfermeria_epp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ginecologia` (`id_ginecologia`);

--
-- Indices de la tabla `enfermeria_ginecologia`
--
ALTER TABLE `enfermeria_ginecologia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ant_per_farm` (`id_ant_per_fam`),
  ADD KEY `id_ant_per_farm_2` (`id_ant_per_fam`);

--
-- Indices de la tabla `enfermeria_habitosaludable`
--
ALTER TABLE `enfermeria_habitosaludable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_enfermedad_prof` (`id_enfermedad_prof`);

--
-- Indices de la tabla `enfermeria_habitotoxico`
--
ALTER TABLE `enfermeria_habitotoxico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hab_saludables` (`id_hab_saludables`),
  ADD KEY `id_hab_saludables_2` (`id_hab_saludables`);

--
-- Indices de la tabla `enfermeria_historialaboral`
--
ALTER TABLE `enfermeria_historialaboral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_enfermeria` (`paciente_enfermeria`);

--
-- Indices de la tabla `enfermeria_riesgos`
--
ALTER TABLE `enfermeria_riesgos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`),
  ADD KEY `id_paciente_2` (`id_paciente`);

--
-- Indices de la tabla `enfermeria_riesgosempresa`
--
ALTER TABLE `enfermeria_riesgosempresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_signos_vitales` (`id_signos_vitales`);

--
-- Indices de la tabla `enfermeria_signovital`
--
ALTER TABLE `enfermeria_signovital`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitos_toxicos` (`id_habitos_toxicos`);

--
-- Indices de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado_disp`);

--
-- Indices de la tabla `equipos_prestados`
--
ALTER TABLE `equipos_prestados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_equipo_2` (`id_equipo`),
  ADD KEY `id_equipo_3` (`id_equipo`);

--
-- Indices de la tabla `equipo_disponible`
--
ALTER TABLE `equipo_disponible`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `espirometria`
--
ALTER TABLE `espirometria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `espirometria_paciente` (`espirometria_paciente`),
  ADD KEY `espirometria_paciente_2` (`espirometria_paciente`);

--
-- Indices de la tabla `medico_cal`
--
ALTER TABLE `medico_cal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_remision` (`id_remision`);

--
-- Indices de la tabla `medico_examenfisico`
--
ALTER TABLE `medico_examenfisico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_medico` (`paciente_medico`);

--
-- Indices de la tabla `medico_paraclinicos`
--
ALTER TABLE `medico_paraclinicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_examen_fisico` (`id_examen_fisico`),
  ADD KEY `id_examen_fisico_2` (`id_examen_fisico`),
  ADD KEY `id_examen_fisico_3` (`id_examen_fisico`),
  ADD KEY `id_examen_fisico_4` (`id_examen_fisico`);

--
-- Indices de la tabla `medico_pve`
--
ALTER TABLE `medico_pve`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recomendaciones` (`fk_recomendaciones`);

--
-- Indices de la tabla `medico_recomendacion`
--
ALTER TABLE `medico_recomendacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aptitud_laboral` (`id_aptitud_laboral`);

--
-- Indices de la tabla `medico_remision`
--
ALTER TABLE `medico_remision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paraclinico` (`id_paraclinico`),
  ADD KEY `id_paraclinico_2` (`id_paraclinico`);

--
-- Indices de la tabla `psicologia_estadomental`
--
ALTER TABLE `psicologia_estadomental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_psicologia` (`paciente_psicologia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `id_roles` (`rol`),
  ADD KEY `tipo_identificaion` (`tipo_identificacion`);

--
-- Indices de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visiometria_campovisual`
--
ALTER TABLE `visiometria_campovisual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_visiometria` (`paciente_visiometria`);

--
-- Indices de la tabla `visiometria_percepcionforia`
--
ALTER TABLE `visiometria_percepcionforia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vision_proxima` (`id_vision_proxima`);

--
-- Indices de la tabla `visiometria_visionlejana`
--
ALTER TABLE `visiometria_visionlejana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campo_visual` (`id_campo_visual`);

--
-- Indices de la tabla `visiometria_visionproxima`
--
ALTER TABLE `visiometria_visionproxima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vision_lejana_ambos_ojos` (`id_vision_lejana`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audiometria_oidoderecho`
--
ALTER TABLE `audiometria_oidoderecho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `audiometria_oidoizquierdo`
--
ALTER TABLE `audiometria_oidoizquierdo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `datos_basicos`
--
ALTER TABLE `datos_basicos`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `datos_basicos_atencion`
--
ALTER TABLE `datos_basicos_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `datos_basicos_tipo_documento`
--
ALTER TABLE `datos_basicos_tipo_documento`
  MODIFY `idtd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `datos_complementarios`
--
ALTER TABLE `datos_complementarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `db_estado_atencion`
--
ALTER TABLE `db_estado_atencion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `enfermeria_accidentes`
--
ALTER TABLE `enfermeria_accidentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_antecedentes`
--
ALTER TABLE `enfermeria_antecedentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_enfermedad`
--
ALTER TABLE `enfermeria_enfermedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `enfermeria_epp`
--
ALTER TABLE `enfermeria_epp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_ginecologia`
--
ALTER TABLE `enfermeria_ginecologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_habitosaludable`
--
ALTER TABLE `enfermeria_habitosaludable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_habitotoxico`
--
ALTER TABLE `enfermeria_habitotoxico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_historialaboral`
--
ALTER TABLE `enfermeria_historialaboral`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `enfermeria_riesgos`
--
ALTER TABLE `enfermeria_riesgos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `enfermeria_riesgosempresa`
--
ALTER TABLE `enfermeria_riesgosempresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `enfermeria_signovital`
--
ALTER TABLE `enfermeria_signovital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `equipos_prestados`
--
ALTER TABLE `equipos_prestados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `equipo_disponible`
--
ALTER TABLE `equipo_disponible`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `espirometria`
--
ALTER TABLE `espirometria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `medico_cal`
--
ALTER TABLE `medico_cal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `medico_examenfisico`
--
ALTER TABLE `medico_examenfisico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `medico_paraclinicos`
--
ALTER TABLE `medico_paraclinicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `medico_pve`
--
ALTER TABLE `medico_pve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `medico_recomendacion`
--
ALTER TABLE `medico_recomendacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `medico_remision`
--
ALTER TABLE `medico_remision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `psicologia_estadomental`
--
ALTER TABLE `psicologia_estadomental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `visiometria_campovisual`
--
ALTER TABLE `visiometria_campovisual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `visiometria_percepcionforia`
--
ALTER TABLE `visiometria_percepcionforia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `visiometria_visionlejana`
--
ALTER TABLE `visiometria_visionlejana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `visiometria_visionproxima`
--
ALTER TABLE `visiometria_visionproxima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `audiometria_oidoderecho`
--
ALTER TABLE `audiometria_oidoderecho`
  ADD CONSTRAINT `audiometria_oidoderecho_ibfk_1` FOREIGN KEY (`paciente_audiometria`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `audiometria_oidoizquierdo`
--
ALTER TABLE `audiometria_oidoizquierdo`
  ADD CONSTRAINT `audiometria_oidoizquierdo_ibfk_1` FOREIGN KEY (`id_audiometria_paciente`) REFERENCES `audiometria_oidoderecho` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `datos_basicos`
--
ALTER TABLE `datos_basicos`
  ADD CONSTRAINT `datos_basicos_ibfk_1` FOREIGN KEY (`fk_d_complementario`) REFERENCES `datos_complementarios` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `datos_basicos_atencion`
--
ALTER TABLE `datos_basicos_atencion`
  ADD CONSTRAINT `datos_basicos_atencion_ibfk_1` FOREIGN KEY (`id_datos_basicos`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `datos_complementarios`
--
ALTER TABLE `datos_complementarios`
  ADD CONSTRAINT `datos_complementarios_ibfk_2` FOREIGN KEY (`fk_tipo_documento`) REFERENCES `datos_basicos_tipo_documento` (`idtd`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `db_estado_atencion`
--
ALTER TABLE `db_estado_atencion`
  ADD CONSTRAINT `db_estado_atencion_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_accidentes`
--
ALTER TABLE `enfermeria_accidentes`
  ADD CONSTRAINT `enfermeria_accidentes_ibfk_1` FOREIGN KEY (`id_protec_personal`) REFERENCES `enfermeria_epp` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_antecedentes`
--
ALTER TABLE `enfermeria_antecedentes`
  ADD CONSTRAINT `enfermeria_antecedentes_ibfk_1` FOREIGN KEY (`id_paciente_riesgos`) REFERENCES `enfermeria_riesgos` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_enfermedad`
--
ALTER TABLE `enfermeria_enfermedad`
  ADD CONSTRAINT `enfermeria_enfermedad_ibfk_1` FOREIGN KEY (`id_accidente_trabajo`) REFERENCES `enfermeria_accidentes` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_epp`
--
ALTER TABLE `enfermeria_epp`
  ADD CONSTRAINT `enfermeria_epp_ibfk_1` FOREIGN KEY (`id_ginecologia`) REFERENCES `enfermeria_ginecologia` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_ginecologia`
--
ALTER TABLE `enfermeria_ginecologia`
  ADD CONSTRAINT `enfermeria_ginecologia_ibfk_1` FOREIGN KEY (`id_ant_per_fam`) REFERENCES `enfermeria_antecedentes` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_habitosaludable`
--
ALTER TABLE `enfermeria_habitosaludable`
  ADD CONSTRAINT `enfermeria_habitosaludable_ibfk_1` FOREIGN KEY (`id_enfermedad_prof`) REFERENCES `enfermeria_enfermedad` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_habitotoxico`
--
ALTER TABLE `enfermeria_habitotoxico`
  ADD CONSTRAINT `enfermeria_habitotoxico_ibfk_1` FOREIGN KEY (`id_hab_saludables`) REFERENCES `enfermeria_habitosaludable` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_historialaboral`
--
ALTER TABLE `enfermeria_historialaboral`
  ADD CONSTRAINT `enfermeria_historialaboral_ibfk_1` FOREIGN KEY (`paciente_enfermeria`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_riesgos`
--
ALTER TABLE `enfermeria_riesgos`
  ADD CONSTRAINT `enfermeria_riesgos_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `enfermeria_historialaboral` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_riesgosempresa`
--
ALTER TABLE `enfermeria_riesgosempresa`
  ADD CONSTRAINT `enfermeria_riesgosempresa_ibfk_1` FOREIGN KEY (`id_signos_vitales`) REFERENCES `enfermeria_signovital` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `enfermeria_signovital`
--
ALTER TABLE `enfermeria_signovital`
  ADD CONSTRAINT `enfermeria_signovital_ibfk_1` FOREIGN KEY (`id_habitos_toxicos`) REFERENCES `enfermeria_habitotoxico` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `equipos_laboratorio`
--
ALTER TABLE `equipos_laboratorio`
  ADD CONSTRAINT `equipos_laboratorio_ibfk_1` FOREIGN KEY (`estado_disp`) REFERENCES `equipo_disponible` (`id_estado`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `equipos_prestados`
--
ALTER TABLE `equipos_prestados`
  ADD CONSTRAINT `equipos_prestados_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos_laboratorio` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `espirometria`
--
ALTER TABLE `espirometria`
  ADD CONSTRAINT `espirometria_ibfk_1` FOREIGN KEY (`espirometria_paciente`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_cal`
--
ALTER TABLE `medico_cal`
  ADD CONSTRAINT `medico_cal_ibfk_1` FOREIGN KEY (`id_remision`) REFERENCES `medico_remision` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_examenfisico`
--
ALTER TABLE `medico_examenfisico`
  ADD CONSTRAINT `medico_examenfisico_ibfk_1` FOREIGN KEY (`paciente_medico`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_paraclinicos`
--
ALTER TABLE `medico_paraclinicos`
  ADD CONSTRAINT `medico_paraclinicos_ibfk_1` FOREIGN KEY (`id_examen_fisico`) REFERENCES `medico_examenfisico` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_pve`
--
ALTER TABLE `medico_pve`
  ADD CONSTRAINT `medico_pve_ibfk_1` FOREIGN KEY (`fk_recomendaciones`) REFERENCES `medico_recomendacion` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_recomendacion`
--
ALTER TABLE `medico_recomendacion`
  ADD CONSTRAINT `medico_recomendacion_ibfk_1` FOREIGN KEY (`id_aptitud_laboral`) REFERENCES `medico_cal` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `medico_remision`
--
ALTER TABLE `medico_remision`
  ADD CONSTRAINT `medico_remision_ibfk_1` FOREIGN KEY (`id_paraclinico`) REFERENCES `medico_paraclinicos` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `psicologia_estadomental`
--
ALTER TABLE `psicologia_estadomental`
  ADD CONSTRAINT `psicologia_estadomental_ibfk_1` FOREIGN KEY (`paciente_psicologia`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `usuarios_roles` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`tipo_identificacion`) REFERENCES `datos_basicos_tipo_documento` (`idtd`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `visiometria_campovisual`
--
ALTER TABLE `visiometria_campovisual`
  ADD CONSTRAINT `visiometria_campovisual_ibfk_1` FOREIGN KEY (`paciente_visiometria`) REFERENCES `datos_basicos` (`id_historia`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `visiometria_percepcionforia`
--
ALTER TABLE `visiometria_percepcionforia`
  ADD CONSTRAINT `visiometria_percepcionforia_ibfk_1` FOREIGN KEY (`id_vision_proxima`) REFERENCES `visiometria_visionproxima` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `visiometria_visionlejana`
--
ALTER TABLE `visiometria_visionlejana`
  ADD CONSTRAINT `visiometria_visionlejana_ibfk_1` FOREIGN KEY (`id_campo_visual`) REFERENCES `visiometria_campovisual` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `visiometria_visionproxima`
--
ALTER TABLE `visiometria_visionproxima`
  ADD CONSTRAINT `visiometria_visionproxima_ibfk_1` FOREIGN KEY (`id_vision_lejana`) REFERENCES `visiometria_visionlejana` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
