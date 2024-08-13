<?php

class NotificacionesModel extends Mysql
{
    // Propiedades de la clase
    private $id_notificaciones;
    private $cliente_id;
    private $mensaje;
    private $fecha_creacion;

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Método para obtener todas las notificaciones
    public function obtenerNotificaciones($soloRecientes = false)
{
    $sql = "SELECT * FROM tbl_notificaciones ORDER BY id_notificaciones DESC LIMIT 1";
    $request = $this->select_all($sql);
    return $request;
}
}
?>
