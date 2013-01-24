/* comentario en sql
SQL Structure Query Language 

Base de Datos: Una colección de datos que estan organizados
Gestores o manejadores de DB: Son los programas que nos permiten administrar los datos

En MySQL existen 2 tipos de engine para tablas
1)MyISAM - Tablas planas, son como si fueran a trabajar datos en Excel
2)InnoDB - Tablas Relacionales, son como si fueran a trabajar datos en Access
*/

CREATE DATABASE mis_contactos;

USE mis_contactos;

CREATE TABLE contactos(
	email VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	sexo CHAR(1),
	nacimiento DATE,
	telefono VARCHAR(13),
	pais VARCHAR(50) NOT NULL,
	imagen VARCHAR(50),
	PRIMARY KEY(email),
	FULLTEXT KEY buscador(email, nombre, sexo, telefono, pais)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE pais (
	id_pais INT NOT NULL AUTO_INCREMENT,
	pais VARCHAR(50) NOT NULL,
	PRIMARY KEY(id_pais)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO pais(id_pais, pais) VALUES 
	(1,"México"),
	(2,"Colombia"),
	(3,"Guatemala"),
	(4,"España"),
	(5,"Brasil"),
	(6,"Urugay"),
	(7,"Perú"),
	(8,"Argentina"),
	(9,"Chile"),
	(10,"Paraguay"),
	(11,"Honduras"),
	(12,"El Salvador"),
	(13,"Nicaragua"),
	(14,"Costa Rica"),
	(15,"Panamá"),
	(16,"Venezuela"),
	(17,"Ecuador"),
	(18,"Bolivia"),
	(19,"Canada"),
	(20,"Estado Unidos"),
	(21,"Groenlandia"),
	(22,"República Dominicana"),
	(23,"Haití"),
	(24,"Cuba"),
	(25,"Belice"),
	(26,"Inglaterra"),
	(27,"Francia"),
	(28,"Alemania"),
	(29,"Italia"),
	(30,"Japón"),
	(31,"China"),
	(32,"Egipto"),
	(33,"Sudafrica"),
	(34,"Australia"),
	(35,"Nueva Zelanda");