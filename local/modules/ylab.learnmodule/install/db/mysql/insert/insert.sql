SET @DATE=(DATE_FORMAT(NOW(), '%d %m %Y'));
SET @LOG = (SELECT CONCAT('Модуль установлен:', ' ', @DATE));
INSERT INTO `y_logs` (`ID`, `NAME`, `LOG`) VALUES (NULL, 'Админ', @LOG);