<?php

require_once("DataObject.class.php");
class Ciudad extends DataObject {
	protected $data=array(
		"id_ciudad"=>"",
		"nombre_ciudad"=>"",
		"imagen_ciudad"=>""
		);
	
	
	public static function getCiudad(){
		$conn= parent::connect();
		$sql="Select  * from ciudades  order by nombre_ciudad ";
		try {
			$st=$conn->prepare($sql);
			$st->execute();
			$ciud=array();
			foreach ($st->fetchAll() as $row){
				$ciud[]=new Ciudad($row);
			}
			
			parent::disconnect($conn);
			return $ciud;
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
	
}	
?>