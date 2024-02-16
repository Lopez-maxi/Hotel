-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS final;

-- Usar la base de datos
USE final;

-- Estructura de tabla para la tabla `configuraciones`
CREATE TABLE IF NOT EXISTS tbl_configuraciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  valor VARCHAR(255) NOT NULL
);

-- Estructura de tabla para la tabla `admin`
CREATE TABLE IF NOT EXISTS tbl_admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL
);

-- Estructura de tabla para la tabla `equipo`
CREATE TABLE IF NOT EXISTS tbl_equipo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  profesion VARCHAR(255) NOT NULL,
  imagen VARCHAR(255) NOT NULL
);

-- Estructura de tabla para la tabla `habitaciones`
CREATE TABLE IF NOT EXISTS tbl_habitaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  precio INT NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  camas INT NOT NULL,
  banos INT NOT NULL,
  descripcion TEXT NOT NULL
);

-- Estructura de tabla para la tabla `nosotros`
CREATE TABLE IF NOT EXISTS tbl_nosotros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL,
  imagen VARCHAR(255) NOT NULL
);

-- Estructura de tabla para la tabla `reservas`
CREATE TABLE IF NOT EXISTS tbl_reservas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombrecompleto VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL,
  fecha_entrada DATETIME NOT NULL,
  fecha_salida DATETIME NOT NULL,
  adultos INT NOT NULL,
  menores INT NOT NULL,
  habitacion VARCHAR(255) NOT NULL,
  solicitud_especial VARCHAR(255) NOT NULL
);

-- Estructura de tabla para la tabla `servicios`
CREATE TABLE IF NOT EXISTS tbl_servicios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  icono VARCHAR(255) NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL
);

-- Estructura de tabla para la tabla `testimonios`
CREATE TABLE IF NOT EXISTS tbl_testimonios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL,
  profesion VARCHAR(1000) NOT NULL,
  imagen VARCHAR(255) NOT NULL,
  descripcion TEXT NOT NULL
);

-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE IF NOT EXISTS tbl_usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  correo VARCHAR(255) NOT NULL
);

-- Volcado de datos para la tabla `admin`
INSERT INTO tbl_admin (usuario, password, correo)
VALUES ('admin', 'admin', 'algo.com');

-- Volcado de datos para la tabla `equipo`
INSERT INTO tbl_equipo (nombre, profesion, imagen)
VALUES
  ('Full Name 1', 'Designation', '1694038807_team-1.jpg'),
  ('Full Name 2', 'Designation', '1694038818_team-2.jpg'),
  ('Full Name 3', 'Designation', '1694038827_team-3.jpg');
  

-- Volcado de datos para la tabla `habitaciones`
INSERT INTO tbl_habitaciones (precio, imagen, titulo, camas, banos, descripcion)
VALUES
  (100, '1694037571_room-1.jpg', 'Suite junior', 2, 1, 'Las Junior Suites de nuestro hotel 5 estrellas en Madrid ofrecen diez espectaculares y únicos diseños...'),
  (200, '1694037907_room-2.jpg', 'Suite ejecutiva', 3, 2, 'La particularidad de estas Suites es la posibilidad que brindan al huésped de convertirse en el arquitecto de su propio espacio...'),
  (300, '1694038155_room-3.jpg', 'Súper Deluxe Presidencial', 4, 3, 'Las dos fantásticas Suites Presidenciales están más cerca del cielo que de la tierra...'),
  (150, '1694467772_foto1.png', 'Lagoon & Sunset Rooftop Pool Villa', 2, 1, 'Ubicada suavemente sobre la laguna y a solo unos pasos de la playa...'),
  (200, '1694468192_foto2.png', 'Beachfront Terrace Pool Suite', 2, 2, 'Esta suite frente al mar ofrece la opción de una terraza lateral que permite un acceso exclusivo a pie de playa...'),
  (300, '1694468234_foto3.png', 'Bliss Pool Villa', 3, 2, 'Diseñado para dos huéspedes, el Bliss Pool Villa existe en armonía con la naturaleza circundante...'),
  (500, '1694468337_foto4.png', 'Serenity Two-Bedroom Pool Villa', 5, 2, 'Esta espaciosa villa de lujo de dos dormitorios en Playa del Carmen incluye un cómodo pabellón de salón y dos dormitorios...'),
  (500, '1694468394_foto5.png', 'Wellbeing Sanctuary Pool Villa', 4, 2, 'Nuestro oasis ofrece una indescriptible vista a la laguna color jade, una alberca templada y un balcón privado donde puede solicitar un tratamiento de spa exclusivo...'),
  (400, '1694468505_foto6.png', 'Oceanfront Balcony Pool Suite', 1, 1, 'Despiértese todas las mañanas con vista al océano mientras los rayos del sol le sorprenden en su habitación...');

