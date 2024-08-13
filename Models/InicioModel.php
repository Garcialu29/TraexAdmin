<?php 
	
class InicioModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getPaquetesPorMes()
    {
     $sql = "SELECT MONTH(Fecha_pedido) AS Mes, COUNT(*) AS TotalPaquetes
            FROM tbl_paquete
            GROUP BY MONTH(Fecha_pedido)";

     // Ejecutar la consulta SQL personalizada
     $stmt = $this->executeQuery($sql);

     // Obtener los resultados de la consulta
     $data = $this->getQueryResult($stmt);

     // Retornar los resultados
     return $data;
    }

	// Método para obtener el recuento de paquetes por estado de envío
	public function getPaquetesPorEstado()
    {
        $sql = "SELECT e.Descripcion AS Estado, COUNT(p.Id_Estado_Envio) AS TotalPaquetes
                FROM tbl_estado_envio e
                LEFT JOIN tbl_paquete p ON e.Id_Estado_Envio = p.Id_Estado_Envio
                GROUP BY e.Descripcion";

        // Ejecutar la consulta SQL personalizada
        $stmt = $this->executeQuery($sql);

        // Obtener los resultados de la consulta
        $data = $this->getQueryResult($stmt);

        // Retornar los resultados
        return $data;
    }

	// Método para obtener el recuento de paquetes por tipo de envío
	public function getPaquetesPorTipoEnvio()
	{
		$sql = "SELECT te.Descripcion AS TipoEnvio, COUNT(p.Cod_Tipo_Envio) AS TotalPaquetes
		        FROM tbl_tipo_envio te
		        LEFT JOIN tbl_paquete p ON te.Cod_Tipo_Envio = p.Cod_Tipo_Envio
		        GROUP BY te.Descripcion";

		// Ejecutar la consulta SQL personalizada
        $stmt = $this->executeQuery($sql);

        // Obtener los resultados de la consulta
        $data = $this->getQueryResult($stmt);

        // Retornar los resultados
        return $data;
	}

	// Método para obtener el recuento de paquetes por tipo de pago
	public function getPaquetesPorTipoPago()
	{
		$sql = "SELECT tp.Descripcion_pago AS TipoPago, COUNT(p.id_tipo_pago) AS TotalPaquetes
		        FROM tbl_tipo_pago tp
		        LEFT JOIN tbl_paquete p ON tp.id_tipo_pago = p.id_tipo_pago
		        GROUP BY tp.Descripcion_pago";

		// Ejecutar la consulta SQL personalizada
        $stmt = $this->executeQuery($sql);

        // Obtener los resultados de la consulta
        $data = $this->getQueryResult($stmt);

        // Retornar los resultados
        return $data;
	}

	// Método para obtener el recuento de paquetes por seguro
	public function getPaquetesPorSeguro()
{
    $sql = "SELECT ts.Descripción AS Seguro, COUNT(p.id_Tipo_Seguro) AS TotalPaquetes
            FROM tbl_tipo_seguro ts
            LEFT JOIN tbl_paquete p ON ts.Id_Tipos_Seguros = p.id_Tipo_Seguro
            GROUP BY ts.Descripción";

    // Ejecutar la consulta SQL personalizada
    $stmt = $this->executeQuery($sql);

    // Obtener los resultados de la consulta
    $data = $this->getQueryResult($stmt);

    // Retornar los resultados
    return $data;
}


}
?>
