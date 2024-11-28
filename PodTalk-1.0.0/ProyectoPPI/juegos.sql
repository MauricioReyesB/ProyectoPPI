-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2024 a las 05:37:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `videojuego_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladores`
--

CREATE TABLE `desarrolladores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fundacion` year(4) NOT NULL,
  `pais` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desarrolladores`
--

INSERT INTO `desarrolladores` (`id`, `nombre`, `fundacion`, `pais`) VALUES
(1000, 'Treyarch', '1996', 'Estados Unidos'),
(2000, 'Konamy', '1969', 'Japon'),
(3000, 'Acquire', '1994', 'Japon'),
(4000, 'Nintendo', '1920', 'Japon'),
(5000, 'Sony interactive', '1993', 'Japon'),
(6000, 'Microsoft Studios', '2001', 'Estados Unidos'),
(7000, 'Electronic Arts', '1982', 'Canada'),
(8000, 'Bandai Namco', '1955', 'Japon'),
(9000, 'Rockstar Games', '1998', 'Estados Unidos'),
(10000, 'Inifinity Ward', '1994', 'Estados Unidos'),
(11000, 'CD Projekt Red', '1994', 'Polonia'),
(12000, 'Bethesda Softworks', '1986', 'Estados Unidos'),
(13000, 'Kojima Productions', '2005', 'Japon'),
(14000, 'Capcom', '1979', 'Japon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `fecha_de_nacimiento` date NOT NULL,
  `direccion_postal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `edad`, `pais`, `contraseña`, `fecha_de_nacimiento`, `direccion_postal`) VALUES
(6, 'Mauricio Reyes Bocanegra', 'mauricio.reyesb@outlook.com', 24, 'Estados Unidos', '$2y$10$5bw99jtgOqjsxiYUb2QCCuRHIFQ4GrewbL8pyBhJMelaghauprlYe', '2024-11-19', '8900'),
(7, 'Gerardo Maldonado', 'gera.mv03@icloud.com', 20, 'Mexico', '$2y$10$g3yLrWuT3rKB8zQ3qzEUJOQi/QDzxXQZ2e5yR4OrNkLVidmy6gOn.', '2024-11-07', '8900'),
(14, 'Omar Garcia', 'omar.garcia@outlook.com', 24, 'Mexico', '$2y$10$SfG3qkYUDpTLnepzjxwlmO4W0zfLavDYHxBfqC0fX3VrbEAn8k9Q.', '2024-11-12', '8900'),
(15, 'Desconocido', 'desconocido@outlook.com', 20, 'Mexico', '$2y$10$Ddu5ZSHN5fSP8hHWRthirOOVNbyyIMac70zKglnnKVcIQ.XyvMyDy', '2020-02-27', '8900'),
(16, 'Miguel Angel Mendez', 'miguel_mendez@outlook.com', 20, 'Mexico', '$2y$10$KCk9QTJqU38cAl/ne5nY5uzSS0C/w8b7saqE5FlesKWOoyEzjpYau', '2024-11-26', '8900');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `videojuego_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `plataforma` varchar(100) NOT NULL,
  `ingresos` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `usuario_id`, `videojuego_id`, `cantidad`, `fecha_compra`, `plataforma`, `ingresos`) VALUES
(1, 6, 2, 2, '2024-11-23 04:20:07', '', 2960.00),
(2, 6, 1, 1, '2024-11-23 04:20:07', '', 1599.00),
(3, 6, 1, 1, '2024-11-23 04:20:58', '', 1599.00),
(4, 6, 2, 1, '2024-11-23 04:20:58', '', 1480.00),
(5, 6, 1, 1, '2024-11-23 04:27:57', '', 1599.00),
(6, 6, 1, 1, '2024-11-25 22:05:15', '', 1599.00),
(7, 6, 2, 1, '2024-11-25 22:05:15', '', 1480.00),
(8, 6, 1, 1, '2024-11-26 04:32:31', '', 1599.00),
(9, 6, 3, 1, '2024-11-26 04:32:31', '', 1400.00),
(10, 6, 4, 1, '2024-11-26 04:32:31', '', 1700.00),
(11, 14, 2, 1, '2024-11-27 19:22:53', '', 1480.00),
(12, 14, 1, 1, '2024-11-27 19:22:53', '', 1599.00),
(13, 14, 28, 1, '2024-11-27 19:22:53', '', 1799.00),
(14, 6, 4, 1, '2024-11-27 20:45:37', '', 1700.00),
(15, 16, 2, 1, '2024-11-27 22:11:13', '', 1480.00),
(16, 16, 8, 1, '2024-11-27 22:11:13', '', 1799.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `desarrollador_id` int(11) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `modo_juego` varchar(50) NOT NULL,
  `clasificacion` decimal(10,0) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descripcion` text NOT NULL,
  `fotos` varchar(255) NOT NULL,
  `cantidad_en_almacen` int(11) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `titulo`, `genero`, `plataforma`, `fecha_lanzamiento`, `desarrollador_id`, `editor`, `modo_juego`, `clasificacion`, `precio`, `descripcion`, `fotos`, `cantidad_en_almacen`, `fabricante`, `origen`) VALUES
