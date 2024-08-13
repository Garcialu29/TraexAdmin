<?php
require 'Libraries/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;


class Notificaciones extends Controllers
{


    public function __construct()
    {
        parent::__construct();
        session_start();

        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
            die();
        }
    }

    public function Notificaciones()
    {
        if (empty($_SESSION['permisosMod']['Permiso_Get'])) {
            header("Location:" . base_url() . '/inicio');
        }

        // Crear una instancia del modelo NotificacionesModel
        $notificacionesModel = new NotificacionesModel();

        // Llamar a la función del modelo para obtener las notificaciones
        $data['notificaciones'] = $notificacionesModel->obtenerNotificaciones(true);


        $data['page_tag'] = "Notificaciones";
        $data['page_title'] = "Notificaciones";
        $data['page_name'] = "Notificaciones";

        $data['page_functions_js'] = "functions_notificaciones.js";
        $this->views->getView($this, "notificaciones", $data);
    }

    
    
    }

?>