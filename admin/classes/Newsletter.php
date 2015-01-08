<?php
class Newsletter extends StorageManager {

	public function __construct(){

	}
	
	public function newsletterGet($id){
		$this->dbConnect("bsportnv");
		if (!isset($id)){
			$requete = "SELECT * FROM `newsletter` ORDER BY `date` DESC" ;
		} else {
			$requete = "SELECT * FROM `newsletter` WHERE `id`=". $id ;
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
	
	public function newsletterAdd($value){
		print_r($value);
		//exit();
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "INSERT INTO `bsportnv`.`newsletter`
						(`date`, `titre`, `bas_page`)
						VALUES (
						'". $this->inserer_date($value['datepicker']) ."',
						'". addslashes($value['titre']) ."',
						'". addslashes($value['bas_page']) ."'
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
	
	public function newsletterModify($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "UPDATE `bsportnv`.`newsletter` SET
					`date`='". $this->inserer_date($value['datepicker']) ."',
					`titre`='". addslashes($value['titre']) ."',
					`bas_page`='". addslashes($value['bas_page']) ."'
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
	
	public function newsletterDelete($value){
		//print_r($value);
		//exit();
	
		$this->dbConnect("bsportnv");
		$this->begin();
		try {
			$sql = "DELETE FROM `bsportnv`.`newsletter`
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
	
}