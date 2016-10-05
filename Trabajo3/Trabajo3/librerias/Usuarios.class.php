<?php

require_once("DataObject.class.php");
class Usuario extends DataObject {
	protected $data=array(
		"id_usuario"=>"",
		"username"=>"",
		"contrasena"=>"",
		"nombre"=>"",
		"apellidos"=>"",
		"falta"=>"",
		"email"=>"",
		"admin"=>"",
		"tipo"=>""
		);
	
	
	public static function getUsuarios($startRow, $numRows, $order){
		$conn= parent::connect();
		$sql="Select SQL_CALC_FOUND_ROWS  * from Usuarios order by $order Limit :startRow, :numRows ";
	
		try {
			$st=$conn->prepare($sql);
			$st->bindValue (":startRow", $startRow, PDO::PARAM_INT);
			$st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
			$st->execute();
			$usuarios=array();
			foreach ($st->fetchAll() as $row){
				$usuarios[]=new Usuario($row);
			}
			$st=$conn-> query("Select found_rows() as totalRows");
			$row=$st->fetch();
			
			parent::disconnect($conn);
			
			return array($usuarios, $row["totalRows"]);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
			
		public static function getUsuario($id) {
			$conn =parent::connect();
			$sql="select * from Usuarios where id_usuario=:id";
			try {
				$st=$conn->prepare($sql);
				$st-> bindValue(":id", $id, PDO::PARAM_INT);
				$st->execute();
				$row=$st->fetch();
				parent::disconnect($conn);
				if ($row) 
					return new Usuario($row);
			} catch (PDOException $e) {
		    	parent::disconnect($conn);
			   die("Fallo en el query: " .$e->getMessage());
		}
	}
	
	public  function getTipo() {
		$tipo=$this->data["tipo"];
		switch ($tipo) {
			case "as":
			  return "Asociados";
			
			case "ad":
			  return "Administrador";
			  
			 default:
			   return "Amigos";
		}
			
			
		}
	public static function getByUsername($username) {
		$conn=parent::connect();
		$sql ="Select * from Usuarios where username = :username";
		
		try {
			$st=$conn->prepare($sql);
			$st-> bindValue(":username", $username, PDO::PARAM_STR);
			$st->execute();
			$row= $st->fetch();
			if ($row) return new Usuario($row);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
	public static function getByEMail($emailAddress) {
		$conn=parent::connect();
		$sql= "Select * from Usuarios where email = :emailAddress";
		
		try {
			$st=$conn->prepare($sql);
			$st-> bindValue(":emailAddress", $emailAddress, PDO::PARAM_STR);
			$st->execute();
			$row= $st->fetch();
			if ($row) return new Usuario($row);
		} catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	}
	
	

     public function insert() {
		 $conn=parent::connect();
		 $sql = "insert into usuarios (
		 	username,
			contrasena,
			nombre, 
			apellidos,
			falta,
			email ,
			admin
			) VALUES (
			:nombre,
			password(:contrasena),
			:username, 
			:apellidos,
			:falta,
			:email , 
			0
			)";
		 try {
		   $st= $conn->prepare($sql);
		   $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
		   $st->bindValue(":contrasena", $this->data["contrasena"], PDO::PARAM_STR);
		   $st->bindValue(":nombre", $this->data["nombre"], PDO::PARAM_STR);
		   $st->bindValue(":apellidos", $this->data["apellidos"], PDO::PARAM_STR);
		   $st->bindValue(":falta", $this->data["falta"], PDO::PARAM_STR);
		   $st->bindValue(":email", $this->data["email"], PDO::PARAM_STR);
		   $row=$st->execute();
		 parent::disconnect($conn);
		 } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		}
	 }
	 public function autenticarse() {
		 $conn=parent::connect();
		 $sql= "Select * from Usuarios Where username= :username and contrasena= password(:contrasena)";
		 try {
			 $st= $conn->prepare($sql);
			 $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
			 $st->bindValue(":contrasena", $this->data["contrasena"], PDO::PARAM_STR);
			 $st->execute();
             $row=$st->fetch();
			 parent::disconnect($conn);
			
			 if ($row) return new Usuario($row);
		 } catch  (PDOException $e) {
			 parent::disconnect($conn);
			 die("Fallo en el query: " .$e->getMessage());
		 }
	 }
	 public function update() {
		$conn=parent::connect();
		$passwordSql=$this->data["contrasena"] ? "contrasena=password(:contrasena), " : "";
		
		$sql="UPDATE Usuarios SET 
			username=:username, 
			$passwordSql
		    nombre=:nombre,
			apellidos=:apellidos,
			falta=:falta,
			email=:email,
			tipo=:tipo,
			admin=:admin
			where id_usuario=:id";
			
		try {
			
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id", $this->data["id_usuario"], PDO::PARAM_INT);
		   $st->bindValue(":username", $this->data["username"], PDO::PARAM_STR);
		   if ($this->data["contrasena"])  $st->bindValue(":contrasena", $this->data["contrasena"], PDO::PARAM_STR);
		   $st->bindValue(":nombre", $this->data["nombre"], PDO::PARAM_STR);
		   $st->bindValue(":apellidos", $this->data["apellidos"], PDO::PARAM_STR);
		   $st->bindValue(":falta", $this->data["falta"], PDO::PARAM_STR);
		   $st->bindValue(":email", $this->data["email"], PDO::PARAM_STR);
		   $st->bindValue(":tipo", $this->data["tipo"], PDO::PARAM_STR);
		   if ($this->data["tipo"]=="ad") {
			$st->bindValue(":admin", 1, PDO::PARAM_STR);
		   } else {
			$st->bindValue(":admin", 0, PDO::PARAM_STR);
	     	}
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 
		 
	 }
	 
	 public function delete() {
		  $conn=parent::connect();
		  $sql= "Delete  from Usuarios where id_usuario=:id";
		  try {
		   $st= $conn->prepare($sql);
	       $st->bindValue(":id", $this->data["id_usuario"], PDO::PARAM_INT);
		   $row=$st->execute();
		   parent::disconnect($conn);
		   } catch (PDOException $e) {
			parent::disconnect($conn);
			die("Fallo en el query: " .$e->getMessage());
		   } 
		 	 
	 }
}
?>