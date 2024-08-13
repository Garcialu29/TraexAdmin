<?php
class LogoutModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    // Método para registrar en la bitácora
    public function bitacora(int $intIdUsuario, int $objeto, string $evento, string $descripcion, string $fecha)
    {
        $sql = "INSERT INTO tbl_bitacora (Id_Usuario, Id_Objeto, Accion, Descripcion, Fecha) VALUES (?,?,?,?,?)";
        $arrData = array($intIdUsuario, $objeto, $evento, $descripcion, $fecha);
        $request = $this->insert($sql, $arrData);
        return $request;
    }
}
?>