-- Volcado de datos para la tabla `nosotros`
INSERT INTO tbl_nosotros (titulo, descripcion, imagen)
VALUES
  ('Bienvenido a AMÉRICA', 'El Hotel Puerta América, un hotel 5 estrellas ubicado cerca del centro de Madrid, es un lugar especial que invita a soñar a quien lo visita. Un proyecto único en el mundo que ha reunido a diecinueve de los mejores estudios de arquitectos y diseñadores del mundo...', '1694037342_about-1.jpg'),
  ('                    ', '                                                                                                                                                                                                                                                                            ', '1694037439_about-2.jpg'),
  ('                    ', '                                                                                                                                                                                                                                                                           ', '1694037445_about-3.jpg'),
  ('                    ', '                                                                                                                                                                                                                                                                            ', '1694037451_about-4.jpg');

-- Volcado de datos para la tabla `reservas`
INSERT INTO tbl_reservas (nombrecompleto, correo, fecha_entrada, fecha_salida, adultos, menores, habitacion, solicitud_especial)
VALUES
  ('Maximiliano López', 'maximilianojlopez@hotmail.com', '2023-09-23 19:23:00', '2023-09-27 19:23:00', 2, 0, 'Junior', 'Fernet'),
  ('Maximiliano López', 'maximilianojlopez@hotmail.com', '2023-09-23 19:23:00', '2023-09-27 19:23:00', 1, 0, 'Super Deluxe Presidencial', 'Fernet con coca-cola');

-- Volcado de datos para la tabla `servicios`
INSERT INTO tbl_servicios (icono, titulo, descripcion)
VALUES
  ('fa fa-hotel', 'Habitaciones y Suites', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.'),
  ('fa fa-utensils', 'Comidas y Restaurantes', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.'),
  ('fa fa-spa', 'Spa y Fitness', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.'),
  ('fa fa-swimmer', 'Deportes y Juegos', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.'),
  ('fa fa-glass-cheers', 'Eventos y Fiestas', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.'),
  ('fa fa-dumbbell', 'Gimnasio y Yoga', 'Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet lorem.');

-- Volcado de datos para la tabla `testimonios`
INSERT INTO tbl_testimonios (nombre, profesion, imagen, descripcion)
VALUES
  ('Client Name', 'Profession', '1694038731_team-3.jpg', 'Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos 1'),
  ('Client Name', 'Profession', '1694038744_testimonial-1.jpg', 'Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos 2'),
  ('Client Name', 'Profession', '1694038756_testimonial-2.jpg', 'Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd et erat magna eos 3');

-- Volcado de datos para la tabla `usuarios`
INSERT INTO tbl_usuarios (usuario, password, correo)
VALUES ('maxi', '123', 'maximilianojlopez@hotmail.com');

-- Volcado de datos para la tabla `configuraciones`
INSERT INTO tbl_configuraciones (nombre, valor)
VALUES
  ('Nombre del hotel', 'Hotel Puerta América'),
  ('Titulo superior izquierdo', 'América'),
  ('Direccion de E-mail', 'maximilianojlopez@hotmail.com'),
  ('Numero de telefono', '1140684054'),
  ('Titulo central', 'VIDA DE LUJO'),
  ('Titulo general', 'Bienvenido a un hotel de lujo'),
  ('Boton 1', 'NUESTRAS HABITACIONES'),
  ('Boton 2', 'RESERVAR UNA HABITACIÓN'),
  ('Cantidad de Suites', '200'),
  ('Staff', '800'),
  ('Clientes', '1750'),
  ('Nombre en pie de pagina', 'América'),
  ('Contacto', 'CONTACTO'),
  ('Compania', 'COMPANIA'),
  ('Servicios', 'SERVICIOS'),
  ('Direccion fisica', 'Avenida de América, 41, 28002 Madrid. Spain'),
  ('Numero telefono', '+549 1140684054'),
  ('Direccion de E-mail', 'maximilianojlopez@hotmail.com'),
  ('Nosotros', 'Nosotros'),
  ('Contactanos', 'Contactanos'),
  ('Politica de Privacidad', 'Politica de Privacidad'),
  ('Terminos y Condiciones', 'Terminos y Condiciones'),
  ('Soporte', 'Soporte'),
  ('Restaurant', 'Restaurant'),
  ('Spa & Fitness', 'Spa & Fitness'),
  ('Deportes & Juegos', 'Deportes & Juegos'),
  ('Eventos y Fiestas', 'Eventos y Fiestas'),
  ('Gym & Yoga', 'Gym & Yoga'),
  ('Titulo central Nosotros', 'Sobre nosotros'),
  ('Titulo central Servicios', 'servicios'), 
  ('Titulo central Suits', 'Suits de lujo'),
  ('Titulo central reservas', 'Reservá tu suits'),
  ('Titulo central testimonios', 'Testimonios'),
  ('Titulo central contactenos', 'Contactenos'),
  ('Titulo central Staff', 'Nuestro Staff');
