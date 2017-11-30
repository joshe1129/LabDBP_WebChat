CREATE TABLE usuario (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(32),
    apellidos VARCHAR(32) NOT NULL,
    nickname VARCHAR(32),
    password VARCHAR(32),
    fecha_registro DATE
);

INSERT INTO usuario (nickname, password, nombres, apellidos, fecha_registro) VALUES 
  ('user1', '123', 'Juan', 'Perez', '1990-05-23'),
  ('user2', '123', 'Carlos', 'Castro', '1992-12-21'),
	('user3', '123', 'Maria', 'Mendoza', '1995-08-03');