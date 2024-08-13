<?php

class TipoEnviosModel extends Mysql
{
    private $intCodTipoEnvio;
    private $strDescripcion;
    private $intMonto;
    private $strFecha;

    public function __construct()
    {
        parent::__construct();
    }  
 
    // Insert data into the table
    public function insertTipoEnvio(string $descripcion, int $monto)
    {
        $this->strDescripcion = $descripcion;
        $this->intMonto = $monto;

        $sql = "SELECT * FROM tbl_tipo_envio WHERE Descripcion = '$this->strDescripcion'";
        $request = $this->select_all($sql);

        if(empty($request)){
            $query_insert = "INSERT INTO tbl_tipo_envio (Descripcion, monto) VALUES (?,?)";
            $arrData = array($this->strDescripcion, $this->intMonto);
            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }
    public function selectTipoEnvio($Cod_Tipo_Envio) {
        $sql = "SELECT * FROM tbl_tipo_envio WHERE Cod_Tipo_Envio = $Cod_Tipo_Envio";
        $request = $this->select($sql);
        return $request;
    }
    
    // Select all shipment types
    public function selectTiposEnvios()
    {
        $sql = "SELECT * FROM tbl_tipo_envio";
        $request = $this->select_all($sql);
        return $request;
    }

    // Select a single shipment type by ID
    public function selectTipoEnvioM(int $codTipoEnvio)
    {
        $this->intCodTipoEnvio = $codTipoEnvio;
        $sql = "SELECT * FROM tbl_tipo_envio WHERE Cod_Tipo_Envio = $this->intCodTipoEnvio";
        $request = $this->select($sql);
        return $request;
    }

    // Update shipment type data
    public function updateTipoEnvio(int $codTipoEnvio, string $descripcion, int $monto)
    {
        $this->intCodTipoEnvio = $codTipoEnvio;
        $this->strDescripcion = $descripcion;
        $this->intMonto = $monto;

        $sql = "SELECT * FROM tbl_tipo_envio WHERE (Descripcion = '{$this->strDescripcion}' AND Cod_Tipo_Envio != $this->intCodTipoEnvio)";
        $request = $this->select_all($sql);

        if(empty($request)){
            $sql = "UPDATE tbl_tipo_envio SET Descripcion = ?, monto = ? WHERE Cod_Tipo_Envio = $this->intCodTipoEnvio";
            $arrData = array($this->strDescripcion, $this->intMonto);
            $request = $this->update($sql, $arrData);

        } else {
            $request = "exist";
        }
        return $request;
    }

    // Delete a shipment type
    public function deleteTipoEnvio(int $Cod_Tipo_Envio)
{
    $sql = "DELETE FROM tbl_tipo_envio WHERE Cod_Tipo_Envio = ?";
    $arrData = array($Cod_Tipo_Envio);
    $request = $this->update($sql, $arrData);
    return $request;
}

public function selectTiposEnviosR($contenido)
{
    $sql = "SELECT * FROM tbl_tipo_envio
            WHERE Cod_Tipo_Envio LIKE '%$contenido%' OR
                  Descripcion LIKE '%$contenido%' OR
                  monto LIKE '%$contenido%'";
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
