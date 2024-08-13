<?php 
	class PerfilesModel extends Mysql
	{
        private $intIdUsuario;
        private $strPassword;
        private $strCreatedBy;
    
		public function __construct()
		{
			parent::__construct();
		}

        public function obtenerusuarioP()
        {
            $sql = "SELECT * FROM tbl_usuarios";
            $request = $this->select_all($sql);
            return $request;
        }

    // Método para actualizar el perfil del usuario
    public function updateProfile($id_usuario, $nombre, $direccion, $telefono, $correo)
    {
        $sql = "UPDATE tbl_usuarios SET 
                Nombre = ?, 
                Direccion = ?, 
                Telefono = ?, 
                Correo_Electronico = ? 
                WHERE id_Usuario = ?";
        $arrData = array($nombre, $direccion, $telefono, $correo, $id_usuario);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function changePassword($idUsuario, $hashedPassword) {
        $this->intIdUsuario = $idUsuario;
        $this->strPassword = $hashedPassword;
        
        try {
            // Obtener la conexión directamente
            $conexion = (new Conexion())->conect();
    
            // Iniciar una transacción
            $conexion->beginTransaction();
    
            // Insertar en tbl_reinicio_contrasena
            $sql = "INSERT INTO tbl_reinicio_contrasena (id_usuario, Correo, Token, Fecha_Vencimiento, Creado_Por, Fecha_Creacion, Modificado_Por, Fecha_Modificado) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $arrData = array($this->intIdUsuario, '', '', date('Y-m-d H:i:s'), '', date('Y-m-d H:i:s'), '', date('Y-m-d H:i:s'));
            error_log("Insertar en tbl_reinicio_contrasena: " . json_encode($arrData));
            $this->executeQuery($sql, $arrData);
    
            // Insertar en tbl_historico_contrasena
            $sql = "INSERT INTO tbl_historico_contrasena (id_usuario, Contrasena, Creado_Por, Fecha_creacion, Modificado_Por, Fecha_Modificado) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $arrData = array($this->intIdUsuario, $this->strPassword, '', date('Y-m-d H:i:s'), '', date('Y-m-d H:i:s'));
            error_log("Insertar en tbl_historico_contrasena: " . json_encode($arrData));
            $this->executeQuery($sql, $arrData);
    
            // Actualizar tbl_usuarios
            $sql = "UPDATE tbl_usuarios SET Contrasena = ? WHERE id_usuario = ?";
            $arrData = array($this->strPassword, $this->intIdUsuario);
            error_log("Actualizar en tbl_usuarios: " . json_encode($arrData));
            $this->executeQuery($sql, $arrData);
    
            // Confirmar la transacción
            $conexion->commit();
            return true;
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $conexion->rollBack();
            error_log("Error en la transacción: " . $e->getMessage());
            return false;
        }
    }
    

    public function changePasswords($idUsuario, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT); // Encriptar la nueva contraseña
        $sql = "UPDATE tbl_usuarios SET Contrasena = ? WHERE id_usuario = ?";
        $arrData = array($hashedPassword, $idUsuario);
        return $this->executeQuery($sql, $arrData);
    }
    
    
}
?>


    