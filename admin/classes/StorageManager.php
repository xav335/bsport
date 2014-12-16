<?php
class StorageManager{

	public function __construct(){
	
	}
	
	public function grantAccess($login,$mdp){
		$this->dbConnect("bsportnv");
		$requete = "SELECT * FROM admin";
		$requete .= " WHERE login = '" . mysql_real_escape_string( $login ) . "'";
		$requete .= " AND mdp = '" . mysql_real_escape_string( $mdp ) . "'";
		//echo $requete . "<br><br>";
		$result = mysql_query($requete);
		$num_rows = mysql_num_rows($result);
		
		$this->dbDisConnect();
		if ($num_rows > 0)  {
			return true;
		} else {
			return false;
		}
	
	}
	
	function authentifier($login, $mdp) {
		$this->dbConnect("bsport");
		// On recherche dans la base un utilisateur ayant ces identifiants
		$requete = "SELECT * FROM admin";
		$requete .= " WHERE login = '" . mysql_real_escape_string( $login ) . "'";
		$requete .= " AND mdp = '" . mysql_real_escape_string( $mdp ) . "'";
		//echo $requete . "<br><br>";
		$result=mysql_query($requete);
		if ($result==false)
		{
			die(mysql_error());
		}
		$count=mysql_num_rows($result);
		// On a trouvé un utilisateur
		if ($count != 0) {
			$this->dbDisConnect();
			return true;
		}
		// Personne --> Erreur!
		else
			$this->dbDisConnect();
			return false;
	}
	
	
	public function storeIntoCRMAssos($value,$cat){
		//$this->dbConnect("dolibarr");
		$this->dbConnect("crmstaging");
		$this->begin();
		try {
			$requete = "INSERT INTO `llx_societe`(
			`nom`,
			`fk_departement`,
			`phone`,
			`fax`,
			`address`,
			`zip`,
			`town`,
			`client`,
			`fk_user_creat`,
			`fk_user_modif`)";
			$requete .= " VALUES (";
			$requete .= "'".
					addslashes($value['raisonsoc'])
					."','35','". addslashes($value['tel'])
					."','". addslashes($value['fax'])
					."','". addslashes($value['responsable']."\n". $value['num']." ". $value['rue']." ". $value['rue2'])
					."','". addslashes($value['cp'])
					."','". addslashes($value['ville'])
					."','2','2','2');";
			echo "requete1 : ". $requete ."\n";
			$result = mysql_query($requete);
			if (!$result) { throw new Exception("ca chieeeee");}
				
			$id_record = mysql_insert_id();
	
			foreach ($cat as $key => $value) {
				print_r($value);
				$requete = "INSERT INTO `llx_categorie_societe`(
				`fk_categorie`,
				`fk_societe`)";
				$requete .= " VALUES (";
				$requete .= "'". $value
				."','". $id_record
				."');";
				echo "requete2 : ". $requete ."\n";;
				$result = mysql_query($requete);
				if (!$result) { throw new Exception("ca chieee222222ee");}
			}
			$this->commit();
				
		} catch (Exception $e) {
			$this->rollback();
				
			echo 'Exception reçue Passage cATCH: ',  $e->getMessage(), "\n";
			return "errrrrrrooooOOor";
		}
	
	
		$this->dbDisConnect();
	}
	
	public function storeIntoCRMWines($value,$cat){
		//$this->dbConnect("dolibarr");
		$this->dbConnect("crmstaging");
		$this->begin();
		try {
			$requete = "INSERT INTO `llx_societe`(
			`nom`,
			`fk_departement`,
			`phone`,
			`fax`,
			`url`,
			`email`,
			`client`,
			`fk_user_creat`,
			`fk_user_modif`,
			`address`)";
			$requete .= " VALUES (";
			$requete .= "'".
					addslashes($value['chateau'])
					."','35','". addslashes($value['phone'])
					."','". addslashes($value['fax'])
					."','". addslashes($value['site'])
					."','". addslashes($value['email'])
					."','2','2','2','". addslashes($value['societe'])
					."');";
			echo "requete1 : ". $requete;
			$result = mysql_query($requete);
			if (!$result) { throw new Exception("ca chieeeee");}
				
			$id_record = mysql_insert_id();
	
			foreach ($cat as $key => $value) {
				print_r($value);
				$requete = "INSERT INTO `llx_categorie_societe`(
				`fk_categorie`,
				`fk_societe`)";
				$requete .= " VALUES (";
				$requete .= "'". $value
				."','". $id_record
				."');";
				echo "requete2 : ". $requete;
				$result = mysql_query($requete);
				if (!$result) { throw new Exception("ca chieee222222ee");}
			}
			$this->commit();
				
		} catch (Exception $e) {
			$this->rollback();
				
			echo 'Exception reçue Passage cATCH: ',  $e->getMessage(), "\n";
			return "errrrrrrooooOOor";
		}
	
	
		$this->dbDisConnect();
	}
	
	public function getRecordsFromTable($recordStart,$numrecords){
		$this->dbConnect("winesworld");
		$requete = "SELECT
					`chateau` ,
					`email`	,
					`phone`
				,	`site`
				,	`societe`
				,   `fax` FROM `wines` LIMIT ". $recordStart .",".$numrecords;
	
		$result = mysql_query($requete);
		while( $row = mysql_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function getRecordsFromTableAsso($recordStart,$numrecords){
		$this->dbConnect("assoscommerces");
		$requete = "SELECT
					`raisonsoc` ,
					`num`	,
					`rue`
				,	`rue2`
				,	`cp`
				,	`ville`
				,	`tel`
				,   `fax`
				,   `responsable`
				,   `cdc`
				FROM `assos` LIMIT ". $recordStart .",".$numrecords;
	
		$result = mysql_query($requete);
		while( $row = mysql_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	private function dbConnect($bddz) {
		$host = "localhost";
		$user = "bsportnv";
		$pass = "bsportnv33";
		$bdd = $bddz;
			
		// connexion
		mysql_connect($host, $user, $pass)
		or die("Impossible de se connecter (Probleme de connexion)");
		mysql_select_db($bdd)
		or die("Impossible de se connecter (Probleme de base)");
		mysql_query("SET NAMES UTF8");
	}
	
	
	private function dbDisConnect() {
		mysql_close();
	}
	
	function begin() {
		mysql_query("BEGIN");
	}
	function commit() {
		mysql_query("COMMIT");
	}
	function rollback() {
		mysql_query("ROLLBACK");
	}

}

?>