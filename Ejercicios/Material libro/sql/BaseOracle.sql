CREATE TABLE artículos (
	identificador NUMBER(9),
	texto VARCHAR2(40) CONSTRAINT artículos$nn01 NOT NULL,
	precio NUMBER(6,2) CONSTRAINT artículos$nn02 NOT NULL,
	CONSTRAINT artículos$pk PRIMARY KEY (identificador)
);

CREATE SEQUENCE s_artículos;

CREATE OR REPLACE TRIGGER ins_artículos
BEFORE INSERT ON artículos
FOR EACH ROW
BEGIN
	SELECT s_artículos.NEXTVAL INTO :new.identificador FROM dual;
END;
/

INSERT INTO artículos (texto, precio) VALUES ('Albaricoques', 35.5);
INSERT INTO artículos (texto, precio) VALUES ('Cerezas', 48.9);
INSERT INTO artículos (texto, precio) VALUES ('Fresas', 29.95);
INSERT INTO artículos (texto, precio) VALUES ('Melocotones', 37.2);
COMMIT;

CREATE TABLE usuarios (
	identificador VARCHAR(20),
	contraseña VARCHAR(20) CONSTRAINT usuarios$nn01 NOT NULL,
	CONSTRAINT usuarios$pk PRIMARY KEY (identificador)
);

INSERT INTO usuarios (identificador, contraseña) VALUES ( 'heurtel', 'olivier');
COMMIT;

CREATE OR REPLACE PACKAGE pkg_artículos IS
	TYPE cursor IS REF CURSOR;
	PROCEDURE crear(	
							p_texto IN VARCHAR2,
							p_precio IN NUMBER,
							p_identificador OUT NUMBER);
	FUNCTION contar RETURN NUMBER;
	PROCEDURE leer(
							p_identificador IN NUMBER,
							p_cursor OUT cursor);
END pkg_artículos;
/

CREATE OR REPLACE PACKAGE BODY pkg_artículos IS
	-- procedimiento de inserción en la matriz artículos
	-- devuelve el identificador del nuevo artículo 
	-- en p_identificador
	PROCEDURE crear(	
							p_texto IN VARCHAR2,
							p_precio IN NUMBER,
							p_identificador OUT NUMBER)
	IS
	BEGIN
		INSERT INTO artículos(identificador,texto,precio)
		VALUES(s_artículos.NEXTVAL,p_texto,p_precio)
		RETURNING identificador INTO p_identificador;
		COMMIT;
	END crear;
	-- función de recuento de artículos
	FUNCTION contar RETURN NUMBER
	IS
		v_número NUMBER(9) := 0;
	BEGIN
		SELECT COUNT(identificador) INTO v_número
		FROM artículos;
		RETURN v_número;
	END contar;
	-- procedimiento de lectura de un artículo (si p_identificador > 0) 
	-- o de todos los artículos (si p_identificador = 0)
	-- el resultado se devuelve en forma de un cursor
	PROCEDURE leer(
							p_identificador IN NUMBER,
							p_cursor OUT cursor)
	IS
	BEGIN
			IF p_identificador = 0 THEN
				OPEN p_cursor FOR
					SELECT * FROM artículos;
			ELSE
				OPEN p_cursor FOR
					SELECT * FROM artículos
					WHERE identificador = p_identificador;
			END IF;
	END leer;
END pkg_artículos;
/

CREATE OR REPLACE PROCEDURE leer_cursor_implícito
-- procedimiento que devuelve un resultado en forma  
-- de un cursor implícito (novedad de Oracle 12c)
-- este procedimiento no funcionará en una 
-- versión anterior a Oracle 12c
IS
  rc SYS_REFCURSOR;
BEGIN
  OPEN rc FOR
    SELECT * FROM artículos;
  DBMS_SQL.RETURN_RESULT(rc);
END leer_cursor_implícito;
/
