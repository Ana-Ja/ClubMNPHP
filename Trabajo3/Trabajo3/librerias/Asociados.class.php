<?php

require_once("DataObject.class.php");
class Asociado extends DataObject {
	protected $data=array(
		"id_asociado"=>"",
		"razon_social"=>"",
		"nombre_comercial"=>"",
		"id_actividad"=>"",
		"id_ciudad"=>"",
		"direccion"=>"",
		"telefono"=>"",
		"correo"=>"",
		"comentarios"=>""
		);
	
	
	public static function getAsociados($startRow, $numRows, $order,$filtro, $ins){
		$conn= parent::connect();
		
		if ($order=="actividad") {
			$order="id_actividad";
		} elseif ($order=="comercio") {
			$order=" nombre_comercial";
		} elseif ($order=="ciudad") {
			$order=" id_ciudad";	
		}
		if ($filtro=="" and $ins=="") {
		   $sql="Select SQL_CALC_FOUND_ROWS  * from Asociados order by $order Limit :startRow, :numRows ";
		} elseif ($filtro!="" ){
			$sql="Select SQL_CALC_FOUND_ROWS  * from Asociados where ". $filtro . " order by $order Limit :startRow, :numRows ";
		}  elseif ($ins!="" ){
			$sql.= $ins . " order by $order Limit :startRow, :numRows ";
		}
	
		try {
			$st=$conn->prepare($sql);
			$st->bindValue (":startRow", $startRow, PDO::PARAM_INT);
			$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$Asociados=array();
			
			foreach ($st->fetchAll() as $row){
				$Asociados[]=new Asociado($row);
			}
			$st=$conn-> query("Select found_rows() as totalRows");
			$row=$st->fetch();
			
			parent::disconnect($conn);
			
			return array($Asociados, $row["totalRows"]);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
			
		public static function getAsociado($id) {
			$conn =parent::connect();
			$sql="select * from Asociados where id_asociado=:id";
			try {
				$st=$conn->prepare($sql);
				$st-> bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row=$st->fetch();
				parent::disconnect($conn);
				if ($row) 
					return new Asociado($row);
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}
	
	public static function getNombreAct($id) {
			$conn =parent::connect();
			$sql="select * from actividad where id_actividad=:id";
			try {
				$st=$conn->prepare($sql);
				$st-> bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row=$st->fetch();
				parent::disconnect($conn);
				if ($row) 
					return $row["nombre"];
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getActividades() {
			$conn =parent::connect();
			$sql="select * from actividad order by nombre";
			try {
				$st=$conn->prepare($sql);
				
				$acti=array();
			
			foreach ($st->fetchAll() as $row){
				$acti[]=$row;
			}
			
			
			parent::disconnect($conn);
			
			return $acti;
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getNombreCiu($id) {
			$conn =parent::connect();
			$sql="select * from ciudades where id_ciudad=:id";
			try {
				$st=$conn->prepare($sql);
				$st-> bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row=$st->fetch();
				parent::disconnect($conn);
				if ($row) 
					return $row["nombre_ciudad"];
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getByNombre($nombre) {
		$conn=parent::connect();
		$sql ="Select * from Asociados where nombre_comercial = :nombre";
		
		try {
			$st=$conn->prepare($sql);
			$st-> bindValue(":nombre_comercial", $nombre, PDO::PARAM_STR);
			$st->execute();
			$row= $st->fetch();
			if ($row) return new Asociado($row);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getByEMail($emailAddress) {
		$conn=parent::connect();
		$sql= "Select * from Asociados where correo = :correo";
		
		try {
			$st=$conn->prepare($sql);
			$st-> bindValue(":correo", $correo, PDO::PARAM_STR);
			$st->execute();
			$row= $st->fetch();
			if ($row) return new Asociado($row);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
	
	

     public function insert() {
		 $conn=parent::connect();
		 $sql = "insert into Asociados (
		 	razon_social,
			nombre_comercial,
			id_actividad,
			direccion, 
			telefono,
			correo,
			comentarios 
			) VALUES (
			:razon_social,
			:nombre_comercial,
			:id_actividad,
			:direccion, 
			:telefono,
			:correo,
			:comentarios , 
			0
			)";
		 try {
		   $st= $conn->prepare($sql);
		   $st->bindValue(":razon_social", $this->data["razon_social"], PDO::PARAM_STR);
		   $st->bindValue(":nombre_comercial", $this->data["nombre_comercial"], PDO::PARAM_STR);
		   $st->bindValue(":direccion", $this->data["direccion"], PDO::PARAM_STR);
		   $st->bindValue(":telefono", $this->data["telefono"], PDO::PARAM_STR);
		   $st->bindValue(":correo", $this->data["correo"], PDO::PARAM_STR);
		   $st->bindValue(":comentarios", $this->data["comentarios"], PDO::PARAM_STR);
		   $row=$st->execute();
		 parent::disconnect($conn);
		 } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	 }
	 
	 public function update() {
		$conn=parent::connect();
		
		
		$sql="UPDATE Asociados SET 
			razon_social=:razon_social, 
			nombre_comercial=:nombre_comercial,
		    id_actividad=:id_actividad,
			direccion=:direccion,
			telefono=:telefono,
			correo=:correo,
			comentarios=:comentarios
			where id_asociado=:id_asociado";
			
		try {
			
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id_asociado", $this->data["id_asociado"], PDO::PARAM_INT);
		   $st->bindValue(":razon_social", $this->data["razon_social"], PDO::PARAM_STR);
		  
		   $st->bindValue(":nombre_comercial", $this->data["nombre_comercial"], PDO::PARAM_STR);
		   $st->bindValue(":id_actividad", $this->data["id_actividad"], PDO::PARAM_STR);
		   $st->bindValue(":direccion", $this->data["direccion"], PDO::PARAM_STR);
		   $st->bindValue(":telefono", $this->data["telefono"], PDO::PARAM_STR);
		   $st->bindValue(":correo", $this->data["correo"], PDO::PARAM_STR);
		    $st->bindValue(":comentarios", $this->data["comentarios"], PDO::PARAM_STR);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 
		 
	 }
	 
	 public function delete() {
		  $conn=parent::connect();
		  $sql= "Delete  from Asociados where id_Asociado=:id_Asociado";
		  try {
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id", $this->data["id_Asociado"], PDO::PARAM_INT);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 	 
	 }
}
?>