(1, 'Call of duty black ops 6', 'Disparos', 'Ps5', '2024-10-25', 1000, 'Activision', 'Multijugador, zombies, campaña', 18, 1599, 'La nueva entrega de la saga Black Ops que lleva la experiencia de combate a un nivel superior con gráficos impresionantes y modos de juego revolucionarios.', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images', 9, 'Activision', 'Estados unidos'),
(2, 'Silent Hill 2', 'Accion', 'Ps5', '2024-08-10', 2000, 'Bloober Team', 'Campaña', 18, 1480, 'Adopta el papel de James Sunderland y adéntrate en el pueblo casi desértico de Silent Hill en este esperado remake del clásico de 2001. Atraído a este misterioso lugar por una carta de su esposa, fallecida tres años antes, James busca pistas en el pueblo sobre el motivo por el que recibió esa carta impensable.', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 7, 'Konami Digital entertainment', 'Tokyo'),
(3, 'Mario and Luigi Brothership', 'Aventura', 'Nintendo Switch', '2024-07-11', 3000, 'Nintendo', 'Campaña', 3, 1400, '¡El inimitable dúo de hermanos regresa para una nueva aventura en alta mar! Leva anclas en compañía de Mario y Luigi a bordo de la Isla Nao (mitad barco, mitad isla), y recorre el ancho mundo de Concordia. Usa el cañón de la Isla Nao para visitar, explorar y vivir mil peripecias en todo tipo de islas, que albergan desde selvas tropicales hasta bulliciosas ciudades.', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images', 21, 'Nintendo', 'Japon'),
(4, 'The legend of Zelda: TOTK', 'Aventura', 'Nintendo Switch', '2023-12-05', 4000, 'Nintendo', 'Un jugador', 9, 1700, 'Aventura epica en Hyrule.', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 13, 'Nintendo', 'Japon'),
(5, 'God of War: Ragnarok', 'Accion', 'Ps5', '2022-11-09', 5000, 'Sony', 'Un jugador', 10, 1900, 'Kratos regresa con Atreus', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images', 25, 'Sony Santa M', 'Estados Unidos'),
(6, 'Forza Horizon 5', 'Carreras', 'Xbox Series S', '2021-11-05', 6000, 'Microsoft', 'Multijugador', 8, 1599, 'Carreras en México', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images', 9, 'Playground', 'Reino Unido'),
(7, 'Super Smash Bros Ultimate', 'Lucha', 'Nintendo Switch', '2018-08-12', 4000, 'Nintendo', 'Multijugador', 7, 1499, 'Todos los personajes juntos', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 35, 'Nintendo', 'Japon'),
(8, 'Halo infinite', 'Shooter', 'Xbox Series X', '2021-12-08', 6000, 'Microsoft', 'Multijugador', 9, 1799, 'Regreso del jefe maestro', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 44, '343 Industries', 'Estados Unidos'),
(9, 'Animal Crossing: NH', 'Simulacion', 'Nintendo Switch', '2021-03-20', 4000, 'Nintendo', 'Un jugador', 7, 1499, 'Isla personalizada', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 300, 'Nintendo', 'Japon'),
(10, 'Fifa 23', 'Deportes', 'Ps5/Xbox/Nintendo Switch', '2024-10-30', 7000, 'EA Sports', 'Multijugador', 7, 1599, 'Ultima edicion de FIFA', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 20, 'Electronic Arts', 'Canada'),
(11, 'Splatoon 3', 'Shooter', 'Nintendo Switch', '2022-11-30', 4000, 'Nintendo ', 'Multijugador', 8, 1599, 'Batallas de pintura', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 8, 'Nintendo', 'Japon'),
(12, 'Elder Ring', 'RPG', 'Ps5/Xbox/PC', '2023-02-25', 8000, 'Bandai Namco', 'Un jugador', 10, 1899, 'Una travesia desafiante', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 45, 'From Software', 'Japon'),
(13, 'Red Dead Redemption 2', 'Aventura', 'Ps5/Xbox/PC', '2023-02-25', 8000, 'Rockstar', 'Un jugador', 10, 1699, 'Mundo abierto en el oeste', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 80, 'FromSoftware', 'Japon'),
(14, 'Metroid Dread', 'Accion', 'Nintendo Switch', '2021-10-10', 4000, 'Nintendo', 'Un jugador', 8, 1499, 'Samuns Aran regresa', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 35, 'Nintendo', 'Japon'),
(15, 'Gran Turismo', 'Carreras', 'Ps5', '2023-03-04', 5000, 'Sony', 'Multijugador', 9, 1799, 'Simulador de autos', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 56, 'Plyphony D', 'Japon'),
(16, 'Mario Kart 8 Deluxe', 'Carreras', 'Nintendo Switch', '2018-04-28', 4000, 'Nintendo', 'Multijugador', 7, 1499, 'Carreras caoticas', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 40, 'Nintendo', 'Japon'),
(17, 'Call of Duty: MWIII', 'Shooter', 'Ps5/Xbox/PC', '2022-11-28', 10000, 'Activision', 'Multijugador', 9, 1899, 'Guerra moderna', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 28, 'Infinity Ward', 'Estados Unidos'),
(18, 'Cyberpunk 2077', 'RPG', 'Ps5/Xbox/Pc', '2023-02-18', 11000, 'CD projekt', 'Un jugador', 9, 1799, 'Futuro distopico', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 17, 'CD projekt', 'Polonia'),
(19, 'Horizon Forbideen West', 'Accion', 'Ps5', '2023-02-18', 5000, 'Sony', 'Un jugador', 9, 1799, 'La lucha de Aloy continua', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 45, 'Guerrilla Games', 'Paises Bajos'),
(20, 'Kirby and the forgotten land', 'Aventura', 'Nintendo Switch', '2023-03-25', 4000, 'Nintendo', 'Un jugador', 8, 1599, 'Aventura en 3D', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 2, 'Nintendo', 'Japon'),
(21, 'Doom Eternal', 'Shooter', 'Ps5/Xbox/Pc', '2020-03-20', 12000, 'Bethesda', 'Un jugador', 9, 1599, 'Lucha contra demonios', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 30, 'id Software', 'Estados Unidos'),
(22, 'Luigi´s Mansion 3', 'Aventura', 'Nintendo Switch', '2019-08-11', 4000, 'Nintendo', 'Un jugador', 9, 1499, 'Aventura en misiones', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 1499, 'Nintendo', 'Japon'),
(23, 'Death stranding', 'Aventura', 'Ps5/Pc', '2019-08-11', 13000, 'Sony', 'Un jugador', 9, 1699, 'El viaje de Sam Porter', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 8, 'Kojima Productions', 'Japon'),
(24, 'Resident Evil Village', 'Survival/Horror', 'Ps5/Xbox/Pc', '2021-05-07', 14000, 'Capcom', 'Un jugador', 10, 1799, 'La saga continua', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 10, 'Capcom', 'Japon'),
(25, 'Pokémon Legends: Arceus', 'Aventura', 'Nintendo Switch', '2023-01-28', 4000, 'Nintendo', 'Un jugador', 7, 1499, 'Una nueva aventura pokemon', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 13, 'Nintendo', 'Japon'),
(28, 'The last of us Part 2', 'Accion/Aventura', 'Ps5', '2020-06-19', 5000, 'Naughty Dog', 'Un jugador', 18, 1799, 'Secuela del aclamado titutlo que narra la historia de Ellie en un mundo postapocaliptico', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 49, 'Sony', 'Estados Unidos'),
(29, 'Super Mario Odyssey', 'Aventura', 'Nintendo Switch', '2017-10-27', 4000, 'Nintendo', 'Un jugador', 10, 1499, 'Acompaña a Mario en una aventura global para rescatar a la princesa Peach', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 16, 'Nintendo', 'Japon'),
(30, 'The last of us', 'Accion/Aventura', 'Ps5', '2014-06-14', 5000, 'Naughty Dog', 'Un jugador', 18, 599, 'Acompaña a Joel y Ellie en un viaje emotico y peligroso en un mundo destruido ', 'C:\\xampp\\htdocs\\ppi\\ProyectoFinal\\PodTalk-1.0.0\\ProyectoPPI\\images\\juegos', 10, 'Sony', 'Estados Unidos'),
(31, 'Uno', 'Juego de mesa', 'Ps5', '2024-11-26', 13000, 'Kojima', 'Solo', 4, 200, 'Juego de mesa de uno', '0', 20, '0', 'Estados Unidos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `videojuego_id` (`videojuego_id`);

--
-- Indices de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD UNIQUE KEY `nombre_unique` (`nombre_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `videojuego_id` (`videojuego_id`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desarrollador_id` (`desarrollador_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14001;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuegos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`videojuego_id`) REFERENCES `videojuegos` (`id`);

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `videojuegos_ibfk_1` FOREIGN KEY (`desarrollador_id`) REFERENCES `desarrolladores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
