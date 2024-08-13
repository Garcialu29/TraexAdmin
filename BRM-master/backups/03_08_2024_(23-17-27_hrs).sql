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
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`Id_Bitacora`),
  KEY `Id_Usuario` (`Id_Usuario`),
  KEY `Id_Objeto` (`Id_Objeto`),
  CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`Id_Usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_bitacora_ibfk_2` FOREIGN KEY (`Id_Objeto`) REFERENCES `tbl_objetos` (`Id_Objeto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_bitacora VALUES("1","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("2","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("3","1","2","Acceso a la vista Roles","El usuario accedió a la vista de roles","2024-08-03 18:27:01");
INSERT INTO tbl_bitacora VALUES("4","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:27:03");
INSERT INTO tbl_bitacora VALUES("5","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:30:06");
INSERT INTO tbl_bitacora VALUES("6","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:30:11");
INSERT INTO tbl_bitacora VALUES("7","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:31:52");
INSERT INTO tbl_bitacora VALUES("8","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:31:59");
INSERT INTO tbl_bitacora VALUES("9","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("10","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 18:32:49");
INSERT INTO tbl_bitacora VALUES("11","1","6","Acceso a la vista Paquetes","El usuario accedió a la vista de Paquetes","2024-08-03 18:40:07");
INSERT INTO tbl_bitacora VALUES("12","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:41:36");
INSERT INTO tbl_bitacora VALUES("13","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:45:46");
INSERT INTO tbl_bitacora VALUES("14","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:48:51");
INSERT INTO tbl_bitacora VALUES("15","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:51:20");
INSERT INTO tbl_bitacora VALUES("16","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:53:16");
INSERT INTO tbl_bitacora VALUES("17","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 18:56:05");
INSERT INTO tbl_bitacora VALUES("18","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:08:32");
INSERT INTO tbl_bitacora VALUES("19","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:09:29");
INSERT INTO tbl_bitacora VALUES("20","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:09:51");
INSERT INTO tbl_bitacora VALUES("21","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:10:14");
INSERT INTO tbl_bitacora VALUES("22","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:10:26");
INSERT INTO tbl_bitacora VALUES("23","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:10:48");
INSERT INTO tbl_bitacora VALUES("24","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:11:07");
INSERT INTO tbl_bitacora VALUES("25","1","6","Generó reporte","Generó un reporte de paquetes en formato PDF","2024-08-03 19:11:48");
INSERT INTO tbl_bitacora VALUES("26","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 19:12:08");
INSERT INTO tbl_bitacora VALUES("27","1","1","Generación de reporte PDF","El usuario MERLIN generó un reporte PDF de objetos.","2024-08-03 19:12:10");
INSERT INTO tbl_bitacora VALUES("28","1","5","Acceso a la vista de Parmetros","El usuario accedió a la vista de parametros del sistema","2024-08-03 19:12:23");
INSERT INTO tbl_bitacora VALUES("29","1","3","Generó reporte","Generó un reporte de parámetros en formato PDF","2024-08-03 19:12:26");
INSERT INTO tbl_bitacora VALUES("30","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 19:12:36");
INSERT INTO tbl_bitacora VALUES("31","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 19:14:40");
INSERT INTO tbl_bitacora VALUES("32","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 19:17:19");
INSERT INTO tbl_bitacora VALUES("33","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 19:17:22");
INSERT INTO tbl_bitacora VALUES("34","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 19:19:52");
INSERT INTO tbl_bitacora VALUES("35","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 19:20:17");
INSERT INTO tbl_bitacora VALUES("36","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 19:29:34");
INSERT INTO tbl_bitacora VALUES("37","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 19:37:18");
INSERT INTO tbl_bitacora VALUES("38","1","6","Acceso a la vista Paquetes","El usuario accedió a la vista de Paquetes","2024-08-03 20:03:31");
INSERT INTO tbl_bitacora VALUES("39","1","10","Acceso a la vista Tipo de envios","El usuario accedió a la vista de tipos de envios para paquetes","2024-08-03 20:06:33");
INSERT INTO tbl_bitacora VALUES("40","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:06:37");
INSERT INTO tbl_bitacora VALUES("41","1","10","Acceso a la vista Tipo de envios","El usuario accedió a la vista de tipos de envios para paquetes","2024-08-03 20:12:14");
INSERT INTO tbl_bitacora VALUES("42","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 20:12:30");
INSERT INTO tbl_bitacora VALUES("43","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:14:17");
INSERT INTO tbl_bitacora VALUES("44","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 20:19:27");
INSERT INTO tbl_bitacora VALUES("45","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:21:28");
INSERT INTO tbl_bitacora VALUES("46","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:22:44");
INSERT INTO tbl_bitacora VALUES("47","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:22:59");
INSERT INTO tbl_bitacora VALUES("48","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:23:12");
INSERT INTO tbl_bitacora VALUES("49","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:23:29");
INSERT INTO tbl_bitacora VALUES("50","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:23:58");
INSERT INTO tbl_bitacora VALUES("51","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:24:10");
INSERT INTO tbl_bitacora VALUES("52","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:24:19");
INSERT INTO tbl_bitacora VALUES("53","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:24:49");
INSERT INTO tbl_bitacora VALUES("54","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:25:25");
INSERT INTO tbl_bitacora VALUES("55","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:27:34");
INSERT INTO tbl_bitacora VALUES("56","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:28:05");
INSERT INTO tbl_bitacora VALUES("57","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:28:16");
INSERT INTO tbl_bitacora VALUES("58","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:28:31");
INSERT INTO tbl_bitacora VALUES("59","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:28:42");
INSERT INTO tbl_bitacora VALUES("60","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:28:53");
INSERT INTO tbl_bitacora VALUES("61","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:29:26");
INSERT INTO tbl_bitacora VALUES("62","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:29:52");
INSERT INTO tbl_bitacora VALUES("63","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:30:13");
INSERT INTO tbl_bitacora VALUES("64","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:30:44");
INSERT INTO tbl_bitacora VALUES("65","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:30:57");
INSERT INTO tbl_bitacora VALUES("66","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:31:11");
INSERT INTO tbl_bitacora VALUES("67","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:31:29");
INSERT INTO tbl_bitacora VALUES("68","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:31:39");
INSERT INTO tbl_bitacora VALUES("69","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:32:08");
INSERT INTO tbl_bitacora VALUES("70","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:32:20");
INSERT INTO tbl_bitacora VALUES("71","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:36:15");
INSERT INTO tbl_bitacora VALUES("72","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 20:43:28");
INSERT INTO tbl_bitacora VALUES("73","1","2","Acceso a la vista Roles","El usuario accedió a la vista de roles","2024-08-03 20:43:40");
INSERT INTO tbl_bitacora VALUES("74","1","2","Generación de reporte","Se generó un reporte de roles en formato PDF.","2024-08-03 20:43:42");
INSERT INTO tbl_bitacora VALUES("75","1","2","Generación de reporte","Se generó un reporte de roles en formato PDF.","2024-08-03 20:44:16");
INSERT INTO tbl_bitacora VALUES("76","1","2","Generación de reporte","Se generó un reporte de roles en formato PDF.","2024-08-03 20:44:28");
INSERT INTO tbl_bitacora VALUES("77","1","2","Generación de reporte","Se generó un reporte de roles en formato PDF.","2024-08-03 20:44:42");
INSERT INTO tbl_bitacora VALUES("78","1","1","Acceso a la vista de Objetos","El usuario accedió a la vista de objetos del sistema","2024-08-03 20:44:50");
INSERT INTO tbl_bitacora VALUES("79","1","1","Generación de reporte PDF","El usuario MERLIN generó un reporte PDF de objetos.","2024-08-03 20:44:52");
INSERT INTO tbl_bitacora VALUES("80","1","5","Acceso a la vista de Parmetros","El usuario accedió a la vista de parametros del sistema","2024-08-03 20:45:03");
INSERT INTO tbl_bitacora VALUES("81","1","3","Generó reporte","Generó un reporte de parámetros en formato PDF","2024-08-03 20:45:06");
INSERT INTO tbl_bitacora VALUES("82","1","11","Acceso a la vista Tipo de pago","El usuario accedió a la vista de tipos de pagos de paquetes","2024-08-03 20:46:03");
INSERT INTO tbl_bitacora VALUES("83","1","12","Acceso a la vista Tipo Seguros","El usuario accedió a la vista de tipos de seguros","2024-08-03 20:46:07");
INSERT INTO tbl_bitacora VALUES("84","1","12","Generó reporte","Generó un reporte de tipos de seguro en formato PDF","2024-08-03 20:46:09");
INSERT INTO tbl_bitacora VALUES("85","1","10","Acceso a la vista Tipo de envios","El usuario accedió a la vista de tipos de envios para paquetes","2024-08-03 20:46:18");
INSERT INTO tbl_bitacora VALUES("86","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:46:21");
INSERT INTO tbl_bitacora VALUES("87","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:46:54");
INSERT INTO tbl_bitacora VALUES("88","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:47:06");
INSERT INTO tbl_bitacora VALUES("89","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:47:15");
INSERT INTO tbl_bitacora VALUES("90","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:47:24");
INSERT INTO tbl_bitacora VALUES("91","1","10","Generó reporte","Generó un reporte de tipo en envios en formato PDF","2024-08-03 20:47:35");
INSERT INTO tbl_bitacora VALUES("92","1","6","Acceso a la vista Paquetes","El usuario accedió a la vista de Paquetes","2024-08-03 21:01:48");
INSERT INTO tbl_bitacora VALUES("93","1","6","Acceso a la vista Paquetes","El usuario accedió a la vista de Paquetes","2024-08-03 21:03:30");
INSERT INTO tbl_bitacora VALUES("94","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 21:03:36");
INSERT INTO tbl_bitacora VALUES("95","1","8","Acceso a la Backup","El usuario accedió a la vista de Backup","2024-08-03 21:47:52");
INSERT INTO tbl_bitacora VALUES("96","1","8","Acceso a la Backup","El usuario accedió a la vista de Backup","2024-08-03 21:50:20");
INSERT INTO tbl_bitacora VALUES("97","1","8","Acceso a la Restore","El usuario accedió a la vista de restauracion de datos","2024-08-03 21:50:23");
INSERT INTO tbl_bitacora VALUES("98","1","9","Acceso a la Restore","El usuario accedió a la vista de restauracion de datos","2024-08-03 21:51:12");
INSERT INTO tbl_bitacora VALUES("99","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("100","1","2","Acceso a la vista Roles","El usuario accedió a la vista de roles","2024-08-03 21:54:42");
INSERT INTO tbl_bitacora VALUES("101","1","9","Acceso a la Restore","El usuario accedió a la vista de restauracion de datos","2024-08-03 21:54:44");
INSERT INTO tbl_bitacora VALUES("102","1","9","Acceso a la Restore","El usuario accedió a la vista de restauracion de datos","2024-08-03 22:12:17");
INSERT INTO tbl_bitacora VALUES("103","1","10","Acceso a la vista Tipo de envios","El usuario accedió a la vista de tipos de envios para paquetes","2024-08-03 22:12:21");
INSERT INTO tbl_bitacora VALUES("104","1","10","Eliminar tipo de envío","Se eliminó el tipo de envío con ID 7","2024-08-03 22:14:37");
INSERT INTO tbl_bitacora VALUES("105","1","11","Acceso a la vista Tipo de pago","El usuario accedió a la vista de tipos de pagos de paquetes","2024-08-03 22:14:58");
INSERT INTO tbl_bitacora VALUES("106","1","11","Eliminar tipo de pago","Se eliminó el tipo de pago con ID 6","2024-08-03 22:16:25");
INSERT INTO tbl_bitacora VALUES("107","1","12","Acceso a la vista Tipo Seguros","El usuario accedió a la vista de tipos de seguros","2024-08-03 22:16:54");
INSERT INTO tbl_bitacora VALUES("108","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:18:09");
INSERT INTO tbl_bitacora VALUES("109","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:23:46");
INSERT INTO tbl_bitacora VALUES("110","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("111","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:24:12");
INSERT INTO tbl_bitacora VALUES("112","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:24:18");
INSERT INTO tbl_bitacora VALUES("113","1","12","Acceso a la vista Tipo Seguros","El usuario accedió a la vista de tipos de seguros","2024-08-03 22:24:20");
INSERT INTO tbl_bitacora VALUES("114","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:24:53");
INSERT INTO tbl_bitacora VALUES("115","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:25:10");
INSERT INTO tbl_bitacora VALUES("116","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:22");
INSERT INTO tbl_bitacora VALUES("117","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:23");
INSERT INTO tbl_bitacora VALUES("118","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:25");
INSERT INTO tbl_bitacora VALUES("119","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:27");
INSERT INTO tbl_bitacora VALUES("120","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:27");
INSERT INTO tbl_bitacora VALUES("121","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:27");
INSERT INTO tbl_bitacora VALUES("122","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:27");
INSERT INTO tbl_bitacora VALUES("123","1","13","Agregar estado de envío","Se agregó el nuevo estado de envío ENTREGADO","2024-08-03 22:25:35");
INSERT INTO tbl_bitacora VALUES("124","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:25:37");
INSERT INTO tbl_bitacora VALUES("125","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 9","2024-08-03 22:25:48");
INSERT INTO tbl_bitacora VALUES("126","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 11","2024-08-03 22:25:52");
INSERT INTO tbl_bitacora VALUES("127","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:25:54");
INSERT INTO tbl_bitacora VALUES("128","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 12","2024-08-03 22:25:57");
INSERT INTO tbl_bitacora VALUES("129","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 13","2024-08-03 22:26:01");
INSERT INTO tbl_bitacora VALUES("130","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:26:03");
INSERT INTO tbl_bitacora VALUES("131","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 10","2024-08-03 22:26:08");
INSERT INTO tbl_bitacora VALUES("132","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 14","2024-08-03 22:26:14");
INSERT INTO tbl_bitacora VALUES("133","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 15","2024-08-03 22:26:18");
INSERT INTO tbl_bitacora VALUES("134","1","13","Eliminar estado de envío","Se eliminó el estado de envío con ID 8","2024-08-03 22:26:22");
INSERT INTO tbl_bitacora VALUES("135","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:26:26");
INSERT INTO tbl_bitacora VALUES("136","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:27:18");
INSERT INTO tbl_bitacora VALUES("137","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:29:02");
INSERT INTO tbl_bitacora VALUES("138","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:29:21");
INSERT INTO tbl_bitacora VALUES("139","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:30:55");
INSERT INTO tbl_bitacora VALUES("140","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:34:38");
INSERT INTO tbl_bitacora VALUES("141","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:34:54");
INSERT INTO tbl_bitacora VALUES("142","1","13","Acceso a la vista Estaid de envios","El usuario accedió a la vista de estados de envio de paquetes","2024-08-03 22:35:06");
INSERT INTO tbl_bitacora VALUES("143","1","13","Generó reporte","Generó un reporte de estados de envío en formato PDF","2024-08-03 22:50:41");
INSERT INTO tbl_bitacora VALUES("144","1","8","Acceso a la Backup","El usuario accedió a la vista de Backup","2024-08-03 22:52:35");
INSERT INTO tbl_bitacora VALUES("145","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("146","1","8","Acceso a la Backup","El usuario accedió a la vista de Backup","2024-08-03 23:09:08");
INSERT INTO tbl_bitacora VALUES("147","1","1","Acceso al sistema","Accedio correctamente al sistema","2024-08-03 00:00:00");
INSERT INTO tbl_bitacora VALUES("148","1","8","Acceso a la Backup","El usuario accedió a la vista de Backup","2024-08-03 23:17:17");



DROP TABLE IF EXISTS tbl_casillero;

CREATE TABLE `tbl_casillero` (
  `Id_Casillero` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) DEFAULT NULL,
  `Numero_Casillero` varchar(11) NOT NULL,
  PRIMARY KEY (`Id_Casillero`),
  KEY `tbl_cliente` (`id_cliente`),
  CONSTRAINT `fk_casillero_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_casillero VALUES("15","7","C-00007");
INSERT INTO tbl_casillero VALUES("17","9","C-00009");
INSERT INTO tbl_casillero VALUES("20","33","C-00033");
INSERT INTO tbl_casillero VALUES("21","34","C-00034");
INSERT INTO tbl_casillero VALUES("22","35","C-00035");
INSERT INTO tbl_casillero VALUES("23","36","C-00036");
INSERT INTO tbl_casillero VALUES("24","37","C-00037");
INSERT INTO tbl_casillero VALUES("25","38","C-00038");
INSERT INTO tbl_casillero VALUES("26","39","C-00039");



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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_cliente VALUES("7","Lucia","Garcia","garciae0821@gmail.com","123525","Tegus","14785551","2024-04-05 00:00:00","$2a$10$Bpx2g6Tp7Or8/VNj6V6dR.GA7lX.tzU4EZLlajlTcvQYoTgstm4Bq");
INSERT INTO tbl_cliente VALUES("9","Lucrecia","Nuñez","merlinmatta18@gmail.com","84829822","Honduras","2158199900018","2024-04-05 00:00:00","$2a$10$xO6vG4E35haUb13hKldF2eXWODojxNUugsTm1PpQUffY7TXLhmovy");
INSERT INTO tbl_cliente VALUES("33","Neylin","Brahona","ofy_1801@hotmail.com","5481882","La honduras","547484215","2024-04-29 00:00:00","$2a$10$PZ8h4ER2yctcgeQKxEx1GeRyTKZzCKIXkpsBUzMd82If4tpk0Pvoy");
INSERT INTO tbl_cliente VALUES("34","ANA","Hgjgjhg","merlin18@hotmail.com","45758","Guhjj","244885","2024-04-29 00:00:00","$2a$10$eh4lH30Uy.G2HYOACPK5Qua80RsHD6QknzKZCKXicWhdSAjJ0Vr3q");
INSERT INTO tbl_cliente VALUES("35","prueba 3","jhgghgh","JGHB@gmail.com","6555","nnnyunyu","4587","2024-04-29 00:00:00","$2a$10$UwY/Coq6q9smCVpRHRXU4uMM06vbdnIqeDFsTNFjl7T2bMmM6mq9C");
INSERT INTO tbl_cliente VALUES("36","Isaias","Irias","hsdvwg@hotmail.com","554485","sljvcslfjv","222585","2024-04-29 00:00:00","$2a$10$81rHUOrNCztqQsLx3CzctuKChL7f25ETXE3c4I0hVERNQQgAgK.eq");
INSERT INTO tbl_cliente VALUES("37","hbvdcfvbgnhj","kjhgf","mngffgf@hotmail.con","01454","oiuythj","568","2024-04-29 00:00:00","$2a$10$qiNTO4wE29DwoFZ7uR56Ee/oQh6nwG94MvgWVDX8kQmZLObAd1k.u");
INSERT INTO tbl_cliente VALUES("38","Smf","Snvfsv Sf","sfhbvs@hotmail.com","2225478","Sfvs","54422","2024-04-29 00:00:00","$2a$10$zd2GselibGlKkGLPiUxTHe2zQ4ao.hCH0rF3YXpRKXNv1fl4EcLJ.");
INSERT INTO tbl_cliente VALUES("39","Merlin","Nuñez","merlin@gmail.com","958623","ihgdnfuv","845546549","2024-07-13 00:00:00","$2a$10$UOYXBTHFNmuM6rqUKObH5eE5tOBUyGmLQ86gcDjDBA3OtXiy0O5ya");



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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_estado_envio VALUES("1","Proceso");
INSERT INTO tbl_estado_envio VALUES("2","Bodega");
INSERT INTO tbl_estado_envio VALUES("3","Aduana");
INSERT INTO tbl_estado_envio VALUES("4","Tegucigalpa");
INSERT INTO tbl_estado_envio VALUES("5","Entregado");



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
  `id_usuario` bigint(20) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Historico`),
  KEY `id_usuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `tbl_historico_contrasena_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_historico_contrasena VALUES("2","1","$2y$10$zL3CbO2dJNeYetyC3hJFierBJwg00NnyfGs36wlvWTu3RySzAV/Hy","MERLIN","2024-08-03","MERLIN","2024-08-03");
INSERT INTO tbl_historico_contrasena VALUES("3","1","89bd4b82c7930642eb790931df9b88872730d39db6755ad74b4c31f3fcf8b8a9","","0000-00-00","","0000-00-00");
INSERT INTO tbl_historico_contrasena VALUES("4","100","c80328a92a07ba9c9af0d71c22c96c40062602aeeb8caf814b7f0b34d228c959","","0000-00-00","","0000-00-00");
INSERT INTO tbl_historico_contrasena VALUES("5","100","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","","0000-00-00","","0000-00-00");



DROP TABLE IF EXISTS tbl_notificaciones;

CREATE TABLE `tbl_notificaciones` (
  `Id_notificaciones` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) DEFAULT NULL,
  `mensaje` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL,
  PRIMARY KEY (`Id_notificaciones`),
  KEY `fk_notificacion_cliente` (`id_cliente`),
  CONSTRAINT `tbl_notificaciones_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tbl_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_objetos VALUES("1","1","OBJETO","MODULO DE TIPOS DE ENVIOS DE PAQUETES","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("2","1","ROLES","SEGURIDAD ROLES","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("3","1","PARAMETRO","SEGURIDAD PARAMETRO","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("4","1","USUARIO","MANTENIMIENTO USUARIO","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("5","1","CLIENTE","MODULO CLIENTE","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("6","1","PAQUETES","MODULO PAQUETE","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("7","1","RASTREO","MODULO DE RASTREO","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("8","1","BACKUP","BACKUP BD","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("9","1","RESTORE","RESTORE BD","","MERLIN","2024-04-20","","0000-00-00");
INSERT INTO tbl_objetos VALUES("10","1","TIPOENVIO","MODULO DE TIPOS DE ENVIOS DE PAQUETES","","TRAEX","2024-06-22","","0000-00-00");
INSERT INTO tbl_objetos VALUES("11","1","TIPOPAGO","MODULO DE PAGO","","MERLIN","2024-07-27","","0000-00-00");
INSERT INTO tbl_objetos VALUES("12","1","TIPOSEGURO","SEGUROS DE PAQUETES","","MERLIN","2024-07-28","","0000-00-00");
INSERT INTO tbl_objetos VALUES("13","1","ESTADOENVIO","ESTADOS DE LOS PAQUETES","","MERLIN","2024-07-28","","0000-00-00");



DROP TABLE IF EXISTS tbl_paquete;

CREATE TABLE `tbl_paquete` (
  `Cod_Envio_Paquetes` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_Casillero` bigint(20) NOT NULL,
  `Cod_Tipo_Envio` bigint(20) NOT NULL,
  `Peso_paquete` decimal(10,2) NOT NULL,
  `Volumen_paquete` decimal(10,2) NOT NULL,
  `Numero_Traking` varchar(10) NOT NULL,
  `compra` int(100) NOT NULL,
  `id_Tipo_Seguro` bigint(20) DEFAULT NULL,
  `Id_Estado_Envio` bigint(20) NOT NULL,
  `Direccion_Envio` varchar(200) DEFAULT NULL,
  `Fecha_Entrega` date DEFAULT NULL,
  `Fecha_pedido` date DEFAULT NULL,
  `id_tipo_pago` bigint(11) NOT NULL,
  PRIMARY KEY (`Cod_Envio_Paquetes`),
  KEY `tbl_casillero` (`id_Casillero`),
  KEY `Cod_Tipo_Envio` (`Cod_Tipo_Envio`),
  KEY `fk_paquete_seguro` (`id_Tipo_Seguro`),
  KEY `fk_paquete_estado_envio` (`Id_Estado_Envio`),
  KEY `id_Tipo_Seguro` (`id_Tipo_Seguro`),
  KEY `fk_paquete_tipo_pago` (`id_tipo_pago`),
  CONSTRAINT `fk_paquete_estado_envio` FOREIGN KEY (`Id_Estado_Envio`) REFERENCES `tbl_estado_envio` (`Id_Estado_Envio`),
  CONSTRAINT `fk_paquete_tipo_pago` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tbl_tipo_pago` (`id_tipo_pago`),
  CONSTRAINT `tbl_paquete_ibfk_1` FOREIGN KEY (`id_Casillero`) REFERENCES `tbl_casillero` (`Id_Casillero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_paquete_ibfk_3` FOREIGN KEY (`Cod_Tipo_Envio`) REFERENCES `tbl_tipo_envio` (`Cod_Tipo_Envio`),
  CONSTRAINT `tbl_paquete_ibfk_4` FOREIGN KEY (`id_Tipo_Seguro`) REFERENCES `tbl_tipo_seguro` (`Id_Tipos_Seguros`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_paquete VALUES("23","17","2","35.00","8.00","1246","0","1","5","Unah","2024-04-25","2024-04-18","2");
INSERT INTO tbl_paquete VALUES("24","15","1","6.00","10.00","2158","12","3","5","Prados","2024-03-27","2024-03-20","2");
INSERT INTO tbl_paquete VALUES("31","20","1","111.00","111.00","2020","10","1","1","","2024-07-06","2024-06-29","1");
INSERT INTO tbl_paquete VALUES("32","20","1","15.00","12.00","10101","150","1","1","","2024-07-06","2024-06-29","1");
INSERT INTO tbl_paquete VALUES("36","20","1","2.00","2.00","2","0","1","1","undefined","2024-07-10","2024-07-06","1");
INSERT INTO tbl_paquete VALUES("38","23","1","33.00","33.00","87451","0","1","1","sljvcslfjv","2024-07-18","2024-07-06","2");
INSERT INTO tbl_paquete VALUES("39","22","1","255.00","874.00","845214","0","1","1","nnnyunyu","2024-07-19","2024-07-06","2");
INSERT INTO tbl_paquete VALUES("40","17","1","45.00","12.00","878","25","1","1","Honduras","2024-07-19","2024-07-06","1");
INSERT INTO tbl_paquete VALUES("41","23","1","74.00","96.00","8875M ","25","1","4","sljvcslfjv","2024-07-17","0000-00-00","1");
INSERT INTO tbl_paquete VALUES("42","20","1","74.00","8.00","4","55","1","1","La honduras","2024-07-08","2024-07-06","1");
INSERT INTO tbl_paquete VALUES("43","20","2","12.00","41.00","5454","5","2","1","La honduras","2024-07-29","2024-07-11","1");
INSERT INTO tbl_paquete VALUES("45","21","1","84.00","4.00","785","0","1","4","Guhjj","2024-08-26","2024-08-03","1");
INSERT INTO tbl_paquete VALUES("46","17","1","22.00","33.00","115","11","1","4","Honduras","2024-08-26","2024-08-03","1");
INSERT INTO tbl_paquete VALUES("48","26","1","60.00","18.00","154AD","200","1","1","ihgdnfuv","2024-08-31","2024-08-03","1");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_parametros VALUES("1","NUM_INTENTOS","3","Numero de intentos de acceso al sistema","TRAEX","2023-10-15","MERLIN","2024-07-25");
INSERT INTO tbl_parametros VALUES("3","NUM_DIAS_VENCIMIENTO","365","Cantidad de dias de vencimiento de usuarios","TRAEX","2023-10-20","TRAEX","0000-00-00");
INSERT INTO tbl_parametros VALUES("4","DIAS_VENCIMIENTO_TOKEN","5","Numero de dias vencimiento de token de correo electronico","TRAEX","2023-10-20","TRAEX","0000-00-00");
INSERT INTO tbl_parametros VALUES("5","TIPO ENVIOS","88","SUPER ADMINISTRADOR","MERLIN","2024-07-11","MERLIN","2024-07-11");



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
) ENGINE=InnoDB AUTO_INCREMENT=2646 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO tbl_permisos VALUES("2351","2","1","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2352","2","2","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2353","2","3","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2354","2","4","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2355","2","5","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2356","2","6","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2357","2","7","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2358","2","8","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2359","2","9","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2387","3","1","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2388","3","2","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2389","3","3","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2390","3","4","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2391","3","5","1","0","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2392","3","6","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2393","3","7","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2394","3","8","1","1","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2395","3","9","1","1","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2396","1","1","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2397","1","2","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2398","1","3","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2399","1","4","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2400","1","5","1","0","0","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2401","1","6","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2402","1","7","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2403","1","8","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2404","1","9","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2405","1","10","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2556","4","1","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2557","4","2","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2558","4","3","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2559","4","4","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2560","4","5","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2561","4","6","1","1","1","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2562","4","7","1","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2563","4","8","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2564","4","9","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2565","4","10","1","1","1","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2601","7","1","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2602","7","2","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2603","7","3","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2604","7","4","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2605","7","5","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2606","7","6","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2607","7","7","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2608","7","8","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2609","7","9","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2610","7","10","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2626","1","11","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2627","2","11","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2628","3","11","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2629","4","11","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2630","7","11","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2631","1","12","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2632","2","12","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2633","3","12","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2634","4","12","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2635","7","12","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2641","1","13","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2642","2","13","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2643","3","13","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2644","4","13","0","0","0","0","","0000-00-00","","0000-00-00");
INSERT INTO tbl_permisos VALUES("2645","7","13","0","0","0","0","","0000-00-00","","0000-00-00");



DROP TABLE IF EXISTS tbl_reinicio_contrasena;

CREATE TABLE `tbl_reinicio_contrasena` (
  `Id_Reinicio_Contrasena` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(20) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Token` varchar(150) NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Creado_Por` varchar(50) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Modificado_Por` varchar(50) NOT NULL,
  `Fecha_Modificado` date NOT NULL,
  PRIMARY KEY (`Id_Reinicio_Contrasena`),
  KEY `id_usuario` (`id_usuario`) USING BTREE,
  CONSTRAINT `tbl_reinicio_contrasena_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_reinicio_contrasena VALUES("35","81","carlos@gmail.com","65c060a6327504d4a82e-4b25e90335ad795bb7bd-bd0d5a9d8c10e687581f-9bc9cf063b98fa9a9975","2024-03-10","","0000-00-00","","0000-00-00");
INSERT INTO tbl_reinicio_contrasena VALUES("37","1","ofy_1801@hotmail.com","","2024-08-08","","0000-00-00","","0000-00-00");
INSERT INTO tbl_reinicio_contrasena VALUES("38","100","merlinmatta18@gmail.com","","2024-08-08","","0000-00-00","","0000-00-00");
INSERT INTO tbl_reinicio_contrasena VALUES("39","101","ofy@gmail.com","","0000-00-00","","0000-00-00","","0000-00-00");
INSERT INTO tbl_reinicio_contrasena VALUES("40","1","ofy_1801@hotmail.com","","2024-08-08","MERLIN","2024-08-03","MERLIN","2024-08-03");



DROP TABLE IF EXISTS tbl_reset_tokens;

CREATE TABLE `tbl_reset_tokens` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `expiry_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tbl_reset_tokens VALUES("1","819247","2024-04-16 19:17:31");
INSERT INTO tbl_reset_tokens VALUES("2","245852","2024-04-16 19:18:22");
INSERT INTO tbl_reset_tokens VALUES("3","333941","2024-04-16 22:33:21");
INSERT INTO tbl_reset_tokens VALUES("4","383731","2024-04-17 00:56:57");
INSERT INTO tbl_reset_tokens VALUES("5","058749","2024-04-17 01:01:00");
INSERT INTO tbl_reset_tokens VALUES("6","150067","2024-04-17 01:06:10");
INSERT INTO tbl_reset_tokens VALUES("7","531577","2024-04-18 15:26:48");



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_rol VALUES("1","Administrador","Administrador con todos los permisos","1","","2022-10-06","","0000-00-00");
INSERT INTO tbl_rol VALUES("2","Vistor","Solo tiene permitido ver datos","2","","0000-00-00","","0000-00-00");
INSERT INTO tbl_rol VALUES("3","Admin general","Administrador con restricciones","1","","0000-00-00","","0000-00-00");
INSERT INTO tbl_rol VALUES("4","Socio","Para los socios o ayudantes del sistema","1","","2022-11-01","","0000-00-00");
INSERT INTO tbl_rol VALUES("7","Prueba","no se sdsgsg","1","","0000-00-00","","0000-00-00");



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
  `monto` int(100) DEFAULT NULL,
  PRIMARY KEY (`Cod_Tipo_Envio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_tipo_envio VALUES("1","Aereo","6");
INSERT INTO tbl_tipo_envio VALUES("2","Maritimo","3");



DROP TABLE IF EXISTS tbl_tipo_pago;

CREATE TABLE `tbl_tipo_pago` (
  `id_tipo_pago` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion_pago` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_tipo_pago VALUES("1","Pago a la recepción");
INSERT INTO tbl_tipo_pago VALUES("2","Pago por transferencia");



DROP TABLE IF EXISTS tbl_tipo_seguro;

CREATE TABLE `tbl_tipo_seguro` (
  `Id_Tipos_Seguros` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripción` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `precio` int(10) NOT NULL,
  PRIMARY KEY (`Id_Tipos_Seguros`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_tipo_seguro VALUES("1","Sin seguro","0");
INSERT INTO tbl_tipo_seguro VALUES("2","Delicado","10");
INSERT INTO tbl_tipo_seguro VALUES("3","Especial","15");



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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

INSERT INTO tbl_usuarios VALUES("1","1","1","MERLIN","89bd4b82c7930642eb790931df9b88872730d39db6755ad74b4c31f3fcf8b8a9","0","99242668","Hola","0","ofy_1801@hotmail.com","0000-00-00","2025-08-03","0","0","0");
INSERT INTO tbl_usuarios VALUES("2","1","3","ADMIN","559bd545c87f2f68cb5a5662418a7ef98668fc80ca6cca0ed549ac41fdd978de","0","98457716","UNAH C2","0","transportexpress504@gmail.com","0000-00-00","2024-10-31","0","0","0");
INSERT INTO tbl_usuarios VALUES("81","4","2","CARLOS","42f621edc2a78dadd06679044d6ba51d1a328f1ae2bd7f52424c49ecb5cbee98","0","94926945","LOARQUE","0","carlos@gmail.com","0000-00-00","2024-11-11","0","0","0");
INSERT INTO tbl_usuarios VALUES("100","1","1","PRUEBAFRKMF","a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3","0","87596321","UNAH","0","merlinmatta18@gmail.com","0000-00-00","2025-08-03","0","0","0");
INSERT INTO tbl_usuarios VALUES("101","2","2","NEYLIN","7ac8b96688c1b3050dd9863bb7319ad44211af7be30e8ad6e41e354bc904aee8","0","94926945","LOARQUE","0","ofy@gmail.com","0000-00-00","2025-07-18","0","0","0");



SET FOREIGN_KEY_CHECKS=1;