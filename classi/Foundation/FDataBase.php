<?php

class FDataBase{
	
	//unica istanza del DB
	private static $instanza;
	//oggetto PDO
	private $db;


	
	private function __construct (){
		try {
			$this->db = new PDO("mysql:host=$host; dbname=$database", $username, $password);
		} catch (PDOException $e) {
			echo "Errore: " . $e->getMessage();
			die;
		}

	}

    //restituisce l'unica istanza (creandola se non esiste gia')
	public static function getInstance (){ 
		if (self::$instanza == null) {
			self::$instanza = new FDatabase();
		}
		return self::$instanza;
	}

    //salva i dati di un oggetto sul db
	public function storeDB ($class, $obj){
		try {
			$this->db->beginTransaction();
			$query = "INSERT INTO " . $class::getTable() . " VALUES " . $class::getValues();
			$stmt = $this->db->prepare($query);
			$class::bind($stmt, $obj);
			$stmt->execute();
			$id = $this->db->lastInsertId();
			$this->db->commit();
			$this->closeDbConnection();
			return $id;
		} catch (PDOException $e) {
			echo "Attenzione errore: " . $e->getMessage();
			$this->db->rollBack();
			return null;
		}
	}

	public function loadDB ($class, $field, $id)
	{
		try {
			// $this->db->beginTransaction();
			$query = "SELECT * FROM " . $class::getTable() . " WHERE " . $field . "='" . $id . "';";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			if ($num == 0) {
				$result = null;        //nessuna riga interessata. return null
			} elseif ($num == 1) {                          //nel caso in cui una sola riga fosse interessata
				$result = $stmt->fetch(PDO::FETCH_ASSOC);   //ritorna una sola riga
			} else {
				$result = array();                         //nel caso in cui piu' righe fossero interessate
				$stmt->setFetchMode(PDO::FETCH_ASSOC);   //imposta la modalità di fetch come array associativo
				while ($row = $stmt->fetch())
					$result[] = $row;                    //ritorna un array di righe.
			}
			//  $this->closeDbConnection();
			return $result;
		} catch (PDOException $e) {
			echo "Attenzione errore: " . $e->getMessage();
			$this->db->rollBack();
			return null;
		}

	public function deleteDB ($class, $field, $id){
		try {
			$result = null;
			$this->db->beginTransaction();
			$esiste = $this->existDB($class, $field, $id);
			if ($esiste) {
				$query = "DELETE FROM " . $class::getTable() . " WHERE " . $field . "='" . $id . "';";
				$stmt = $this->db->prepare($query);
				$stmt->execute();
				$this->db->commit();
				$this->closeDbConnection();
				$result = true;
			}
		} catch (PDOException $e) {
			echo "Attenzione errore: " . $e->getMessage();
			$this->db->rollBack();
			//return false;
		}
		return $result;
	}

	public function updateDB ($class, $field, $newvalue, $pk, $id){
		try {
			$this->db->beginTransaction();
			$query = "UPDATE " . $class::getTable() . " SET " . $field . "='" . $newvalue . "' WHERE " . $pk . "='" . $id . "';";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$this->db->commit();
			$this->closeDbConnection();
			return true;
		} catch (PDOException $e) {
			echo "Attenzione errore: " . $e->getMessage();
			$this->db->rollBack();
			return false;
		}
	}

	public function existDB ($class, $field, $id){
		try {
			$query = "SELECT * FROM " . $class::getTable() . " WHERE " . $field . "='" . $id . "'";
			$stmt = $this->db->prepare($query);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if (count($result) == 1) return $result[0];  //rimane solo l'array interno
			else if (count($result) > 1) return $result;  //resituisce array di array
			$this->closeDbConnection();
		} catch (PDOException $e) {
			echo "Attenzione errore: " . $e->getMessage();
			return null;
		}
	}


}


?>