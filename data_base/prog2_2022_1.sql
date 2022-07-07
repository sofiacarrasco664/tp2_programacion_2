-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2022 a las 15:45:17
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prog2_2022_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categorias_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `etiqueta_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `noticia_id` int(10) UNSIGNED NOT NULL,
  `usuarios_usuario_id` int(10) UNSIGNED NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` mediumtext NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `img_descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`noticia_id`, `usuarios_usuario_id`, `fecha_publicacion`, `titulo`, `texto`, `sinopsis`, `img`, `img_descripcion`) VALUES
(1, 1, '2022-06-10', 'Adiestra A Tu Perro', '<ol><li><p>Demuestra que eres el dominante: Paciencia, no hace falta que grites, le pegues o lo regañes. La mejor manera de que te obedezca es ser enérgico y consecuente en tus palabras. Con una orden debería entender qué tiene que hacer.</p></li> <li><p>Se constante:Se perseverante, trata de darle clases cada dos o tres días como máximo. No te des por vencido si no ves cambios demasiado notorios. El aprendizaje puede ser lento, sobre todo si se trata de una mascota adulta. Los cachorros copian y retienen información con mayor facilidad.</p></li><li><p>Elige un sitio tranquilo:Es muy importante que el perro preste atención y se concentre en su adiestramiento, lo mejor será estar solos en casa donde nada lo moleste o distraiga. En algunos casos el perro aprenderá con mayor facilidad si ha liberado la energía acumulada. Las sesiones para adiestrar a un perro no deberían durar más de media hora, la idea es que se convierta en algo divertido y no en una tortura (para ti y para él).</p></li><li><p>Enséñale una sola cosa por clase: Existen diferentes trucos que el animal puede aprender si lo adiestramos correctamente. Por ejemplo, que se siente, que nos tienda la pata, que se tumbe, que acuda a nuestra llamada o que pasee a nuestro lado. Pero no podemos pretender que el perro lo sepa hacer todo al mismo tiempo, por ello cada sesión de entrenamiento deberá ejercitar una única orden.</p></li><li><p>No te olvides de los premios: Las mascotas funcionan con la técnica del premio y del castigo. Si se comporta como corresponde, puedes darle una golosina o galleta, o simplemente hacerle una caricia y decirle unas palabras de felicitación, como bien hecho o así se hace</p></li></ol>', 'Te damos diferentes tips para poder entrenar a tu perro sin mucha complicación', 'border_collie_dog_entrenando_con_amo.jpg', 'Border Collie entrenando con su dueño'),
(2, 2, '2022-06-10', 'Premios Congelados', 'Comparte estos ricos premios caseros congelados con tu regalón en San Valentín <h3>Ingredientes:</h3> <ul> <li>1 taza de frutilla</li> <li>1 plátano</li> <li>1/2 taza de yogur griego natural</li> <ol> <li> Paso 1: Corta en trozos el platano y la frutilla, luego vierte los 2 ingredientes en una licuadora hasta que tenga consistencia espesa. </li> <li> Paso 2: Vierte la mezcla en un molde con forma de corazón y lleva al congelador por 5 horas. </li> <li> Paso 3: Sirve estos maravillosos premios a tu regalón y disfruta de su San Valentin Peludo.</li></ol>', 'Receta de bocaditos perfectos para hacer feliz a tu mascota.', 'bocaditos_en_forma_de_corazon_apto_mascotas.jpg', 'Bocados frios en forma de corazón'),
(3, 3, '2022-06-10', 'Tu gato amará su arenero', 'Sabemos que los gatos son mascotas muy limpias y delicadas con su entorno, sobre todo si se trata del lugar donde hacen sus necesidades. Sigue estos tips para que tu gatito disfrute y ame su bandeja de arena. <ol><li> 1.Elige una bandeja profunda ya que les gusta escarbar, para evitar que bote afuera restos de tierra.</li><li>2.Ubicala en un lugar sin mucho transito y tranquilo, si tienes 2 gatos deberás tener 2 ya que no les gusta compartir.</li><li>3.Mantenla limpia, preferiblemente hacerlo semanalmente con agua y detergentes, así se mantendrá libre de olores.</li><li>4.Utiliza palas sanitarias, así no tendrás que botar toda la arena y solo retiras los restos sucios.</li></ol>', '¿Tu gato no te hace caso y hace sus necesidades en cualquier lado? vamos a ayudarte con eso.', 'gatito_en_caja_de_arena.jpg', 'Gato en frente de caja de arena'),
(4, 4, '2022-06-10', 'Viajar con Tu Mascota', 'Viajar con una mascota parece simple, pero hay muchos cuidados que se deben tener en cuenta para que, tanto tú como tu mascota, tengan un placentero trayecto, aquí te dejamos estos tips <ol><li>1.Adecúa tu destino a tu mascota: Revisa que tu destino sea Pet Friendly, es necesario que nuestra mascota se sienta cómoda en cualquier lugar para evitar que se estrese. </li><li>2. Habla con tu veterinario: Realizale todos los estudios necesarios antes de hacer tu viaje e informale a tu veterinario de tu destino. </li><li>3. Haz que su trayecto sea agradable: Ponle su collar identificado con su nombre y si es posible realiza paradas para que se hidrate y se estire (usando siempre su correa).</li> <li>4. Facilita el proceso de alimentación: Ten a mano su comida, un bol plegable y su termo de agua para que se mantenga hidratada.</li><li> 5. Prepara su kit de emergencias: Lleva sus tratamientos o medicinas si es que esta usando y sus bolsas sanitarias para dejar siempre los lugares limpios.</li></ol>', 'Viajar con tu mascota no es tan complicado como parece, te damos algunos tips para tener un viaje de lujo.', 'perrito_en_auto_viajando.jpg', 'Perro asomado desde la ventana de un auto'),
(5, 5, '2022-06-10', 'Gatitos acalorados', 'En estos meses tan calurosos es importante asegurar el bienestar de nuestros amigos felinos. Con pequeños gestos, y tomando consciencia de nuestro entorno, podemos darle a nuestro gato una temporada de vacaciones mejor. Las altas temperaturas pueden suponer una verdadera amenaza para los gatos. <br/> Por ello queremos compartir con vosotros, sobre todo con los padres primerizos que han incorporado a un nuevo miembro a su familia, 10 consejos para proteger a tu gato del calor.Sigue estos pasos para que tu gatito la pase mejor durante el verano:<ol><li>1.Tener siempre agua fresca en el bebedero.</li><li>2.Protégelo del sol, evita que este en contacto directo por mucho tiempo.</li><li>3.Mantén un ambiente fresco en tu hogar.</li><li>4.Refréscalo con toallas húmedas.</li><li>5.Mantén un buen cepillado para que esté libre de cabello muerto.</li></ol>', '¿Calores tormentosos para tu gato? Ya no más, te damos los mejores tips para el bienestar de tu gatito.', 'gato_banandose.jpg', 'Gatito bañandose al lado de una ventana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_tienen_etiquetas`
--

