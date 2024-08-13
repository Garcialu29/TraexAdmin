SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS traex_db;

USE traex_db;

DROP TABLE IF EXISTS tbl_bitacora;

CREATE TABLE `tbl_bitacora` (
  `Id_Bitacora` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` bigint(20) NOT NULL,
  `Id_Objeto` bigint(20) NOT NULL,
  `Accion` varchar(50) NOT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Id_Bitacora`),
  KEY `Id_Usuario` (`Id_Usuario`),
  KEY `Id_Objeto` (`Id_Objeto`),
  CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_bitacora_ibfk_2` FOREIGN KEY (`Id_Objeto`) REFERENCES `tbl_objetos` (`Id_Objeto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_bitacora VALUES("147","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-24");
INSERT INTO tbl_bitacora VALUES("148","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-25");
INSERT INTO tbl_bitacora VALUES("149","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-26");
INSERT INTO tbl_bitacora VALUES("150","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-26");
INSERT INTO tbl_bitacora VALUES("151","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-26");
INSERT INTO tbl_bitacora VALUES("152","25","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-26");
INSERT INTO tbl_bitacora VALUES("153","2","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-27");
INSERT INTO tbl_bitacora VALUES("154","2","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-27");
INSERT INTO tbl_bitacora VALUES("155","2","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-27");
INSERT INTO tbl_bitacora VALUES("156","2","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-27");
INSERT INTO tbl_bitacora VALUES("157","2","1","Acceso al sistema","Accedio correctamente al sistema","2023-11-29");
INSERT INTO tbl_bitacora VALUES("158","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-01-08");
INSERT INTO tbl_bitacora VALUES("159","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-01-09");
INSERT INTO tbl_bitacora VALUES("160","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-01-10");
INSERT INTO tbl_bitacora VALUES("161","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-03");
INSERT INTO tbl_bitacora VALUES("162","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-03");
INSERT INTO tbl_bitacora VALUES("163","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-04");
INSERT INTO tbl_bitacora VALUES("164","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-04");
INSERT INTO tbl_bitacora VALUES("165","81","1","Se actualizo un Objeto del sistema","El usuario CARLOS actualizo un objeto INICIO","2024-02-04");
INSERT INTO tbl_bitacora VALUES("166","81","1","Se actualizo un Objeto del sistema","El usuario CARLOS actualizo un objeto INICIO DE SECION","2024-02-04");
INSERT INTO tbl_bitacora VALUES("167","81","1","Se actualizo un Objeto del sistema","El usuario CARLOS actualizo un objeto INICIO","2024-02-04");
INSERT INTO tbl_bitacora VALUES("168","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-06");
INSERT INTO tbl_bitacora VALUES("169","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-07");
INSERT INTO tbl_bitacora VALUES("170","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-07");
INSERT INTO tbl_bitacora VALUES("171","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-09");
INSERT INTO tbl_bitacora VALUES("172","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-10");
INSERT INTO tbl_bitacora VALUES("173","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-10");
INSERT INTO tbl_bitacora VALUES("174","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-10");
INSERT INTO tbl_bitacora VALUES("175","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-10");
INSERT INTO tbl_bitacora VALUES("176","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("177","82","2","Autoregistro usuario","Se autoregistro el  usuario christian@gmail.com al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("178","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("179","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("180","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("181","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("182","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("183","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-12");
INSERT INTO tbl_bitacora VALUES("184","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-13");
INSERT INTO tbl_bitacora VALUES("185","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-21");
INSERT INTO tbl_bitacora VALUES("186","81","1","Bloqueo usuario","Se bloqueo al usuario carlos@gmail.com Por intentos erroneos","2024-02-21");
INSERT INTO tbl_bitacora VALUES("187","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-21");
INSERT INTO tbl_bitacora VALUES("188","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-26");
INSERT INTO tbl_bitacora VALUES("189","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-26");
INSERT INTO tbl_bitacora VALUES("190","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-27");
INSERT INTO tbl_bitacora VALUES("191","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-27");
INSERT INTO tbl_bitacora VALUES("192","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-28");
INSERT INTO tbl_bitacora VALUES("193","81","1","Acceso al sistema","Accedio correctamente al sistema","2024-02-28");



DROP TABLE IF EXISTS tbl_casillero;

CREATE TABLE `tbl_casillero` (
  `Id_Casillero` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Cliente` bigint(20) NOT NULL,
  `Numero_Casillero` varchar(11) NOT NULL,
  PRIMARY KEY (`Id_Casillero`),
  KEY `tbl_cliente` (`Id_Cliente`),
  CONSTRAINT `tbl_casillero_ibfk_1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tbl_clientes` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_casillero VALUES("5","3","1");
INSERT INTO tbl_casillero VALUES("6","4","HH001");
INSERT INTO tbl_casillero VALUES("7","5","HH002");



DROP TABLE IF EXISTS tbl_cliente;

CREATE TABLE `tbl_cliente` (
  `id_cliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(180) NOT NULL,
  `apellido` varchar(90) NOT NULL,
  `correo_cliente` varchar(90) NOT NULL,
  `telefono` varchar(90) NOT NULL,
  `direccion` varchar(90) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `password` varchar(90) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `correo_cliente` (`correo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_cliente VALUES("1","Lucia","Garcia","garciae422@gmail.com","89811183","RAA","0801200023203","2026-11-20 20:03:00","$2a$10$xv6Gs3NiWWgDwlJcX0NGkeKqI7sKaZQB9cPLC5T8Z0uJ4O4QDJm1O");



DROP TABLE IF EXISTS tbl_clientes;

CREATE TABLE `tbl_clientes` (
  `Id_Cliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Apellidos` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Correo_Cliente` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Numero_ID` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fecha_Registro` date NOT NULL,
  PRIMARY KEY (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tbl_clientes VALUES("3","MARIA","Prueba","prueba@gmail.com","917882246","PRUEBA1","898939","2023-11-24");
INSERT INTO tbl_clientes VALUES("4","Martin","Flores","martinflores@gmail.com","89781233","RAA","02161995123654","2023-11-27");
INSERT INTO tbl_clientes VALUES("5","Gisell","Perez","perezgisell@gmail.com","89332156","Laureles","0801200512456","2023-11-27");



DROP TABLE IF EXISTS tbl_compra;

CREATE TABLE `tbl_compra` (
  `Id_Compra` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Proveedor` int(11) DEFAULT NULL,
  `Id_Usuario` bigint(20) DEFAULT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Estado_Compra` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Compra`),
  KEY `tbl_compra_tbl_proveedor_idx` (`Id_Proveedor`),
  KEY `tbl_compra_tbl_usuario_idx` (`Id_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;




DROP TABLE IF EXISTS tbl_estado_envio;

CREATE TABLE `tbl_estado_envio` (
  `Id_Estado_Envio` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`Id_Estado_Envio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_estado_envio VALUES("1","Bodega");
INSERT INTO tbl_estado_envio VALUES("2","Entregado");
INSERT INTO tbl_estado_envio VALUES("6","Tegucigalpa");



DROP TABLE IF EXISTS tbl_estados_paquete;

CREATE TABLE `tbl_estados_paquete` (
  `id_estado_envio` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripción_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado_envio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;




DROP TABLE IF EXISTS tbl_estados_usuarios;

CREATE TABLE `tbl_estados_usuarios` (
  `id_estado_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_estado` varchar(20) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  PRIMARY KEY (`id_estado_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_estados_usuarios VALUES("1","ACTIVO","2022-10-06");
INSERT INTO tbl_estados_usuarios VALUES("2","INACTIVO","2022-10-13");
INSERT INTO tbl_estados_usuarios VALUES("3","NUEVO","0000-00-00");
INSERT INTO tbl_estados_usuarios VALUES("4","BLOQUEADO","2022-10-23");
INSERT INTO tbl_estados_usuarios VALUES("5","ELIMINADO","2022-10-24");
INSERT INTO tbl_estados_usuarios VALUES("6","Default","2022-11-02");



DROP TABLE IF EXISTS tbl_historico_contrasena;

CREATE TABLE `tbl_historico_contrasena` (
  `Id_Historico` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` bigint(20) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Historico`),
  KEY `Id_Usuario` (`Id_Usuario`),
  CONSTRAINT `tbl_historico_contrasena_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;




DROP TABLE IF EXISTS tbl_notificaciones;

CREATE TABLE `tbl_notificaciones` (
  `Id_notificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) DEFAULT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`Id_notificaciones`),
  KEY `fk_notificacion_cliente` (`cliente_id`),
  CONSTRAINT `fk_notificacion_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `tbl_clientes` (`Id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_notificaciones VALUES("1","0","compra de un tv","0000-00-00");
INSERT INTO tbl_notificaciones VALUES("3","0","compra de un mueble","2023-11-24");



DROP TABLE IF EXISTS tbl_objetos;

CREATE TABLE `tbl_objetos` (
  `Id_Objeto` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Rol` bigint(20) NOT NULL,
  `Nombre_Objeto` varchar(50) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Tipo_Objeto` varchar(50) NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Objeto`),
  KEY `Id_Rol` (`Id_Rol`),
  CONSTRAINT `tbl_objetos_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_rol` (`Id_Rol`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_objetos VALUES("1","2","INICIO","DASHBORD","Modulo","TRAEX","2023-10-02","","0000-00-00");
INSERT INTO tbl_objetos VALUES("2","2","USUARIOS","Modulo de mantenimiento usuarios","Modulo","TRAEX","2023-10-02","","0000-00-00");
INSERT INTO tbl_objetos VALUES("3","2","CLIENTES","Modulo de mantenimiento clientes","modulo","TRAEX","2023-10-02","","0000-00-00");
INSERT INTO tbl_objetos VALUES("4","2","PEDIDOS","Modulo de mantenimiento pedidos","modulo","TRAEX","2023-10-02","","0000-00-00");
INSERT INTO tbl_objetos VALUES("5","2","ROLES","MODULO DE MANTENIMIENTO DE ROLES","Modulo","TRAEX","2023-10-02","","0000-00-00");
INSERT INTO tbl_objetos VALUES("6","1","PARAMETRO","MODULO DE PARAMETROS DE PERMISOS","","MERLIN","2023-11-17","","0000-00-00");
INSERT INTO tbl_objetos VALUES("7","1","PREGUNTAS","PREGUNTAS DE SEGURIDAD","","MERLIN","2023-11-17","","0000-00-00");
INSERT INTO tbl_objetos VALUES("8","1","PAQUETES","MODULO DE PAQUETES","","MERLIN","2023-11-17","","0000-00-00");
INSERT INTO tbl_objetos VALUES("9","1","OBJETOS","MODULO LOS OBJETOS","","MERLIN","2023-11-17","","0000-00-00");



DROP TABLE IF EXISTS tbl_paquete;

CREATE TABLE `tbl_paquete` (
  `Cod_Envio_Paquetes` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Casillero` bigint(20) NOT NULL,
  `Cod_Tipo_Envio` bigint(20) NOT NULL,
  `Peso_Real` decimal(10,2) NOT NULL,
  `Peso_Volumen` decimal(10,2) NOT NULL,
  `Dimensiones` int(11) NOT NULL,
  `Numero_Traking` int(11) NOT NULL,
  `Descripcion_Paquete` varchar(50) NOT NULL,
  `notificacion_id` int(11) DEFAULT NULL,
  `id_Tipo_Seguro` bigint(20) DEFAULT NULL,
  `Id_Estado_Envio` bigint(20) NOT NULL,
  PRIMARY KEY (`Cod_Envio_Paquetes`),
  KEY `tbl_casillero` (`id_Casillero`),
  KEY `Cod_Tipo_Envio` (`Cod_Tipo_Envio`),
  KEY `fk_paquete_notificacion` (`notificacion_id`),
  KEY `fk_paquete_seguro` (`id_Tipo_Seguro`),
  KEY `fk_paquete_estado_envio` (`Id_Estado_Envio`),
  KEY `id_Tipo_Seguro` (`id_Tipo_Seguro`),
  CONSTRAINT `fk_paquete_estado_envio` FOREIGN KEY (`Id_Estado_Envio`) REFERENCES `tbl_estado_envio` (`Id_Estado_Envio`),
  CONSTRAINT `fk_paquete_notificacion` FOREIGN KEY (`notificacion_id`) REFERENCES `tbl_notificaciones` (`Id_notificaciones`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_paquete_ibfk_1` FOREIGN KEY (`id_Casillero`) REFERENCES `tbl_casillero` (`Id_Casillero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_paquete_ibfk_3` FOREIGN KEY (`Cod_Tipo_Envio`) REFERENCES `tbl_tipo_envio` (`Cod_Tipo_Envio`),
  CONSTRAINT `tbl_paquete_ibfk_4` FOREIGN KEY (`id_Tipo_Seguro`) REFERENCES `tbl_tipo_seguro` (`Id_Tipos_Seguros`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_paquete VALUES("1","5","1","20.00","10.00","1","100","EJEMPLO 1","3","1","1");
INSERT INTO tbl_paquete VALUES("2","5","1","100.00","100.00","100","100"," PRUEBA 2","1","1","2");
INSERT INTO tbl_paquete VALUES("6","5","2","300.00","300.00","300","300","PRUEBA 3","1","1","1");
INSERT INTO tbl_paquete VALUES("11","5","2","300.00","300.00","300","300","PRUEBA 3","1","1","1");
INSERT INTO tbl_paquete VALUES("15","6","1","100.00","80.00","90","1234","prueba 7000","","","6");



DROP TABLE IF EXISTS tbl_parametros;

CREATE TABLE `tbl_parametros` (
  `Id_Parametro` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Parametro` varchar(100) NOT NULL,
  `Valor_Parametro` varchar(100) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Parametro`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_parametros VALUES("1","NUM_INTENTOS","1","Numero de intentos de acceso al sistema","TRAEX","2023-10-15","","0000-00-00");
INSERT INTO tbl_parametros VALUES("2","NUM_PREGUNTAS_SECRETAS","5","Cantidad de preguntas secretas","TRAEX","2023-10-16","","0000-00-00");
INSERT INTO tbl_parametros VALUES("3","NUM_DIAS_VENCIMIENTO","365","Cantidad de dias de vencimiento de usuarios","TRAEX","2023-10-20","","0000-00-00");
INSERT INTO tbl_parametros VALUES("4","DIAS_VENCIMIENTO_TOKEN","5","Numero de dias vencimiento de token de correo electronico","TRAEX","2023-10-20","","0000-00-00");



DROP TABLE IF EXISTS tbl_permisos;

CREATE TABLE `tbl_permisos` (
  `Id_Permiso` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Rol` bigint(20) NOT NULL,
  `Id_Objeto` bigint(20) NOT NULL,
  `Permiso_Get` varchar(2) NOT NULL,
  `Permiso_Insert` varchar(2) NOT NULL,
  `Permiso_Update` varchar(2) NOT NULL,
  `Permiso_Delete` varchar(2) NOT NULL,
  `Creado_por` varchar(50) NOT NULL,
  `Fecha_Creado` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificacion` date NOT NULL,
  PRIMARY KEY (`Id_Permiso`),
  KEY `Id_Rol` (`Id_Rol`),
  KEY `Id_Objeto` (`Id_Objeto`),
  CONSTRAINT `tbl_permisos_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_rol` (`Id_Rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_permisos_ibfk_2` FOREIGN KEY (`Id_Objeto`) REFERENCES `tbl_objetos` (`Id_Objeto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_permisos VALUES("63","2","1","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("64","2","2","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("65","2","3","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("66","2","4","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("67","2","5","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("68","2","6","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("76","2","7","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("86","2","8","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("97","2","9","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("99","1","1","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("100","1","2","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("101","1","3","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("102","1","4","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("103","1","5","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("104","1","6","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("105","1","7","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("106","1","8","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("107","1","9","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("117","3","1","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("118","3","2","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("119","3","3","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("120","3","4","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("121","3","5","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("122","3","6","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("123","3","7","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("124","3","8","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("125","3","9","0","0","0","0","","0000-00-00","","0000-00-00");



DROP TABLE IF EXISTS tbl_preguntas;

CREATE TABLE `tbl_preguntas` (
  `Id_Pregunta` bigint(20) NOT NULL AUTO_INCREMENT,
  `Pregunta` varchar(100) NOT NULL,
  `Creado_por` varchar(50) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Modificacion` date NOT NULL,
  PRIMARY KEY (`Id_Pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_preguntas VALUES("1","¿Jugador de Futbol favorito?","TRAEX","2023-10-13","","0000-00-00");
INSERT INTO tbl_preguntas VALUES("2","¿A QUÉ SECUNDARIA FUISTE?","TRAEX","2023-10-13","","0000-00-00");
INSERT INTO tbl_preguntas VALUES("4","¿Nombre de la pelicula favorita?","TRAEX","2023-10-13","","0000-00-00");
INSERT INTO tbl_preguntas VALUES("5","¿Libro favorito?","TRAEX","2023-10-13","","0000-00-00");
INSERT INTO tbl_preguntas VALUES("6","¿Primer trabajo?","TRAEX","2023-10-13","","0000-00-00");



DROP TABLE IF EXISTS tbl_preguntas_usuario;

CREATE TABLE `tbl_preguntas_usuario` (
  `Id_Pregunta_Usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pregunta` bigint(20) NOT NULL,
  `Id_Usuario` bigint(20) NOT NULL,
  `Respuesta` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Creado_Por` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Pregunta_Usuario`),
  KEY `Id_Usuario` (`Id_Usuario`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `tbl_preguntas_usuario_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_preguntas_usuario_ibfk_2` FOREIGN KEY (`id_pregunta`) REFERENCES `tbl_preguntas` (`Id_Pregunta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_preguntas_usuario VALUES("25","1","81","CR7","","0000-00-00","","0000-00-00");
INSERT INTO tbl_preguntas_usuario VALUES("26","2","81","MESSI","","0000-00-00","","0000-00-00");
INSERT INTO tbl_preguntas_usuario VALUES("27","6","81","NOTENGO","","0000-00-00","","0000-00-00");
INSERT INTO tbl_preguntas_usuario VALUES("28","5","81","HARRY","","0000-00-00","","0000-00-00");
INSERT INTO tbl_preguntas_usuario VALUES("29","4","81","HARRY","","0000-00-00","","0000-00-00");



DROP TABLE IF EXISTS tbl_reinicio_contrasena;

CREATE TABLE `tbl_reinicio_contrasena` (
  `Id_Reinicio_Contrasena` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` bigint(20) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Token` varchar(150) NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Reinicio_Contrasena`),
  KEY `Id_Usuario` (`Id_Usuario`),
  CONSTRAINT `tbl_reinicio_contrasena_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_reinicio_contrasena VALUES("35","81","carlos@gmail.com","","0000-00-00","","0000-00-00","","0000-00-00");
INSERT INTO tbl_reinicio_contrasena VALUES("36","82","christian@gmail.com","","0000-00-00","","0000-00-00","","0000-00-00");



DROP TABLE IF EXISTS tbl_rol;

CREATE TABLE `tbl_rol` (
  `Id_Rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion_Rol` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado_rol` int(11) NOT NULL,
  `Creado_Por` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_creacion` date NOT NULL,
  `Modificado_Por` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_rol VALUES("1","Administrador","Administrador","1","","2022-10-06","","0000-00-00");
INSERT INTO tbl_rol VALUES("2","Vista buena","Rol solo para ver","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_rol VALUES("3","editor de mentira","Rol para editar","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_rol VALUES("4","Default","Rol para usuarios default","1","","2022-11-01","","0000-00-00");



DROP TABLE IF EXISTS tbl_seguro;

CREATE TABLE `tbl_seguro` (
  `Id_Seguro` bigint(20) NOT NULL,
  `Id_Tipos_Seguros` bigint(20) NOT NULL,
  `Cobertura` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Precio` decimal(2,0) NOT NULL,
  `Detalles_del_Seguro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  KEY `idx_Id_Seguro` (`Id_Seguro`) USING BTREE,
  KEY `Id_Tipos_Seguros` (`Id_Tipos_Seguros`),
  CONSTRAINT `tbl_seguro_ibfk_1` FOREIGN KEY (`Id_Tipos_Seguros`) REFERENCES `tbl_tipo_seguro` (`Id_Tipos_Seguros`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_seguro VALUES("1","2","Daños ","5","Solo daños menores del paquete");



DROP TABLE IF EXISTS tbl_sesiones;

CREATE TABLE `tbl_sesiones` (
  `Id_Sesion` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` bigint(20) NOT NULL,
  `Ip_address` decimal(10,0) NOT NULL,
  `Ultima_Sesion` date NOT NULL,
  PRIMARY KEY (`Id_Sesion`),
  KEY `Id_Usuario` (`Id_Usuario`),
  CONSTRAINT `tbl_sesiones_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;




DROP TABLE IF EXISTS tbl_tipo_envio;

CREATE TABLE `tbl_tipo_envio` (
  `Cod_Tipo_Envio` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(25) NOT NULL,
  PRIMARY KEY (`Cod_Tipo_Envio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_tipo_envio VALUES("1","Avion");
INSERT INTO tbl_tipo_envio VALUES("2","Barco");



DROP TABLE IF EXISTS tbl_tipo_seguro;

CREATE TABLE `tbl_tipo_seguro` (
  `Id_Tipos_Seguros` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripción` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Id_Tipos_Seguros`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_tipo_seguro VALUES("1","Delicado");
INSERT INTO tbl_tipo_seguro VALUES("2","Especial");



DROP TABLE IF EXISTS tbl_usuarios;

CREATE TABLE `tbl_usuarios` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `Id_Rol` bigint(20) NOT NULL,
  `id_estado_usuario` bigint(20) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Contrasena` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Primer_Ingreso` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Num_Identidad` int(11) NOT NULL,
  `Correo_Electronico` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Ult_Conexion` date NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Preguntas_Contestadas` int(11) NOT NULL,
  `intentos_acceso` int(11) NOT NULL,
  `Procedencia` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `Id_Rol` (`Id_Rol`),
  KEY `id_estado_usuario` (`id_estado_usuario`),
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_rol` (`Id_Rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_usuarios_ibfk_2` FOREIGN KEY (`id_estado_usuario`) REFERENCES `tbl_estados_usuarios` (`id_estado_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_usuarios VALUES("2","1","1","ADMIN","559bd545c87f2f68cb5a5662418a7ef98668fc80ca6cca0ed549ac41fdd978de","0","89854879","UNAH C2","0","transportexpress504@gmail.com","0000-00-00","2024-10-31","0","1","0");
INSERT INTO tbl_usuarios VALUES("25","1","1","MERLIN","89bd4b82c7930642eb790931df9b88872730d39db6755ad74b4c31f3fcf8b8a9","0","99242668","PRINCIPAL","0","ofy_1801@hotmail.com","0000-00-00","2024-11-15","0","0","0");
INSERT INTO tbl_usuarios VALUES("81","1","1","CARLOS","42f621edc2a78dadd06679044d6ba51d1a328f1ae2bd7f52424c49ecb5cbee98","0","94926989","LOARQUE","0","carlos@gmail.com","0000-00-00","2024-11-11","0","0","0");
INSERT INTO tbl_usuarios VALUES("82","2","1","CHRISTIAN","c8ff9f4ffde144e90ac5e131ce119a619ee582ef41e6ac07523cf7dfcd55f2d0","0","94926989","UNAH","0","christian@gmail.com","0000-00-00","2025-02-11","0","0","0");



SET FOREIGN_KEY_CHECKS=1;