<?php 
 
	class RolesModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		private $strFecha;

		public function __construct()
		{
			parent::__construct();
		}

		public function selectRoles()
		{
			//EXTRAE ROLES
			$sql = "SELECT * FROM tbl_rol WHERE estado_rol != 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectRol(int $idrol)
		{
			//BUSCAR ROLE
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM tbl_rol WHERE Id_Rol = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}
		public function selectObjetos()
		{
			
			$sql = "SELECT Id_Objeto FROM tbl_objetos ORDER BY Id_Objeto asc";
			$request = $this->select_all($sql);
			
			return $request;
		}
		public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d){
			$this->intRolid = $idrol;
			$this->intModuloid = $idmodulo;
			$this->r = $r;
			$this->w = $w;
			$this->u = $u;
			$this->d = $d;
			$query_insert  = "INSERT INTO tbl_permisos(Id_Rol,Id_Objeto,Permiso_Get,Permiso_Insert,Permiso_Update,Permiso_Delete) VALUES(?,?,?,?,?,?)";
        	$arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
        	$request_insert = $this->insert($query_insert,$arrData);		
	        return $request_insert;
		}

		public function insertRol(string $rol, string $descripcion, int $status){

			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM tbl_rol WHERE Nombre_Rol = '{$this->strRol}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tbl_rol(Nombre_Rol,Descripcion_Rol,estado_rol) VALUES(?,?,?)";
	        	$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			$return = 0;

			$sql = "SELECT * FROM tbl_rol WHERE Nombre_Rol = '$this->strRol' AND Id_Rol != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tbl_rol SET Nombre_Rol = ?, Descripcion_Rol = ?, estado_rol = ? WHERE Id_Rol = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
				$return = $request;
			}else{
				$request = "exist";
			}
		    return $return;			
		}

		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM tbl_usuarios WHERE Id_Rol = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE tbl_rol SET estado_rol = ? WHERE Id_Rol = $this->intIdrol ";
				$arrData = array(2);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}

		public function selectRolesR($contenido)
		{
			$sql = "SELECT * FROM tbl_rol
					WHERE Id_Rol LIKE '%$contenido%' OR
						Nombre_Rol LIKE '%$contenido%' OR
						Descripcion_Rol LIKE '%$contenido%' OR
						estado_rol LIKE '%$contenido%' OR
						Creado_Por LIKE '%$contenido%' OR
						Fecha_creacion LIKE '%$contenido%' OR
						Modificado_Por LIKE '%$contenido%' OR
						Fecha_Modificado LIKE '%$contenido%'";
			$request = $this->select_all($sql);

			return $request;
		}

		// Bitacora function to log actions
		public function bitacora(int $intIdUsuario, int $objeto, string $evento, string $descripcion, string $fecha)
		{
			$this->intIdUsuario = $intIdUsuario;
			$this->strEvento = $evento;
			$this->strObjeto = $objeto;
			$this->strDescripcion = $descripcion;
			$this->strFecha = $fecha;
	
			$sql = "INSERT INTO tbl_bitacora (Id_Usuario, Id_Objeto, Accion, Descripcion, Fecha) VALUES (?,?,?,?,?)";
			$arrData = array($this->intIdUsuario, $this->strObjeto, $this->strEvento, $this->strDescripcion, $this->strFecha);
			$request = $this->insert($sql, $arrData);
			return $request;
		}
	}
 ?>