CREATE TABLE `noticias_tienen_etiquetas` (
  `noticias_fk` int(10) UNSIGNED NOT NULL,
  `etiquetas_fk` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_descripcion` varchar(255) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `descripcion`, `img`, `img_descripcion`, `precio`) VALUES
(1, 'Vital Fiber Cepillo', 'Buddy Pet trae los nuevo snacks cepillo para perro que ayudan en el cuidado dental, con una nutritiva mezcla de frutas, verduras y prebióticos que ayudan a mejoran la salud digestiva de tu mascota.', 'vital_fiber_cepillo_7_600x600_grande.jpg', 'Vital Fiber Cepillo, golosina para perros', '350'),
(2, 'Galletas de Arándano', 'Nuevas galletas horneadas ideales para regalonear a tu perro. Contienen Probiótico Inmunológico (precursor de la flora intestinal) y Omega 3 con el más rico sabor a arándano.', 'galleta_arandano_grande.jpg', 'Galletas de Arándano aptas para perros', '500'),
(3, 'Munchy Sticks', 'Palitos Masticables de Cuero de Vacuno con Sabor a Pollo.', 'munchy_stick_grande.jpg', 'Munchy Sticks, huesos masticables para animales', '250'),
(4, 'Hueso Avena Menta', 'Snack Hueso Avena Menta, ideales para refrescar el aliento y cuidar la higiene bucal de tu mascota.', 'snack_hueso_avena_menta_grande.jpg', 'Hueso Avena Menta, huesos para perros de menta', '700'),
(5, 'Hueso Blanco', 'Hueso cuero natural para perro envuelto en pollo.', 'hueso_cuero_pollo_m_grande.jpg', 'Hueso Blanco Envuelto en Pollo para perros', '200'),
(6, 'Shampoo Seco Repelente', 'Repelente natural para eliminar las pulgas de tu gatito.', 'shampoo_repelente_pulgas_gato_grande.jpg', 'Shampoo seco y repelente, especial para gatos', '800'),
(7, 'Juguete para Gato', 'Juguete caña que desarrolla su concentración, su vista y su coordinación, contribuye a satisfacer su instinto cazador.', 'juguete_gato_cana_scaled_grande.jpg', 'Juguete para Gato hecho de caña rosa', '1200'),
(8, 'Juguete Plush', 'Ratones de juguete con catnip para gatos, diferentes texturas y colores que favorecen el instinto de caza, ideal para perseguir y capturar, entreteniendo a nuestro gato por horas.', 'plush_2_pzas_grande.jpg', 'Juguete de plush de 2 piezas para gato', '400'),
(9, 'Juguete Tunel', 'Juguete tunel para gato, ideal para jugar, correr, esconderse y entretenerse por horas. Medidas: 26x26x49 cm', 'tunel_para_gato_grande.jpg', 'Tunel para que jueguen los gatos', '1500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_tienen_categorias`
--

CREATE TABLE `productos_tienen_categorias` (
  `productos_fk` tinyint(3) UNSIGNED NOT NULL,
  `categorias_fk` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `email`, `password`, `nombre`, `apellido`) VALUES
(1, 'sofiacarrasco@gmail.com', 'nuevapassword', 'Sofia', 'Carrasco'),
(2, 'marta.perez@hotmail.com', 'uruguay4265', 'Marta', 'Pérez'),
(3, 'delfincolorado@gmail.com', 'mipassword', 'Gastón', 'Pérez'),
(4, 'laucha@yahoo.com.ar', '132rnfsw435', 'Lautaro', 'Gutierrez'),
(5, 'tecorrocaminando@yahoo.com', 'pjihu0742F4fv', 'Alejandra', 'Alonso'),
(6, 'jime_smith@gmail.com', '92enfPMV', 'Jimena', 'Smith'),
(7, 'fede.tamburrino@yahoo.com', 'ifncanfo87pdmn', 'Federico', 'Tamburrino');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias_id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`etiqueta_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `fecha_publicacion_idk` (`fecha_publicacion`),
  ADD KEY `fk_noticias_usuarios_idx` (`usuarios_usuario_id`);

--
-- Indices de la tabla `noticias_tienen_etiquetas`
--
ALTER TABLE `noticias_tienen_etiquetas`
  ADD PRIMARY KEY (`noticias_fk`,`etiquetas_fk`),
  ADD KEY `fk_noticias_tienen_etiquetas_noticias_idx` (`noticias_fk`),
  ADD KEY `fk_noticias_tienen_etiquetas_etiquetas_idx` (`etiquetas_fk`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `productos_tienen_categorias`
--
ALTER TABLE `productos_tienen_categorias`
  ADD PRIMARY KEY (`productos_fk`,`categorias_fk`),
  ADD KEY `fk_productos_tienen_categorias_productos_idx` (`productos_fk`),
  ADD KEY `fk_productos_tienen_categorias_categorias_idx` (`categorias_fk`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categorias_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `etiqueta_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `noticia_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticias_usuarios` FOREIGN KEY (`usuarios_usuario_id`) REFERENCES `usuarios` (`usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticias_tienen_etiquetas`
--
ALTER TABLE `noticias_tienen_etiquetas`
  ADD CONSTRAINT `fk_noticias_tienen_etiquetas_etiquetas` FOREIGN KEY (`etiquetas_fk`) REFERENCES `etiquetas` (`etiqueta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_noticias_tienen_etiquetas_noticias` FOREIGN KEY (`noticias_fk`) REFERENCES `noticias` (`noticia_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_tienen_categorias`
--
ALTER TABLE `productos_tienen_categorias`
  ADD CONSTRAINT `fk_productos_tienen_categorias_categorias` FOREIGN KEY (`categorias_fk`) REFERENCES `categorias` (`categorias_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_tienen_categorias_productos` FOREIGN KEY (`productos_fk`) REFERENCES `productos` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
