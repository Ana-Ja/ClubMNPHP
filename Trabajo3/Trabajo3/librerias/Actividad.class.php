<?php

require_once("DataObject.class.php");
class Actividad extends DataObject {
	protected $data=array(
		"id_actividad"=>"",
		"nombre"=>""
		);
	
	
	public static function getActividad(){
		$conn= parent::connect();
		$sql="Select  * from actividad  order by nombre  ";
		try {
			$st=$conn->prepare($sql);
			$st->execute();
			$activi=array();
			foreach ($st->fetchAll() as $row){
				$activi[]=new Actividad($row);
			}
			
			parent::disconnect($conn);
			return $activi;
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
}
?>		