<?php 
	
	define("BASE_URL", "http:/T/TraexAdmin");
	//const BASE_URL = "http://transportexpresshn.mysql.database.azure.com";

	//Zona horaria
	date_default_timezone_set('America/Tegucigalpa');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "traex_db";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "charset=utf8";
	
	

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	
	//Simbolo de moneda
	const SMONEY = "Lps";
	const NOMBRE_EMPESA = "TRAEX";
	const EMAIL_EMPRESA = "empresa.transportexpress504@gmail.com";
	const STATUS = array('Completado','Pendiente','Cancelado',);
   

	//modulos
	CONST MOBJETOS =1;
	CONST MROLES =2;
	const MPARAMETROS = 3;
	CONST MUSUARIOS =  4;
	CONST MCLIENTES = 5;
	CONST MPAQUETES =6;
	CONST MRASTREO = 7;
	CONST MBACKUP = 8;
	CONST MRESTORE = 9;
	CONST MENVIO = 10;
	CONST MPAGO = 11;
	CONST MSEGURO = 12;
	CONST MESTADO = 13;


	
 //Datos envio de correo electronico
	const NOMBRE_REMITENTE = "TRAEX";
	const DIRECCION ="";
	const TELEMPRESA ="99324144";
	const EMAIL_REMITENTE = "no-replay@transportexpress504.com";
	const NOMBRE_EMPRESA = "Transport Express";
	const WEB_EMPRESA = "www.transportexpress.com";

 ?>