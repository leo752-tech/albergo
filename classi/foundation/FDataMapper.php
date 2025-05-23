<?php

class FDataMapper{

	
    private static $instance;

    private static $db;
    private $name = "my_database_prova";
    private $host = "localhost";
    private $user = "root";
    private $password = "";

    //SINGLETON PATTERN
    private function __construct(){
       try{
           self::$db = new PDO("mysql:host={$this->host};dbname={$this->name}", $this->user, $this->password);
       }catch(PDOException $e){
           echo "ERROR". $e->getMessage();
           die;
       }
    }

    public static function getInstance(){
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    //------------------------------------------------------------------------------------------------------
 	
 	public static function chiudiConnessione(){
        static::$instance = null;
    }

    public static function getDb(){
        return self::$db;
    }

    //metodo per verificare l'esistenza di un oggetto nel db
    public static function esiste($table, $id, $valore){
    	try{
	        $query = "SELECT COUNT(*) FROM " . $table . " WHERE " . $id . " = '" . $valore . "';";
	        $stmt = self::$db->prepare($query);
	        $stmt->execute();
	        $numRighe = $stmt->fetchColumn();
	        return $numRighe>0;
    	}catch(PDOException $e){
    		echo "ERRORE: " . $e->getMessage();
    		return false;
    	}

    }

    //metodo per recuperare un oggetto dal db
    public static function recuperaOggetto($table, $campo ,$valore){
        try{
            $query = "SELECT * FROM " . $table . " WHERE " . $campo . " = '" . $valore . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $oggetto = $stmt->fetch(PDO::FETCH_ASSOC);           
            return $oggetto;
            
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    //metodo per aggiornare un oggetto
    public static function aggiornaOggetto($table, $campo, $valoreCampo, $condizione, $valoreCondizione){
        
        try{
            $query = "UPDATE " . $table . " SET ". $campo. " = '" . $valoreCampo . "' WHERE " . $condizione . " = '" . $valoreCondizione . "';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    //metodo per inserire un oggetto nel db
    public static function salvaOggetto($classe, $oggetto)
    {
        try{
            $query = "INSERT INTO " . $classe::getTable() . " VALUES " . $classe::getValues();
            $stmt = self::$db->prepare($query);
            $classe::bind($stmt, $oggetto);
            $stmt->execute();
            $id = self::$db->lastInsertId();
            return $id;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }

    //metodo per cancellare un oggetto dal db
    public static function cancellaOggetto($table, $campo, $id){
        try{
            $query = "DELETE FROM " . $table . " WHERE " . $campo . " = '".$id."';";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            return true;
        }catch(Exception $e){
            echo "ERROR: " . $e->getMessage();
            return false;
        }
    }

    //metodo che ritorna tutti gli elementi di una tabella
    public static function selectAll($table) {
        try{
            $query = "SELECT * FROM " . $table . ";";
            $stmt = self::$db->prepare($query);
            $stmt->execute();
            $num = $stmt->rowCount();
            if($num > 0){
                $result = array();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                while ($riga = $stmt->fetch()){
                    $result[] = $riga;
                }
                return $result;
            }else{
                return array();
            }
        }catch(Exception $e){
            echo "ERROR " . $e->getMessage();
            return array();
        }
    }




}
