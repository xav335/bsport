<?php
require_once("StorageManager.php");
class News extends StorageManager {

	public function __construct(){

	}
	
	public function newsGet($id){
		 $this->dbConnect();
		if (!isset($id)){
			$requete = "SELECT * FROM `news` ORDER BY date_news DESC" ;
		} else {
			$requete = "SELECT * FROM `news` WHERE id_news=". $id ;
		}
		//print_r($requete);
		$new_array = null;
		$result = mysqli_query($this->mysqli,$requete);
		while( $row = mysqli_fetch_assoc( $result)){
			$new_array[] = $row;
		}
		$this->dbDisConnect();
		return $new_array;
	}
	
	public function newsAdd($value){
		//print_r($value);
		//exit();
		 $this->dbConnect();
		$this->begin();
		try {
			$sql = "INSERT INTO  .`news`
						(`date_news`, `titre`, `accroche`, `contenu`)
						VALUES (
						'". $this->inserer_date($value['datepicker']) ."', 
						'". addslashes($value['titre']) ."',
						'". addslashes($value['accroche']) ."',
						'". addslashes($value['contenu']) ."' 	
					);";
			$result = mysqli_query($this->mysqli,$sql);
			
			if (!$result) {
				throw new Exception($sql);
			}
			$id_record = mysqli_insert_id($this->mysqli);
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
		
		 $this->dbConnect();
		$this->begin();
		try {
			$sql = "UPDATE  .`news` SET
					`date_news`='". $this->inserer_date($value['datepicker']) ."', 
					`titre`='". addslashes($value['titre']) ."', 
					`accroche`='". addslashes($value['accroche']) ."', 
					`contenu`='". addslashes($value['contenu']) ."' 
					WHERE `id_news`=". $value['id'] .";";
			$result = mysqli_query($this->mysqli,$sql);
			
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
	
		 $this->dbConnect();
		$this->begin();
		try {
			$sql = "DELETE FROM  .`news` 
					WHERE `id_news`=". $value .";";
			$result = mysqli_query($this->mysqli,$sql);
				
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