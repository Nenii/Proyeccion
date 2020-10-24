-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2020 a las 16:53:59
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyeccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividades` int(11) NOT NULL,
  `nom_actividad` varchar(200) NOT NULL,
  `objetivo` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividades`, `nom_actividad`, `objetivo`, `descripcion`, `estado`) VALUES
(1, 'Requisición de alimentos', 'Obtener recursos adicionales ', 'Obtener recursos adicionales ', 1),
(2, 'Requisición de transporte', 'Brindar servicio de trasnporte para actividades', 'Requisición de alimentos', 1),
(11, 'Materia didactico', 'wed, ', 'wed, ', 1),
(13, 'Papeleria', 'sqws, ', 'qws, ', 1),
(14, 'Adquisición de Material Didáctico', 'Proporcionar recursos para el primer mes de clases', 'Se comprarán marcadores, papel bond.', 1),
(15, 'Transportar a docentes a Escuela', 'Viáticos', 'Viáticos', 1),
(16, 'Transporte de estudiantes', 'Facilitar la movilización de estudiantes', 'Facilitar la movilización de estudiantes', 1),
(17, 'Decoración de Aula', 'Docorar el aula acorde a las enseñanzas', 'Decoración de aula', 1),
(18, 'Compra de refrigerio', 'Adquisición de refrigerio', 'Adquisición de refrigerio', 1),
(19, 'Inducción al Curso', 'Dar a conocer las actiivdades a realizar al alumnado', 'Dar a conocer el plan educativo del curso.', 1),
(20, 'Requisición de personal', 'Agregar nuevo personal a la empresa', 'Requisición de personal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id_anexo` int(11) NOT NULL,
  `nom_anexo` varchar(50) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` int(2) NOT NULL,
  `id_res_proy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anexos`
--

INSERT INTO `anexos` (`id_anexo`, `nom_anexo`, `ubicacion`, `fecha`, `descripcion`, `estado`, `id_res_proy`) VALUES
(1, 'Anexo 1', 'Formulario.pdf', '2019-11-28 22:13:13', 'Anexo 1', 1, 4),
(18, 'Factura 1 ', 'alphabet.docx', '2019-11-28 22:07:14', 'Materia didactico', 1, 4),
(21, 'Factura 3', 'Planificador de proyectos de Gantt1 (Autoguardado).xlsx', '2019-11-28 21:22:30', 'Materia didactico', 1, 4),
(22, 'Factura 2', 'POBLACION PREE  CICLO II 2019.docx', '2019-11-28 22:07:17', 'Materia didactico', 1, 3),
(23, 'Factura 1 ', 'POBLACION PREE  CICLO II 2019.docx', '2019-11-28 22:09:24', 'Materia didactico', 1, 3),
(24, 'Factura', 'Actividades de Medio Ambiente Proyección Social.docx', '2020-02-03 14:27:52', 'Factura 1', 3, 5),
(25, 'Factura', 'Actividades de Medio Ambiente Proyección Social.docx', '2020-02-03 14:26:43', 'Factura 1', 3, 5),
(26, 'Factura', 'Actividades de Medio Ambiente Proyección Social.docx', '2020-02-03 14:26:40', 'Factura 1', 3, 5),
(27, 'Factura', 'Ejemplo_2.PNG', '2020-02-03 14:26:36', 'Factura 1', 3, 6),
(28, 'Factura', 'Ejemplo_2.PNG', '2020-02-03 14:26:31', 'Factura 1', 3, 6),
(29, 'Factura', 'Captura.PNG', '2020-02-20 15:51:29', 'Factura 1', 3, 5),
(30, 'Factura', 'UGB-elsalvador.png', '2020-02-21 15:39:54', 'Factura', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_evento` int(11) NOT NULL,
  `tipo_evento` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(255) NOT NULL,
  `nombre_usuario` int(11) NOT NULL,
  `direccion_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `id_beneficiarios` int(11) NOT NULL,
  `nom_comunidad_ben` varchar(100) DEFAULT NULL,
  `n_personas_ben` int(5) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id_beneficiarios`, `nom_comunidad_ben`, `n_personas_ben`, `estado`) VALUES
