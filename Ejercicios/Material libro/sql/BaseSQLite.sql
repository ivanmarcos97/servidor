CREATE TABLE artículos (
	identificador INTEGER PRIMARY KEY,
	texto VARCHAR(40) NOT NULL,
	precio FLOAT DEFAULT 0 NOT NULL
);

INSERT INTO artículos (texto, precio) VALUES ('Albaricoques', 35.5);
INSERT INTO artículos (texto, precio) VALUES ('Cerezas', 48.9);
INSERT INTO artículos (texto, precio) VALUES ('Fresas', 29.95);
INSERT INTO artículos (texto, precio) VALUES ('Melocotones', 37.2);

CREATE TABLE usuarios (
	identificador VARCHAR(20) PRIMARY KEY,
	contraseña VARCHAR(20) NOT NULL
);

INSERT INTO usuarios (identificador, contraseña) VALUES ( 'heurtel', 'olivier');
