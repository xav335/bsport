<?php
require_once("StorageManager.php");
class Goldbook extends StorageManager {

	public function __construct(){

	}
	
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
	
	public function goldbookValidGet(){
		$this->dbConnect("bsportnv");
		$requete = "SELECT * FROM `goldbook` WHERE online=1 ORDER BY `date` DESC" ;
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
	
	
}