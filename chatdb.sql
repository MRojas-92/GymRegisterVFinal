-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2021 a las 02:57:48
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`chatid`, `sender_userid`, `reciever_userid`, `message`, `timestamp`, `status`) VALUES
(1, 1, 2, 'hola time', '2021-06-04 08:54:57', 0),
(2, 2, 1, 'Hola time T', '2021-06-04 08:56:04', 0),
(3, 2, 1, 'Maria escribe...', '2021-06-04 08:57:25', 0),
(4, 3, 2, 'Hola Maria', '2021-06-05 05:33:27', 0),
(5, 3, 1, 'Hola Jorge', '2021-06-05 05:33:42', 0),
(6, 3, 1, 'Que pasa?', '2021-06-07 04:14:17', 0),
(7, 1, 2, 'Hola María! De que tiempo es usted?', '2021-06-07 06:59:38', 0),
(8, 1, 3, 'Hola Roxy!', '2021-06-07 07:00:20', 0),
(9, 3, 1, 'sigo aqui...', '2021-06-07 07:17:59', 0),
(22, 3, 1, 'Voy a DB', '2021-06-07 08:27:33', 0),
(23, 3, 1, 'Hola time_T', '2021-06-09 16:58:29', 0),
(24, 3, 1, 'Saludos', '2021-06-10 00:25:02', 0),
(25, 1, 2, 'hey', '2021-06-10 00:25:38', 1),
(26, 3, 1, 'Hola', '2021-06-10 00:55:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_login_details`
--

CREATE TABLE `chat_login_details` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_typing` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat_login_details`
--

INSERT INTO `chat_login_details` (`id`, `userid`, `last_activity`, `is_typing`) VALUES
(1, 1, '2021-06-04 08:54:38', 'no'),
(2, 2, '2021-06-04 08:55:43', 'no'),
(3, 1, '2021-06-04 08:57:47', 'no'),
(4, 3, '2021-06-05 05:33:08', 'no'),
(5, 1, '2021-06-05 05:34:01', 'no'),
(6, 3, '2021-06-07 04:03:36', 'no'),
(7, 3, '2021-06-07 04:12:44', 'no'),
(8, 1, '2021-06-07 06:58:35', 'yes'),
(9, 3, '2021-06-07 07:14:22', 'no'),
(10, 3, '2021-06-07 07:49:26', 'yes'),
(11, 2, '2021-06-07 08:18:43', 'no'),
(12, 3, '2021-06-07 08:20:29', 'yes'),
(13, 3, '2021-06-09 16:29:01', 'no'),
(14, 3, '2021-06-09 16:46:44', 'no'),
(15, 3, '2021-06-09 16:47:36', 'no'),
(16, 3, '2021-06-10 00:24:52', 'no'),
(17, 1, '2021-06-10 00:25:24', 'no'),
(18, 3, '2021-06-10 00:31:50', 'no'),
(19, 3, '2021-06-10 00:47:06', 'no'),
(20, 3, '2021-06-10 00:48:32', 'no'),
(21, 3, '2021-06-10 00:49:22', 'no'),
(22, 3, '2021-06-10 00:51:33', 'no'),
(23, 3, '2021-06-10 00:52:58', 'no');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat_users`
--

CREATE TABLE `chat_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `chat_users`
--

INSERT INTO `chat_users` (`userid`, `username`, `password`, `avatar`, `current_session`, `online`) VALUES
(1, 'jorge', 'root', 'user1.jpg', 2, 0),
(2, 'maria', '12345', 'user2.jpg', 1, 0),
(3, 'RoxyMusic', 'roxy2018', 'user1.jpg', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indices de la tabla `chat_login_details`
--
ALTER TABLE `chat_login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `chat_login_details`
--
ALTER TABLE `chat_login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