(1, 'Rivera de Rio Grande de S', 600, 1),
(2, 'Toda la ciudad de San Miguel', 581410, 1),
(3, 'Zona Oriental de El Salvador', 869804, 1),
(4, '260 casos de la zona oriental en los departamentos', 260, 1),
(5, '60-docentes  de  instituciones públicas selecciona', 60, 1),
(6, 'Estudiantes de educación media del Institutos Nacional de la ciudad de Usulután.', 100, 1),
(7, 'Docentes, Padres de familia, niños y niñas menores de 13 años del Complejo Educativo “Ofelia Herrera', 500, 1),
(8, 'Usuarios y la comunidad educativa del departamento de Usulután', 60, 1),
(9, 'Comités de Desarrollo Turístico de los municipios de la Zona Ruta de Paz del departamento de Morazán', 200, 1),
(10, 'Grupo de Emprendedores del Centro Regional de La Unión y Morazán de CONAMYPE', 20, 1),
(11, 'Emprendedores del departamento de Usulután.', 20, 1),
(12, 'Institutos nacionales de la Zona Oriental', 1400, 1),
(13, 'Padres de familia de estudiantes UGB', 30, 1),
(14, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(25) DEFAULT NULL,
  `des_categoria` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`, `des_categoria`, `estado`) VALUES
(2, 'Agenda', 'Agendas', 1),
(3, 'Memorias', 'Memorias', 1),
(4, 'Resumen Ejecutivo', 'Resumen Ejecutivo', 1),
(5, 'Plan de trabajo', 'Plan de trabajo', 1),
(6, 'Perfil de proyecto', 'Perfil de proyecto', 1),
(8, 'Proyectos declarados a MI', 'Proyectos declarados a MINED', 1),
(9, 'Boletin', 'Boletin informativo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_responsable_proyecto` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombre` varchar(50) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_responsable_proyecto`, `fecha`, `nombre`, `comentario`, `estado`) VALUES
(1, 5, '2020-02-20 15:17:46', 'Jennifer Argueta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id_facultad` int(11) NOT NULL,
  `nom_facultad` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `Decano` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id_facultad`, `nom_facultad`, `estado`, `Decano`) VALUES
(1, 'Ciencias y Humanidades', 1, ''),
(2, 'Ciencias de la Salud', 1, ''),
(4, 'Ciencia y Tecnologia', 1, ''),
(5, 'Ciencias Empresariales', 1, ''),
(6, 'Ingenieria y Arquitectura', 1, 'Azucena '),
(7, 'Facultad de Ciencias Jurídicas SM', 1, ''),
(8, 'Proyección Social', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` double(10,2) NOT NULL,
  `id_res_act` int(11) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `fecha`, `monto`, `id_res_act`, `tipo`, `descripcion`, `estado`) VALUES
