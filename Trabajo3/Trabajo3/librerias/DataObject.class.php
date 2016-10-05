<?php
include_once("funciones.php");
abstract class dataObject{
	protected $data= array();
	//tengo un constructor que me manda un array asociativo que contiene los campos de un registro
	//de una de las tablas y los meto en otro array llamado $data
	public function __construct($data) {
		foreach ($data as $key=> $value) {
			if (array_key_exists($key, $this->data)) $this->data[$key]=$value;
		}
	}
	
	public function getValue($field) {
		if (array_key_exists($field, $this->data)) {
			return $this->data[$field];
		} else {
			die("Field no found");				 
		}	
	}
	
	public function getValueEncoded($field) {
		return htmlspecialchars($this->getValue($field));
	}
	protected function connect(){
		try {
			$conn= new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD);
			$conn->setAttribute( PDO::ATTR_PERSISTENT, true );
			$conn-> setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Conexion fallida: " .$e->getMessage());
		}
		return $conn;
			
	}
	protected function disconnect($conn) {	
		$conn="";
	}
}
?>