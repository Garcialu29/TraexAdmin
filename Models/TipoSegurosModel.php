<?php
class TipoSegurosModel extends Mysql
{
    private $strFecha;

    public function __construct()
    {
        parent::__construct();
    }

    public function insertTipoSeguro(string $descripcion, float $precio)
    {
        $query_insert = "INSERT INTO tbl_tipo_seguro(Descripción, precio) VALUES(?, ?)";
        $arrData = array($descripcion, $precio);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function updateTipoSeguro(int $Id_Tipos_Seguros, string $descripcion, float $precio)
    {
        $query_update = "UPDATE tbl_tipo_seguro SET Descripción = ?, precio = ? WHERE Id_Tipos_Seguros = ?";
        $arrData = array($descripcion, $precio, $Id_Tipos_Seguros);
        $request_update = $this->update($query_update, $arrData);
        return $request_update;
    }

    public function deleteTipoSeguro(int $Id_Tipos_Seguros)
    {
        $query_delete = "DELETE FROM tbl_tipo_seguro WHERE Id_Tipos_Seguros = $Id_Tipos_Seguros";
        $arrData = array($Id_Tipos_Seguros);
        $request_delete = $this->delete($query_delete, $arrData);
        return $request_delete;
    }

    public function selectTipoSeguro(int $Id_Tipos_Seguros) {
        $sql = "SELECT * FROM tbl_tipo_seguro WHERE Id_Tipos_Seguros = $Id_Tipos_Seguros";
        $request = $this->select($sql);
        return $request;
    }
    

    public function selectTiposSeguros()
    {
        $sql = "SELECT * FROM tbl_tipo_seguro";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectTiposSegurosR($contenido)
    {
        $sql = "SELECT * FROM tbl_tipo_seguro
                WHERE Id_Tipos_Seguros LIKE '%$contenido%' OR
                    Descripción LIKE '%$contenido%' OR
                    precio LIKE '%$contenido%'";
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
