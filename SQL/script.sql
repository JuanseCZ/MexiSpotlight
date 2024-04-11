DROP DATABASE IF EXISTS MEXISPOTLIGHT;

CREATE DATABASE MEXISPOTLIGHT;

USE MEXISPOTLIGHT;

CREATE TABLE negocios (
    id INT PRIMARY KEY AUTO_INCREMENT, Nombre VARCHAR(255) NOT NULL, Imagen VARCHAR(255), Descripcion TEXT, CoordenadaX FLOAT, CoordenadaY FLOAT, NumeroVotos INT, PuntosPromedio FLOAT
);

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT, Nombre VARCHAR(255) NOT NULL, Usuario VARCHAR(255) NOT NULL, Contraseña VARCHAR(255) NOT NULL, IsAdmin VARCHAR(255) NOT NULL
);

CREATE TABLE newsletter (
    id INT PRIMARY KEY AUTO_INCREMENT, Nombre VARCHAR(255) NOT NULL, Correo VARCHAR(255) NOT NULL
);

INSERT INTO
    negocios (
        Nombre, Imagen, Descripcion, CoordenadaX, CoordenadaY, NumeroVotos, PuntosPromedio
    )
VALUES (
        'Fitness Zone', 'muestra.png', 'Gimnasio especializado en entrenamientos de fuerza y resistencia. Ofrecemos una amplia variedad de clases y equipos de última generación para ayudarte a alcanzar tus objetivos fitness.', 28.704264, -106.149086, 21, 4.7
    ),
    (
        'Ristorante Delizia', 'muestra.png', 'Auténtica cocina italiana con una amplia selección de pastas, pizzas y platillos gourmet. Nuestro ambiente acogedor y nuestro excelente servicio te harán sentir como en casa.', 28.607219376159062, -106.12099450377646, 8, 4.2
    ),
    (
        'The Brickhouse Grill', 'muestra.png', 'Restaurante de comida americana con una amplia variedad de platillos, desde hamburguesas hasta cortes de carne premium. Disfruta de nuestra selección de cervezas artesanales.', 28.641483431997194, -106.0920000750934, 15, 4.8
    ),
    (
        'Sky Lounge & Café', 'muestra.png', 'Disfruta de una vista panorámica de la ciudad mientras saboreas exquisitas bebidas y café de alta calidad en nuestro exclusivo bar en las alturas.', 28.62602433678619, -106.1208318039291, 10, 4.5
    ),
    (
        'Sinaloa Street Food', 'muestra.png', 'Saborea los auténticos sabores de Sinaloa con nuestra amplia selección de antojitos mexicanos. Desde tacos hasta mariscos frescos, tenemos algo para todos los gustos.', 28.6314774460996, -106.14033336586198, 35, 4.9
    ),
    (
        'Sporting Arena', 'muestra.png', 'El lugar perfecto para los amantes del deporte. Disfruta de nuestros múltiples espacios para practicar tu deporte favorito y relájate con una cerveza fría después del juego.', 28.642807113568786, -106.09299610076478, 12, 4.6
    ),
    (
        'Tasty Ceviche', 'muestra.png', 'Ven a probar nuestra deliciosa variedad de ceviches preparados con los ingredientes más frescos. Una experiencia gastronómica única que no querrás perderte.', 28.680085702728928, -106.0036400272234, 28, 4.3
    ),
    (
        'Hotdog Heaven', 'muestra.png', '¡Ven y prueba nuestros deliciosos hotdogs estilo guatemalteco! Una mezcla única de sabores y condimentos que te harán volver por más.', 28.646042447364476, -106.13416578871035, 5, 4.1
    );

-- Insert in usuarios a testing user

INSERT INTO
    usuarios (
        Nombre, Usuario, Contraseña, IsAdmin
    )
VALUES (
        'Admin User', 'admin', 'admin', 'true'
    ),
    (
        'Testing User', 'test', 'test', 'false'
    );