(1, '2020-02-21', 200.00, 1, 'ACTIVO', '', 1),
(2, '2020-02-21', 50.00, 2, 'ACTIVO', 'Factura', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `nom_proyecto` varchar(255) NOT NULL,
  `id_facultad` int(11) NOT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `id_beneficiarios` int(11) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `inicio_proy` date DEFAULT NULL,
  `final_proy` date DEFAULT NULL,
  `periodo` int(4) DEFAULT NULL,
  `cod_proyecto` varchar(9) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  `id_categoria` int(11) DEFAULT NULL,
  `creado_en` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nom_proyecto`, `id_facultad`, `ubicacion`, `id_beneficiarios`, `monto`, `inicio_proy`, `final_proy`, `periodo`, `cod_proyecto`, `estado`, `id_categoria`, `creado_en`) VALUES
(1, 'Proyeccion', 5, 'CV Mirna Zavaleta 2019.pdf', 1, '2600.00', '2018-12-30', '2019-11-21', 2002, '001', 1, 6, '2019-11-11 16:32:41'),
(2, 'Proyeccion', 2, 'PSO_DB.png', 1, '2600.00', '2019-10-06', '2019-11-25', 2019, '001', 1, 6, '2019-11-11 16:32:41'),
(3, ' Asistencia Legal a personas de escasos recursos económicos en las áreas de familia, penal, laboral y constitucional de la zona oriental ', 7, 'Asistencia Legal a personas de escasos recursos economicos zona oriental.docx', 4, '14.00', '2014-01-02', '2014-12-23', 2014, 'PSO001', 2, 6, '2019-11-11 16:32:41'),
(4, 'Capacitación para Docentes no Especializados en el Área de Inglés', 1, 'Capacitacion para Docentes no Especializados en el Area de Ingles.docx', 5, '5.00', '2014-03-01', '2014-10-31', 2014, 'PSO001', 2, 6, '2019-11-11 16:32:41'),
(5, 'Curso de Competencias Comunicativas de Inglés', 1, 'Curso de Competencias Comunicativas de Ingles.docx', 6, '4.00', '2014-01-03', '2014-07-30', 2014, '001', 2, 6, '2019-11-11 16:32:41'),
(6, 'Programa de  Prevención del Abuso Sexual en  Niños y Niñas menores de 13    años en El Complejo Educativo “Ofelia Herrera” de la ciudad de San Miguel', 1, 'Programa de  Prevencion del Abuso Sexual Complejo Educativo Ofelia Herrera.docx', 7, '4.00', '2014-03-01', '2014-10-31', 2014, '001', 2, 6, '2019-11-11 16:32:41'),
(7, 'AGENDA DE PROYECCION SOCIAL EN LA FACULTAD DE CIENCIA Y TECNOLOGÍA', 4, 'AGENDA DE PROYECCION SOCIAL EN LA FACULTAD DE CIENCIA Y TECNOLOGIA.docx', 3, '46.00', '2014-01-27', '2014-12-20', 2014, '001', 2, 6, '2019-11-11 16:32:41'),
(8, 'Diseño de edificio para dirección departamental de educación de usulután', 6, 'DISENO DE EDIFICIO PARA DIRECCION DEPARTAMENTAL DE EDUCACION DE USULUTAN.docx', 1, '6.00', '2014-09-01', '2014-10-31', 2014, '001', 2, 6, '2019-11-11 16:32:41'),
(9, 'Asesoría y Capacitación a Comités Turísticos de la Zona Ruta de Paz del Departamento de Morazán', 5, 'Asesoria y Capacitacion a Comites Turisticos de la Zona Ruta de Paz.docx', 1, '8.00', '2014-01-03', '2014-12-23', 2014, '001', 2, 8, '2019-11-11 16:32:41'),
(10, 'Consultoría a Emprendedores de  CONAMYPE en La Unión', 5, 'Consultoria a Emprendedores de  CONAMYPE en La Union.docx', 10, '4.00', '2014-01-02', '2014-07-30', 2014, '001', 2, 6, '2019-11-11 16:37:10'),
(11, 'Emprendimiento con la Metodología El Plan Proyección Social CRU', 5, 'Emprendimiento con la Metodologia El Plan Proyección Social CRU.docx', 11, '2.00', '2014-01-01', '2014-11-30', 2014, '001', 2, 6, '2019-11-11 16:41:40'),
(12, 'Elaboración de proyectos de desarrollo territorial para el municipio de puerto el triunfo, Usulutan.', 5, 'Proyectos de Desarrollo Territorial Puerto El Triunfo.docx', 3, '2530.40', '2014-07-01', '2014-11-30', 2014, '001', 2, 6, '2019-11-11 17:20:02'),
(13, 'Plan de vida para adolescentes de instituciones Educativas de nivel medio de Usulután, San Miguel, La Unión y Morazán.', 8, 'Proyecto Plan de vida 2014 rev.docx', 12, '24725.00', '2014-02-01', '2014-11-30', 2014, '001', 1, 6, '2019-11-11 17:31:16'),
(14, 'Concurso INNOVATE UGB2017. (feria de tecnológia con estudiantes de educación media de la zona oriental)', 4, 'CONCURSO INNOVATE UGB 2017.docx', 12, '3542.75', '2017-03-01', '2017-09-18', 2017, '001', 2, 6, '2019-11-13 19:34:57'),
(15, 'Programa de formación de padres de familia en Informatica', 8, 'Actividades de Medio Ambiente Proyección Social.docx', 13, '2600.00', '2019-07-15', '2019-12-07', 2019, '022', 1, 6, '2019-11-27 17:55:34'),
(16, 'Curso de Inglés a Padres de Familia', 4, 'Clientes.jpg', 1, '700.00', '2020-01-02', '2020-02-28', 2020, '021', 1, 2, '2020-01-24 10:27:12'),
(17, 'Curso de Excel a Padres de Familia', 1, 'fb.png', 1, '750.00', '2020-01-02', '2020-02-28', 2020, '002', 1, 6, '2020-01-24 10:28:54'),
(18, 'Curso Básico de Word a Estudiantes Menores a 15 Años', 5, 'blog_2-e1489756328546.jpg', 1, '400.00', '2020-01-01', '2020-02-28', 2020, '0003', 1, 6, '2020-01-24 10:35:35'),
(19, 'Programa de prevención de adicciones', 2, 'Actividades de Medio Ambiente Proyección Social.docx', 12, '2500.00', '2020-02-03', '2020-02-03', 2020, '020', 3, 6, '2020-02-03 20:34:44'),
(20, 'Programa de prevención de adicciones', 2, 'Actividades de Medio Ambiente Proyección Social.docx', 12, '2500.00', '2020-02-03', '2020-02-03', 2020, '020', 3, 6, '2020-02-03 20:37:14'),
(21, 'Programa de prevención de adicciones', 2, 'Actividades de Medio Ambiente Proyección Social.docx', 13, '2500.00', '2020-02-03', '2020-02-03', 2020, '020', 3, 6, '2020-02-03 20:47:17'),
(22, 'Programa de prevención de adicciones', 2, 'Actividades de Medio Ambiente Proyección Social.docx', 13, '2500.00', '2020-02-03', '2020-02-03', 2020, '020', 3, 6, '2020-02-03 20:47:37'),
(23, 'Centro de Desarrollo de Negocios', 8, 'alphabet.docx', 11, '13000.00', '2020-02-25', '2020-02-01', 2020, '03', 1, 6, '2020-02-25 15:41:43'),
(24, 'Centro de Desarrollo de Negocios', 8, 'ENCUESTA_V2.docx', 1, '13000.00', '2020-02-27', '2020-02-01', 2020, '020', 1, 6, '2020-02-25 15:43:08'),
(25, 'Centro de Desarrollo de Negocios', 8, 'actividades.txt', 1, '13000.00', '2020-02-27', '2020-02-01', 2020, '20', 1, 6, '2020-02-25 15:45:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_actividad`
--

CREATE TABLE `responsable_actividad` (
  `id_responsable_actividad` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `id_responsable_proyecto` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `TIPO` varchar(200) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable_actividad`
--

INSERT INTO `responsable_actividad` (`id_responsable_actividad`, `id_actividad`, `id_responsable_proyecto`, `fecha_inicio`, `fecha_fin`, `TIPO`, `descripcion`, `estado`) VALUES
(1, 1, 2, '2020-02-20', '2020-02-23', 'ACTIVO', '', 1),
(2, 1, 2, '2020-02-20', '2020-02-21', 'ACTIVO', '', 1),
(3, 18, 2, '2020-01-23', '2020-01-24', 'COMPLETADO', 'Desayunso', 1),
(4, 19, 2, '2020-05-21', '2020-06-21', 'ACTIVO', 'Inicio de curso', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_proyecto`
--

CREATE TABLE `responsable_proyecto` (
  `id_responsable_proyecto` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_responsable` int(11) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responsable_proyecto`
--

INSERT INTO `responsable_proyecto` (`id_responsable_proyecto`, `id_proyecto`, `id_responsable`, `estado`) VALUES
(2, 17, 1, 1),
(3, 17, 8, 1),
(4, 17, 1, 1),
(5, 17, 1, 1),
(6, 17, 1, 1),
(7, 17, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(2) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`, `descripcion`, `estado`) VALUES
(0, 'Ejecutor de proyectos', 'Ejecuta un proyecto en especifico', 1),
(1, 'Director de proyectos', 'Gestiona todas las sedes', 1),
(2, 'Coordinador de proyecto', 'Dirige la gestión de los proyectos de una sede en ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `ubicacion_foto` varchar(200) NOT NULL DEFAULT 'LOGO_UGB.jpg',
  `nivel` int(2) NOT NULL,
  `email` varchar(75) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `Sede_origen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `user`, `password`, `nombre_usuario`, `telefono`, `sexo`, `dui`, `ubicacion_foto`, `nivel`, `email`, `estado`, `Sede_origen`) VALUES
(1, 'bzuniga', '1234', 'Beatriz Zuniga', '', 'F', '', 'LOGO_UGB.jpg', 0, 'zuniga@gmail.com', 1, 'San Miguel'),
(2, 'jargueta', '1234', 'Jennifer Argueta', '', 'F', '', 'LOGO_UGB.jpg', 1, 'tobar@gmail.com', 1, 'San Miguel'),
(4, 'Admin', 'Admin', 'Admin', '', 'M', '', 'LOGO_UGB.jpg', 1, 'Admin@Admin.com', 1, 'San Miguel'),
(6, 'cesperanza', '123456', 'Carlos Esperanza', '', 'M', '', 'LOGO_UGB.jpg', 1, 'cesperanza@yahoo.com', 1, 'San Miguel'),
(7, 'fermin', '1234', 'Fermin Sorto', '', 'M', '', 'LOGO_UGB.jpg.', 1, 'fermin@ugb.edu.sv', 1, 'San Miguel'),
(8, 'mumaña', '1234', 'Miguel Umaña', '', 'M', '', 'LOGO_UGB.jpg', 0, 'umaña@ugb.edu.sv', 1, 'San Miguel'),
(11, 'Jenni', '', 'Jennifer Argueta', '78512641', 'F', '05232323-0', 'logo-ugb-horizontal.png', 1, 'argueta@gmail.com', 1, 'San Miguel');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_actividades`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_actividades` (
`id_actividades` int(11)
,`nom_actividad` varchar(200)
,`estado` int(2)
,`fecha_inicio` date
,`id_actividad` int(11)
,`fecha_fin` date
,`descripcion` varchar(255)
,`nom_proyecto` varchar(255)
,`id_proyecto` int(11)
,`monto` decimal(10,2)
,`cod_proyecto` varchar(9)
,`estado_proy` int(1)
,`periodo` int(4)
,`id_responsable` int(11)
,`nom_responsable` varchar(50)
,`id_gasto` int(11)
,`fecha` date
,`GASTO` double(10,2)
,`Dias_faltantes` bigint(21)
,`Dias_totales` bigint(21)
,`Estatus` varchar(7)
,`Progreso` bigint(21)
,`tipo` varchar(255)
,`Test` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_alcances_gastos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_alcances_gastos` (
`periodo` int(4)
,`presupuesto` decimal(32,2)
,`total_gasto` double(19,2)
,`Progreso` double(23,6)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_anexos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_anexos` (
`id_anexo` int(11)
,`nom_anexo` varchar(50)
,`ubicacion` varchar(255)
,`descripcion` varchar(50)
,`fecha` timestamp
,`nom_proyecto` varchar(255)
,`periodo` int(4)
,`id_proyecto` int(11)
,`id_responsable` int(11)
,`nom_responsable` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_proy`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_proy` (
`Codigo` varchar(12)
,`Nombre_proyecto` varchar(255)
,`ubicacion` varchar(255)
,`periodo` int(4)
,`id_proyecto` int(11)
,`nom_comunidad_ben` varchar(100)
,`personas_beneficiarias` int(5)
,`nom_categoria` varchar(25)
,`Inicio` date
,`estado` int(1)
,`nom_facultad` varchar(50)
,`archivo` varchar(255)
,`Fin` date
,`Presupuesto` decimal(10,2)
,`DIas` bigint(21)
,`DIas_` bigint(21)
,`Progreso` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_proyecto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_proyecto` (
`presupuesto` decimal(32,2)
,`periodo` int(4)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_res`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_res` (
`Codigo` varchar(12)
,`id_proyecto` int(11)
,`estado` int(1)
,`Nombre_proyecto` varchar(255)
,`estado_responsable_proyecto` int(11)
,`nom_comunidad_ben` varchar(100)
,`nom_categoria` varchar(25)
,`Inicio` date
,`tel_responsable` varchar(12)
,`id_responsable` int(11)
,`id_responsable_proyecto` int(11)
,`periodo` int(4)
,`Fin` date
,`nom_responsable` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_actividades`
--
DROP TABLE IF EXISTS `vista_actividades`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_actividades`  AS  select `a`.`id_actividades` AS `id_actividades`,`a`.`nom_actividad` AS `nom_actividad`,`a`.`estado` AS `estado`,`c`.`fecha_inicio` AS `fecha_inicio`,`c`.`id_actividad` AS `id_actividad`,`c`.`fecha_fin` AS `fecha_fin`,`c`.`descripcion` AS `descripcion`,`e`.`nom_proyecto` AS `nom_proyecto`,`e`.`id_proyecto` AS `id_proyecto`,`e`.`monto` AS `monto`,`e`.`cod_proyecto` AS `cod_proyecto`,`e`.`estado` AS `estado_proy`,`e`.`periodo` AS `periodo`,`f`.`id_usuario` AS `id_responsable`,`f`.`nombre_usuario` AS `nom_responsable`,`g`.`id_gasto` AS `id_gasto`,`g`.`fecha` AS `fecha`,`g`.`monto` AS `GASTO`,timestampdiff(DAY,now(),`c`.`fecha_fin`) AS `Dias_faltantes`,timestampdiff(DAY,`c`.`fecha_inicio`,`c`.`fecha_fin`) AS `Dias_totales`,if((timestampdiff(DAY,now(),`c`.`fecha_fin`) < 0),'VENCIDO','ACTIVO') AS `Estatus`,timestampdiff(DAY,`c`.`fecha_inicio`,now()) AS `Progreso`,`g`.`tipo` AS `tipo`,(case when (timestampdiff(DAY,now(),`c`.`fecha_fin`) < 0) then 'COMPLETADO' when (timestampdiff(DAY,now(),`c`.`fecha_fin`) > 0) then 'ACTIVO' end) AS `Test` from (((((`actividades` `a` left join `responsable_actividad` `c` on((`a`.`id_actividades` = `c`.`id_actividad`))) left join `responsable_proyecto` `d` on((`d`.`id_responsable_proyecto` = `c`.`id_responsable_proyecto`))) left join `proyecto` `e` on((`e`.`id_proyecto` = `d`.`id_proyecto`))) left join `usuarios` `f` on((`f`.`id_usuario` = `d`.`id_responsable`))) left join `gastos` `g` on((`g`.`id_res_act` = `c`.`id_actividad`))) where ((`a`.`estado` = 1) and (`e`.`estado` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_alcances_gastos`
--
DROP TABLE IF EXISTS `vista_alcances_gastos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_alcances_gastos`  AS  select distinct `e`.`periodo` AS `periodo`,`e`.`presupuesto` AS `presupuesto`,ifnull(sum(`a`.`monto`),0) AS `total_gasto`,((sum(`a`.`monto`) / `e`.`presupuesto`) * 100) AS `Progreso` from (`vista_proyecto` `e` left join (((`gastos` `a` join `responsable_actividad` `b` on((`a`.`id_res_act` = `b`.`id_responsable_actividad`))) join `responsable_proyecto` `c` on((`b`.`id_responsable_proyecto` = `c`.`id_responsable_proyecto`))) join `proyecto` `d` on((`c`.`id_proyecto` = `d`.`id_proyecto`))) on((`d`.`periodo` = `e`.`periodo`))) where (`d`.`estado` = 1) group by `e`.`periodo`,`e`.`presupuesto` order by `e`.`periodo` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_anexos`
--
DROP TABLE IF EXISTS `vista_anexos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_anexos`  AS  select `a`.`id_anexo` AS `id_anexo`,`a`.`nom_anexo` AS `nom_anexo`,`a`.`ubicacion` AS `ubicacion`,`a`.`descripcion` AS `descripcion`,`a`.`fecha` AS `fecha`,`c`.`nom_proyecto` AS `nom_proyecto`,`c`.`periodo` AS `periodo`,`c`.`id_proyecto` AS `id_proyecto`,`d`.`id_usuario` AS `id_responsable`,`d`.`nombre_usuario` AS `nom_responsable` from (((`anexos` `a` join `responsable_proyecto` `b` on((`b`.`id_responsable_proyecto` = `a`.`id_res_proy`))) join `proyecto` `c` on((`c`.`id_proyecto` = `b`.`id_proyecto`))) join `usuarios` `d` on((`d`.`id_usuario` = `b`.`id_responsable`))) where ((`a`.`estado` = 1) and (`c`.`estado` = 1) and (`b`.`estado` = 1)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_proy`
--
DROP TABLE IF EXISTS `vista_proy`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_proy`  AS  select concat('PSO',`a`.`cod_proyecto`) AS `Codigo`,`a`.`nom_proyecto` AS `Nombre_proyecto`,`a`.`ubicacion` AS `ubicacion`,`a`.`periodo` AS `periodo`,`a`.`id_proyecto` AS `id_proyecto`,`b`.`nom_comunidad_ben` AS `nom_comunidad_ben`,`b`.`n_personas_ben` AS `personas_beneficiarias`,`c`.`nom_categoria` AS `nom_categoria`,`a`.`inicio_proy` AS `Inicio`,`a`.`estado` AS `estado`,`d`.`nom_facultad` AS `nom_facultad`,`a`.`ubicacion` AS `archivo`,`a`.`final_proy` AS `Fin`,`a`.`monto` AS `Presupuesto`,timestampdiff(DAY,`a`.`inicio_proy`,`a`.`final_proy`) AS `DIas`,timestampdiff(DAY,now(),`a`.`final_proy`) AS `DIas_`,timestampdiff(DAY,`a`.`inicio_proy`,now()) AS `Progreso` from (((`proyecto` `a` join `beneficiarios` `b` on((`b`.`id_beneficiarios` = `a`.`id_beneficiarios`))) join `categoria` `c` on((`c`.`id_categoria` = `a`.`id_categoria`))) join `facultad` `d` on((`a`.`id_facultad` = `d`.`id_facultad`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_proyecto`
--
DROP TABLE IF EXISTS `vista_proyecto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_proyecto`  AS  select ifnull(sum(`proyecto`.`monto`),0) AS `presupuesto`,`proyecto`.`periodo` AS `periodo` from `proyecto` where ((`proyecto`.`estado` = 1) or (`proyecto`.`estado` = 2)) group by `proyecto`.`periodo` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_res`
--
DROP TABLE IF EXISTS `vista_res`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_res`  AS  select concat('PSO',`a`.`cod_proyecto`) AS `Codigo`,`a`.`id_proyecto` AS `id_proyecto`,`a`.`estado` AS `estado`,`a`.`nom_proyecto` AS `Nombre_proyecto`,`e`.`estado` AS `estado_responsable_proyecto`,`b`.`nom_comunidad_ben` AS `nom_comunidad_ben`,`c`.`nom_categoria` AS `nom_categoria`,`a`.`inicio_proy` AS `Inicio`,`e`.`telefono` AS `tel_responsable`,`e`.`id_usuario` AS `id_responsable`,`d`.`id_responsable_proyecto` AS `id_responsable_proyecto`,`a`.`periodo` AS `periodo`,`a`.`final_proy` AS `Fin`,`e`.`nombre_usuario` AS `nom_responsable` from ((((`proyecto` `a` left join `beneficiarios` `b` on((`b`.`id_beneficiarios` = `a`.`id_beneficiarios`))) left join `categoria` `c` on((`c`.`id_categoria` = `a`.`id_categoria`))) left join `responsable_proyecto` `d` on((`d`.`id_proyecto` = `a`.`id_proyecto`))) left join `usuarios` `e` on((`e`.`id_usuario` = `d`.`id_responsable_proyecto`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividades`);

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id_anexo`),
  ADD KEY `id_res_act` (`id_res_proy`);

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id_beneficiarios`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_responsable_proyecto` (`id_responsable_proyecto`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`id_facultad`),
  ADD UNIQUE KEY `id_facultad_3` (`id_facultad`),
  ADD KEY `id_facultad` (`id_facultad`),
  ADD KEY `id_facultad_2` (`id_facultad`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`),
  ADD KEY `id_res_act` (`id_res_act`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_beneficiarios` (`id_beneficiarios`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_facultad` (`id_facultad`);

--
-- Indices de la tabla `responsable_actividad`
--
ALTER TABLE `responsable_actividad`
  ADD PRIMARY KEY (`id_responsable_actividad`),
  ADD KEY `id_responsable` (`id_responsable_proyecto`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_responsable_2` (`id_responsable_proyecto`);

--
-- Indices de la tabla `responsable_proyecto`
--
ALTER TABLE `responsable_proyecto`
  ADD PRIMARY KEY (`id_responsable_proyecto`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `nivel` (`nivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id_anexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id_beneficiarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `id_facultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `responsable_actividad`
--
ALTER TABLE `responsable_actividad`
  MODIFY `id_responsable_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `responsable_proyecto`
--
ALTER TABLE `responsable_proyecto`
  MODIFY `id_responsable_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `anexos_ibfk_1` FOREIGN KEY (`id_res_proy`) REFERENCES `responsable_proyecto` (`id_responsable_proyecto`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_responsable_proyecto`) REFERENCES `responsable_proyecto` (`id_responsable_proyecto`);

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `gastos_ibfk_1` FOREIGN KEY (`id_res_act`) REFERENCES `responsable_actividad` (`id_responsable_actividad`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_beneficiarios`) REFERENCES `beneficiarios` (`id_beneficiarios`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `proyecto_ibfk_3` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`id_facultad`);

--
-- Filtros para la tabla `responsable_actividad`
--
ALTER TABLE `responsable_actividad`
  ADD CONSTRAINT `responsable_actividad_ibfk_1` FOREIGN KEY (`id_responsable_proyecto`) REFERENCES `responsable_proyecto` (`id_responsable_proyecto`),
  ADD CONSTRAINT `responsable_actividad_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividades`);

--
-- Filtros para la tabla `responsable_proyecto`
--
ALTER TABLE `responsable_proyecto`
  ADD CONSTRAINT `responsable_proyecto_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`),
  ADD CONSTRAINT `responsable_proyecto_ibfk_2` FOREIGN KEY (`id_responsable`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
