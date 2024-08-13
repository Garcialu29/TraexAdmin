<?php 
	
	class Mysql extends Conexion
	{
		private $conexion;
		private $strquery;
		private $arrValues;

		function __construct()
		{
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}

		//Insertar un registro
		public function insert(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
        	$insert = $this->conexion->prepare($this->strquery);
        	$resInsert = $insert->execute($this->arrVAlues);
        	if($resInsert)
	        {
	        	$lastInsert = $this->conexion->lastInsertId();
	        }else{
	        	$lastInsert = 0;
	        }
	        return $lastInsert; 
		}
		//Busca un registro
		public function select(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetch(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Devuelve todos los registros
		public function select_all(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$result->execute();
        	$data = $result->fetchall(PDO::FETCH_ASSOC);
        	return $data;
		}
		//Actualiza registros
		public function update(string $query, array $arrValues)
		{
			$this->strquery = $query;
			$this->arrVAlues = $arrValues;
			$update = $this->conexion->prepare($this->strquery);
			$resExecute = $update->execute($this->arrVAlues);
	        return $resExecute;
		}

		//Eliminar un registros
		public function delete(string $query)
		{
			$this->strquery = $query;
        	$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
        	return $del;
		}
     // Método para ejecutar una consulta SQL personalizada
     public function executeQuery(string $query, array $arrValues = [])
      {
	    $this->strquery = $query;
	    $this->arrValues = $arrValues;

	     // Preparar la consulta
	     $stmt = $this->conexion->prepare($this->strquery);

	     // Ejecutar la consulta con los valores proporcionados
	     $success = $stmt->execute($this->arrValues);

	     // Retornar el resultado de la ejecución
	     return $success ? $stmt : false;
      }

        // Método para obtener los resultados de una consulta ejecutada previamente
        public function getQueryResult($stmt)
        {
	     // Verificar si el objeto $stmt es válido
	     if ($stmt instanceof PDOStatement) {
		 // Obtener los resultados de la consulta
		 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		 return $data;
	     } else {
		 // Si no es un objeto válido, retornar un array vacío
		 return [];
	     }
        }

	}

 ?>

