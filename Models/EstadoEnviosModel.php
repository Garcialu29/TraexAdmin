<?php

class EstadoEnviosModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectEstadosEnvios()
{
    $sql = "SELECT * FROM tbl_estado_envio";
    $request = $this->select_all($sql);
    return $request;
}

public function selectEstadoEnvio(int $Id_Estado_Envio)
{
    $sql = "SELECT * FROM tbl_estado_envio WHERE Id_Estado_Envio = $Id_Estado_Envio";
    $request = $this->select($sql);
    return $request;
}


    public function insertEstadoEnvio(string $descripcion)
    {
        $query_insert = "INSERT INTO tbl_estado_envio(Descripcion) VALUES(?)";
        $arrData = array($descripcion);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function updateEstadoEnvio(int $Id_Estado_Envio, string $descripcion)
    {
        $sql = "UPDATE tbl_estado_envio SET Descripcion = ? WHERE Id_Estado_Envio = $Id_Estado_Envio";
        $arrData = array($descripcion);
        $request = $this->update($sql, $arrData);
        return $request;
    }


    public function deleteEstadoEnvio(int $id_estado_envio)
    {
        $query_delete = "DELETE FROM tbl_estado_envio WHERE Id_Estado_Envio = $id_estado_envio";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }

    public function selectEstadosEnviosR($contenido)
    {
        $sql = "SELECT * FROM tbl_estado_envio
                WHERE Id_Estado_Envio LIKE '%$contenido%' OR
                    Descripcion LIKE '%$contenido%'";
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

