-- --------------------------
-- BASE DE DATOS TUTORIAS PRACTICA 13
-- --------------------------
CREATE DATABASE practica13
CHARACTER SET utf8
COLLATE utf8_unicode_ci;
USE practica13;

-- --------------------------
-- TABLA DEPORTES
-- --------------------------
create table deportes (
id int(10) not null auto_increment,
deporte varchar(200) not null,
Primary key (id));

-- --------------------------
-- TABLA JUGADORES
-- --------------------------
create table jugadores(
id int(10) not null auto_increment,
nombre varchar(100) not null,
apellido varchar(100) not null,
correo varchar(200) not null,
deporte int(10) not null,
Foreign key (deporte) REFERENCES deportes (id) on delete cascade on update cascade,
primary key(id));
-- --------------------------
-- TABLA EQUIPOS
-- --------------------------
create table equipos(
id int(10) not null auto_increment,
nombre varchar(100) not null,
deporte int(10) not null,
primary key(id),
Foreign key (deporte) REFERENCES deportes (id) on delete cascade on update cascade);

-- --------------------------
-- TABLA ADMIN
-- --------------------------
create table administrador(
id int(10) not null,
username varchar(200) not null,
email varchar(200) not null,
password varchar(200) not null,
primary key(id)
);

insert into administrador VALUES (1,'admin','admin@gmail.com','admin');


--  insert & select
insert into deportes VALUES(1,'Soccer'),(2,'Basketball'),(3,'Voleibol');

-- 
insert into jugadores VALUES (1,'Ramon','Mata','1430115@upv.edu.mx',2),(2,'Luis','Gonzalez','1430518@upv.edu.mx',1);

--
insert into equipos VALUES (1,'Jaguares',2),(2,'Cruz Azul',1);


SELECT j.id , j.nombre , j.apellido, j.correo , d.deporte
FROM jugadores j
INNER JOIN deportes d on d.id=j.deporte
ORDER BY id asc;


SELECT e.id , e.nombre , d.deporte
FROM  equipos e
INNER JOIN deportes d on d.id=e.deporte
ORDER BY id asc;
