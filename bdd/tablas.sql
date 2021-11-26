CREATE DATABASE proyecto;
use proyecto;
CREATE TABLE IF NOT EXISTS usuarios (
	`uid` int(7) not null primary key auto_increment,
    `contraseña` varchar(255),
    `usuario` varchar(50) not null unique,
    `email` varchar(100),
    `tipo_usuario` varchar(255)
);
/*Insertamos un admin*/
INSERT INTO usuarios (`contraseña`,`usuario`,`email`, `tipo_usuario`)
VALUES (SHA2('123456', 256),"admin","guiillerrf@gmail.com", "admin");
/*Tabla puntos para almacenarlos por usuario y juego*/
CREATE TABLE IF NOT EXISTS puntos(
	`usuario` varchar(50),
    `puntos1` int(10),
	`fechaRecord` date not null,
    FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
    ON UPDATE CASCADE ON DELETE CASCADE
);
/*Insertamos puntos*/
INSERT INTO puntos (`usuario`,`puntos1`,`fechaRecord`)
VALUES ("admin",2,"2000-01-01");