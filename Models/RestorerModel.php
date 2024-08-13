<?php
class RestorerModel extends Mysql
{
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