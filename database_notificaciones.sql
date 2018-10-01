create database notificaciones;
use notificaciones;

CREATE TABLE datos (
  id int(30) NOT NULL AUTO_INCREMENT,
  mensaje varchar(300),
  estado int(1),
  autor varchar(300),
  fecha timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  primary key (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
