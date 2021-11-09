CREATE TABLE artículos (
	identificador INT(11) NOT NULL AUTO_INCREMENT,
	texto VARCHAR(40) NOT NULL,
	precio FLOAT DEFAULT '0' NOT NULL,
	PRIMARY KEY (identificador)
);

INSERT INTO artículos (texto, precio) VALUES ('Albaricoques', 35.5);
INSERT INTO artículos (texto, precio) VALUES ('Cerezas', 48.9);
INSERT INTO artículos (texto, precio) VALUES ('Fresas', 29.95);
INSERT INTO artículos (texto, precio) VALUES ('Melocotones', 37.2);

CREATE TABLE usuarios (
	identificador VARCHAR(20) NOT NULL,
	contraseña VARCHAR(20) NOT NULL,
	PRIMARY KEY (identificador)
);

INSERT INTO usuarios (identificador, contraseña) VALUES ( 'heurtel', 'olivier');

delimiter //

CREATE PROCEDURE ps_crear_artículo
  (
  -- Texto del nuevo artículo.
  IN p_texto VARCHAR(25),
  -- Precio del nuevo artículo.
  IN p_precio DECIMAL(5,2),
  -- Identificador del nuevo artículo.
  OUT p_identificador INT
  )
BEGIN
  /*
  ** Insertar el nuevo artículo y
  ** recuperar el identificador asignado.
  */
  INSERT INTO artículos (texto,precio)
  VALUES (p_texto,p_precio);
  SET p_identificador = LAST_INSERT_ID();
END;
//

CREATE PROCEDURE ps_leer_artículos
  (
  -- Precio máximo.
  IN p_precio_max DECIMAL(5,2)
  )
BEGIN
  /*
  ** Seleccionar los artículos cuyo precio es
  ** inferior al importe pasado como parámetro.
  */
  SELECT
    texto
  FROM
    artículos
  WHERE
    precio < p_precio_max;
END;
//

CREATE FUNCTION fs_número_artículos
  (
  -- Precio máximo.
  p_precio_max DECIMAL(5,2)
  )
  RETURNS INT
BEGIN
  /*
  ** Contar el número de artículos cuyo precio es
  ** inferior al importe pasado como parámetro.
  */
  DECLARE v_resultado INT;
  SELECT
    COUNT(*)
  INTO
    v_resultado
  FROM
    artículos
  WHERE
    precio < p_precio_max;
  RETURN v_resultado;
END;
//

delimiter;
