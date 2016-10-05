<?php
require_once "DataObject.class.php";
class EntradaLog extends DataObject {
	protected $data=array(
		"id_usuario"=>"",
		"url"=>"",
		"numvisitas"=>"",
		"ultimoacceso"=>""
		);
	public static function getEntradaLog($memberId) {
		$conn= parent::connect();
		$sql= "Select * From accesolog where id_usuario=:id_usuario Order by ultimoacceso desc";
		
		try {
			$st= $conn->prepare($sql);
			$st-> bindValue(":id_usuario", $memberId, PDO::PARAM_INT);
			$st-> execute();
			$entradasLog=array();
			foreach ($st->fetchAll() as $row){
				$entradasLog[]=new EntradaLog($row);
			}
			parent::disconnect($conn);
			return $entradasLog;
		} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
		
	}	
	public function grabar() {
		 
		 $conn=parent::connect();
		 $sql= "Select * from accesoLog Where id_usuario= :id_usuario and url=:url";
		
		 try {
			 $st= $conn->prepare($sql);
			 $st->bindValue(":id_usuario", $this->data["id_usuario"], PDO::PARAM_INT);
			 $st->bindValue(":url", $this->data["url"], PDO::PARAM_STR);
			 $st->execute();
              if ($st->fetch()) {
				  $sql="Update accesolog set numvisitas=numvisitas + 1 where id_usuario= :id_usuario and url=:url";
				  
				  $st= $conn->prepare($sql);
			      $st->bindValue(":id_usuario", $this->data["id_usuario"], PDO::PARAM_INT);
			      $st->bindValue(":url", $this->data["url"], PDO::PARAM_STR);
			      $st->execute();
			  } else {
				  $sql="Insert into accesolog ( id_usuario, url, numvisitas) values (:id_usuario,:url, 1)";
																								
				  $st= $conn->prepare($sql);
			      $st->bindValue(":id_usuario", $this->data["id_usuario"], PDO::PARAM_INT);
			      $st->bindValue(":url", $this->data["url"], PDO::PARAM_STR);
			      $st->execute();
			  }
			 parent::disconnect($conn);
			
		 } catch  (PDOException $e) {
			 parent::disconnect($conn);
			 die("Fallo en el query: " .$e->getMessage());
		 }
}

 
	 public static function BorrarUsuario($memberId) {
		  $conn=parent::connect();
		  $sql= "Delete  from accesolog where id_usuario=:id_usuario";
		  try {
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id_usuario", $memberId, PDO::PARAM_INT);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 
		 
	 }
}
?>