<?php
class TipoPagosModel extends Mysql
{
    private $strFecha;

    public function __construct()
    {
        parent::__construct();
    }

    public function insertTipoPago(string $descripcion)
    {
        $query_insert = "INSERT INTO tbl_tipo_pago(Descripcion_pago) VALUES(?)";
        $arrData = array($descripcion);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function updateTipoPago(int $id_tipo_pago, string $descripcion)
    {
        $query_update = "UPDATE tbl_tipo_pago SET Descripcion_pago = ? WHERE id_tipo_pago = $id_tipo_pago";
        $arrData = array($descripcion);
        $request_update = $this->update($query_update, $arrData);
        return $request_update;
    }

    public function deleteTipoPago(int $id_tipo_pago)
    {
        $query_delete = "DELETE FROM tbl_tipo_pago WHERE id_tipo_pago = $id_tipo_pago";
        $arrData = array($id_tipo_pago);
        $request_delete = $this->delete($query_delete, $arrData);
        return $request_delete;
    }

    public function selectTipoPago(int $id_tipo_pago)
    {
        $sql = "SELECT * FROM tbl_tipo_pago WHERE id_tipo_pago = $id_tipo_pago";
        $request = $this->select($sql);
        return $request;
    }

    public function selectTiposPagos()
    {
        $sql = "SELECT * FROM tbl_tipo_pago";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectTiposPagosR($contenido)
    {
        $sql = "SELECT * FROM tbl_tipo_pago
                WHERE id_tipo_pago LIKE '%$contenido%' OR
                    Descripcion_pago LIKE '%$contenido%'";
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
