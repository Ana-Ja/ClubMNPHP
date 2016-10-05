<?php

require_once("DataObject.class.php");
class Noticia extends DataObject {
	protected $data=array(
		"id_noticia"=>"",
		"id_ciudad"=>"",
		"titulo"=>"",
		"fecha"=>"",
		"noticia"=>"",
		"fbaja"=>""
		);
	
	
	public static function getNoticias($startRow, $numRows,$filtro, $ins){
		 $hoy=date('Y-m-d');
		if ($filtro=="" and $ins=="") {
		   $sql="Select SQL_CALC_FOUND_ROWS  * from noticias where  fbaja>'$hoy' order by fecha desc Limit :startRow, :numRows ";
		} elseif ($filtro!="" ){
			$sql="Select SQL_CALC_FOUND_ROWS  * from noticias where ". $filtro . " and fbaja>'$hoy' order by fecha desc Limit :startRow, :numRows ";
		}  elseif ($ins!="" ){
			$sql.= $ins . " where  fbaja>'$hoy' order by fecha desc Limit :startRow, :numRows ";
		}

		$conn= parent::connect();
		
	   
		try {
			$st=$conn->prepare($sql);
			$st->bindValue (":startRow", $startRow, PDO::PARAM_INT);
			$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$noticias=array();
			foreach ($st->fetchAll() as $row){
				$noticias[]=new Noticia($row);
			}
			$st=$conn-> query("Select found_rows() as totalRows");
			$row=$st->fetch();
			
			parent::disconnect($conn);
			
			return array($noticias, $row["totalRows"]);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getNoticias2($startRow, $numRows,$order){
		$order= ($order!=="fecha") ? "nombre_ciudad":"fecha";
	    $hoy=date('Y-m-d');
		$conn= parent::connect();
		
	   $sql="Select SQL_CALC_FOUND_ROWS  * from noticias,ciudades where noticias.id_ciudad=ciudades.id_ciudad and fbaja>'$hoy'  order by $order desc Limit :startRow, :numRows ";
		try {
			$st=$conn->prepare($sql);
			$st->bindValue (":startRow", $startRow, PDO::PARAM_INT);
			$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$noticias=array();
			foreach ($st->fetchAll() as $row){
				$noticias[]=new Noticia($row);
			}
			$st=$conn-> query("Select found_rows() as totalRows");
			$row=$st->fetch();
			
			parent::disconnect($conn);
			
			return array($noticias, $row["totalRows"]);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
			
		public static function getNoticia($id) {
			$conn =parent::connect();
			$sql="select * from noticias where id_noticia=:id";
			
			try {
				$st=$conn->prepare($sql);
				$st-> bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row=$st->fetch();
				parent::disconnect($conn);
				if ($row) 
					return new Noticia($row);
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}

	

     public function insert() {
		 $conn=parent::connect();
		 $sql = "insert into noticias (
		 	titulo,
			fecha,
			noticia, 
			id_ciudad,
			fbaja
			) VALUES (
			:titulo,
			now(), 
			:noticia,
			:id_ciudad,
			:fbaja
			)";
		 try {
		   $st= $conn->prepare($sql);
		   $st->bindValue(":titulo", $this->data["titulo"], PDO::PARAM_STR);
		   $st->bindValue(":noticia", $this->data["noticia"], PDO::PARAM_STR);
		   $st->bindValue(":id_ciudad", $this->data["id_ciudad"], PDO::PARAM_INT);
		   $st->bindValue(":fbaja", $this->data["fbaja"], PDO::PARAM_STR);
		   $row=$st->execute();
		 parent::disconnect($conn);
		 } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	 }
	
	 public function update() {
		$conn=parent::connect();
     
		$sql="UPDATE noticias SET 
			titulo=:titulo, 
		    fecha=now(),
			noticia=:noticia,
			id_ciudad=:id_ciudad,
			fbaja=:fbaja
			where id_noticia=:id";
			
		try {
			
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id", $this->data["id_noticia"], PDO::PARAM_INT);
		   $st->bindValue(":titulo", $this->data["titulo"], PDO::PARAM_STR);
		   $st->bindValue(":noticia", $this->data["noticia"], PDO::PARAM_STR);
		   $st->bindValue(":id_ciudad", $this->data["id_ciudad"], PDO::PARAM_INT);
		    $st->bindValue(":fbaja", $this->data["fbaja"], PDO::PARAM_INT);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 
		 
	 }
	 
	 public function delete() {
		  $conn=parent::connect();
		  $sql= "Delete  from noticias where id_noticia=:id";
		  try {
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id", $this->data["id_noticia"], PDO::PARAM_INT);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 	 
	 }
}
?>