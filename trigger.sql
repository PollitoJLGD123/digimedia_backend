use laravel_digimedia;

DELIMITER $$

CREATE TRIGGER after_update_usuarios
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
	INSERT INTO user_log (tabla_afectada, operacion, usuario_sql, detalle)
	VALUES (
		'usuarios',
		'UPDATE',
		SUBSTRING_INDEX(USER(), '@', 1),
		CONCAT('ID: ', OLD.id, ', nombre cambiado de \"', OLD.name, '\" a \"', NEW.name, '\"')
	);
END;


DELIMITER ;