<?php
class StorageManager{

	public function __construct(){
	
	}
	
	////////////////// SECURITY  SECURITY SECURITY SECURITY SECURITY SECURITY SECURITY//////////////////////////
	
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
	
	////////////////// NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS NEWS //////////////////////////
	
	public function newsGet($id){
		$this->dbConnect("bsportnv");
		if (!isset($id)){
			$requete = "SELECT * FROM `news` ORDER BY date_news DESC" ;
		} else {
			$requete = "SELECT * FROM `news` WHERE id_news=". $id ." ORDER BY date_news DESC" ;
		}
		//print_r($requete);
		$new_array = null;
		$result = mysql_query($requete);
		while( $row = mysql_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function newsAdd($value){
		//print_r($value);
		//exit();
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "INSERT INTO `bsportnv`.`news`
						(`date_news`, `titre`, `accroche`, `contenu`)
						VALUES (
						'". $this->inserer_date($value['datepicker']) ."', 
						'". addslashes($value['titre']) ."',
						'". addslashes($value['accroche']) ."',
						'". addslashes($value['contenu']) ."' 	
					);";
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new Exception($sql);
			}
			$id_record = mysql_insert_id();
			$this->commit();
		
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		$this->dbDisConnect();
		return $id_record;
	}
	
	public function newsModify($value){
		//print_r($value);
		//exit();
		
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "UPDATE `bsportnv`.`news` SET
					`date_news`='". $this->inserer_date($value['datepicker']) ."', 
					`titre`='". addslashes($value['titre']) ."', 
					`accroche`='". addslashes($value['accroche']) ."', 
					`contenu`='". addslashes($value['contenu']) ."' 
					WHERE `id_news`=". $value['id'] .";";
			$result = mysql_query($sql);
			
			if (!$result) {
				throw new Exception($sql);
			}
		
			$this->commit();
		
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		
		
		$this->dbDisConnect();
	}
	
	public function newsDelete($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "DELETE FROM `bsportnv`.`news` 
					WHERE `id_news`=". $value .";";
			$result = mysql_query($sql);
				
			if (!$result) {
				throw new Exception($sql);
			}
	
			$this->commit();
	
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	
	
		$this->dbDisConnect();
	}

	//////////////////   GOLDBOOK GOLDBOOK GOLDBOOK GOLDBOOK GOLDBOOK GOLDBOOK GOLDBOOK  //////////////////////////
	
	public function goldbookUnvalidateGet(){
		$this->dbConnect("bsportnv");
		$requete = "SELECT count(*) as nb FROM `goldbook` WHERE online=0;" ;
		//print_r($requete);
		$new_array = null;
		$result = mysql_query($requete);
		while( $row = mysql_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function goldbookGet($id){
		$this->dbConnect("bsportnv");
		if (!isset($id)){
			$requete = "SELECT * FROM `goldbook` ORDER BY `date` DESC" ;
		} else {
			$requete = "SELECT * FROM `goldbook` WHERE id=". $id ." ORDER BY `date` DESC" ;
		}
		//print_r($requete);
		$new_array = null;
		$result = mysql_query($requete);
		while( $row = mysql_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function goldbookAdd($value){
		//print_r($value);
		//exit();
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			if($value['online']=='on') {
				$online = 1;
			} else {
				$online = 0;
			}
			$sql = "INSERT INTO `bsportnv`.`goldbook`
						(`date`, `nom`, `email`, `message`,`online`)
						VALUES (
						'". $this->inserer_date($value['datepicker']) ."',
						'". addslashes($value['nom']) ."',
						'". addslashes($value['email']) ."',
						'". addslashes($value['message']) ."',
						". $online ."
					);";
			$result = mysql_query($sql);
				
			if (!$result) {
				throw new Exception($sql);
			}
			$id_record = mysql_insert_id();
			$this->commit();
	
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		$this->dbDisConnect();
		return $id_record;
	}
	
	public function goldbookModify($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			if($value['online']=='on') {
				$online = 1;
			} else {
				$online = 0;
			}
			
			$sql = "UPDATE `bsportnv`.`goldbook` SET
					`date`='". $this->inserer_date($value['datepicker']) ."',
					`nom`='". addslashes($value['nom']) ."',
					`email`='". addslashes($value['email']) ."',
					`message`='". addslashes($value['message']) ."',
					`online`=". $online ."
					WHERE `id`=". $value['id'] .";";
			$result = mysql_query($sql);
				
			if (!$result) {
				throw new Exception($sql);
			}
	
			$this->commit();
	
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	
	
		$this->dbDisConnect();
	}
	
	public function goldbookDelete($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "DELETE FROM `bsportnv`.`goldbook`
					WHERE `id`=". $value .";";
			$result = mysql_query($sql);
	
			if (!$result) {
				throw new Exception($sql);
			}
	
			$this->commit();
	
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	
	
		$this->dbDisConnect();
	}
	
	
	////////////////// UTILS UTILS UTILS UTILS UTILS UTILS UTILS UTILS UTILS UTILS UTILS //////////////////////////
	private function inserer_date($date) {
		$tab = split("/", $date);
		return $tab[2] . "-" . $tab[1] . "-" . $tab[0];
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