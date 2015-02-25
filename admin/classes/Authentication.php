<?php
require_once("StorageManager.php");
class Authentication extends StorageManager {

	public function __construct(){

	}
	
	public function grantAccess($login,$mdp){
		$this->dbConnect();
		$sql = "SELECT * FROM admin";
		$sql .= " WHERE login = '" . mysqli_real_escape_string($this->mysqli, $login ) . "'";
		$sql .= " AND mdp = '" . mysqli_real_escape_string($this->mysqli, $mdp ) . "'";
		//echo $sql . "<br><br>";
		$result = mysqli_query($this->mysqli,$sql);
		if (!$result) {
			throw new Exception("Erreur Mysql grantAccess". $sql);
		}
		$num_rows = mysqli_num_rows($result);
	
		$this->dbDisConnect();
		if ($num_rows > 0)  {
			return true;
		} else {
			return false;
		}
	
	}
	
}