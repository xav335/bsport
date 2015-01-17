<?php
require_once("StorageManager.php");
class Contact extends StorageManager {

	public function __construct(){

	}

	public function contactGet($id){
		$this->dbConnect("bsportnv");
		if (!isset($id)){
			$requete = "SELECT * FROM `contact` ORDER BY `name` DESC" ;
		} else {
			$requete = "SELECT * FROM `contact` WHERE id=". $id;
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

	
	public function contactAdd($value){
		//print_r($value);
		//exit();
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			if($value['newsletter']=='on') {
				$online = 1;
			} else {
				$online = 0;
			}
			$sql = "INSERT INTO `bsportnv`.`contact`
						(`name`, `email`, `firstname`,`newsletter`)
						VALUES (
						'". addslashes($value['name']) ."',
						'". addslashes($value['email']) ."',
						'". addslashes($value['firstname']) ."',
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
			throw new Exception("Erreur Mysql contactAdd ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
		$this->dbDisConnect();
		return $id_record;
	}
	
	public function contactModify($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			if($value['newsletter']=='on') {
				$online = 1;
			} else {
				$online = 0;
			}
	
			$sql = "UPDATE `bsportnv`.`contact` SET
					`name`='". addslashes($value['name']) ."',
					`email`='". addslashes($value['email']) ."',
					`firstname`='". addslashes($value['firstname']) ."',
					`newsletter`=". $online ."
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
	
	
	public function contactDelete($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "DELETE FROM `bsportnv`.`contact` WHERE `id`=". $value .";";
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
	
	public function contactExportCSV(){
		//print_r($value);
		//exit();
		$date = date("Ymd-H:i:s");      
		$value = $_SERVER["DOCUMENT_ROOT"] ."/admin/FileUpload/server/php/files/export-". $date .".csv";
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
				
			$sql = "SELECT firstname,name,email,newsletter INTO OUTFILE '". $value ."'
				FIELDS
					TERMINATED BY ';'
					ENCLOSED BY '\\\"'
					ESCAPED BY '\\\\'
				LINES
					STARTING BY ''
					TERMINATED BY '\\r'
				FROM contact;";
			echo $sql;
				
			$result = mysql_query($sql) or die(mysql_error());
			if (!$result) {
				throw new Exception($sql);
			}
			$this->commit();
			return $result;
	
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql contactImportCSV". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	
		$this->dbDisConnect();
	}
	
	public function contactImportCSV($value){
		//print_r($value);
		//exit();
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$this->contactDeleteALL();
			
			$sql = "LOAD DATA LOCAL INFILE '". $value ."'
	          INTO TABLE contact
			FIELDS
				TERMINATED BY ';'
				ENCLOSED BY '\\\"'
				ESCAPED BY '\\\\'
			LINES
				STARTING BY ''
				TERMINATED BY '\\r'
				(`firstname`,`name`,`email`,`newsletter`) ;";
			//echo $sql;
			
			$result = mysql_query($sql) or die(mysql_error());
			if (!$result) {
				throw new Exception($sql);
			}
			$this->commit();
			return $result;
		
		} catch (Exception $e) {
			$this->rollback();
			throw new Exception("Erreur Mysql contactImportCSV". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	
		$this->dbDisConnect();
	}
	
	protected function contactDeleteALL(){
		try {
			$sql = "DELETE FROM `bsportnv`.`contact` ;";
			$result = mysql_query($sql);
	
			if (!$result) {
				throw new Exception($sql);
			}
	
		} catch (Exception $e) {
			throw new Exception("Erreur Mysql ". $e->getMessage());
			return "errrrrrrooooOOor";
		}
	}
}