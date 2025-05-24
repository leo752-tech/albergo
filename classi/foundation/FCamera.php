<?php

class FCamera{

    private static $key = "idCamera";

    private static $class = "FCamera";
   
    private static $table = "camere";
   
    private static $values = "(NULL,:nome,:posti,:prezzo,:tipo,NULL,NULL)";
    public function __construct(){}

    //metodo che 
    public static function bind($stmt,$camera) { 
        $stmt->bindValue(":nome", $camera->getNome(), PDO::PARAM_INT);
        $stmt->bindValue(":posti", $camera->getPosti(), PDO::PARAM_INT);
        $stmt->bindValue(":prezzo", $camera->getPrezzo(), PDO::PARAM_INT);
        $stmt->bindValue(":tipo", $camera->getTipo(), PDO::PARAM_STR);     
    }

    public static function getKey(){
        return self::$key;
    }
    
    public static function getClass(){
        return self::$class;
    }

    public static function getTable(){
        return self::$table;
    }

    public static function getValues(){
        return self::$values;
    }

    //crea un oggetto ECamera
    public static function creaCamera($queryRes){
        $camera = new ECamera($queryRes["nome"], $queryRes["posti"], $queryRes["prezzo"], $queryRes["tipo"]);
        if (isset($queryRes["idCamera"])) { 
            $camera->setIdCamera($queryRes["idCamera"]);
        }
        return $camera;
    }

    //recupera un oggetto ECamera tramite il suo id
    public static function getCamera($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $camera = self::creaCamera($result);
            return $camera;
        }else{
            return null;
        }
    }

    //salva l'oggetto camera se non esiste, altrimenti fa un aggiornamento
    public static function salvaCamera($oggetto , $campi = null){
        if($campi === null){
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            if($id !== null){
                $oggetto->setIdCamera($id);
                return $id;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $oggetto->getIdCamera());
                }
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }catch(PDOException $e){
                echo "ERROR " . $e->getMessage();
                FDataMapper::getInstance()->getDb()->rollBack();
                return false;
            }
        }
    }

    //cancella un oggetto dal db
    public static function cancellaCamera($id){
        try{
            FDataMapper::getInstance()->getDb()->beginTransaction();

            if(FDataMapper::esiste(self::$table, self::$key, $id)){
                FDataMapper::cancellaOggetto(self::$table, self::$key, $id);
                FDataMapper::getInstance()->getDb()->commit();
                return true;
            }else{
                echo "Camera non esistente";
                return false;
            }
        }catch(PDOException $e){
            echo "ERRORE: " . $e->getMessage();
        }
    }
}

?>
