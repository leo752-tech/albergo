<?php

class FCamera{

    private static $key = "idCamera";

    private static $class = "FCamera";
   
    private static $table = "camera";
   
    private static $values = "(NULL,:nome,:posti,:prezzo,:tipo)";
    
    public function __construct(){}

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
    public static function creaOggetto($queryRes){
        $camera = new ECamera($queryRes["nome"], $queryRes["posti"], $queryRes["prezzo"], $queryRes["tipo"]);
        if (isset($queryRes["idCamera"])) { 
            $camera->setId($queryRes["idCamera"]);
        }
        return $camera;
    }

    //recupera un oggetto ECamera tramite il suo id
    public static function getOggetto($id){
        $result = FDataMapper::getInstance()->recuperaOggetto(self::$table, self::$key, $id);
        if($result != false && $result != null){
            $camera = self::creaOggetto($result);
            return $camera;
        }else{
            return null;
        }
    }

    //salva l'oggetto camera se non esiste, altrimenti fa un aggiornamento
    public static function salvaOggetto($camera , $campi = null){
        if($campi === null){
            FDataMapper::getInstance()->beginTransaction();
            $id = FDataMapper::getInstance()->salvaOggetto(self::$class, $oggetto);
            FDataMapper::getInstance()->commit();
            if($id !== null){
                $oggetto->setId($id);
                return true;
            }else{
                return false;
            }
        }else{
            try{
                FDataMapper::getInstance()->getDb()->beginTransaction();
                foreach($campi as $c){
                    FDataMapper::getInstance()->aggiornaOggetto(self::$table, $c[0], $c[1], self::$key, $camera->getId());
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

            if(FDataMapper::getInstance()->esiste(self::$table, self::$key, $id)){
                FDataMapper::getInstance()->cancellaOggetto(self::$table, self::$key, $id);
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

    public static function getAllCamere(){
        $camere = FDataMapper::getInstance()->selectAll();
        return $camere;
    }

    public static function getCamerePosti($posti){
        $camere = self::getAllCamere();
        $camereDisponibili = array();
        foreach ($camere as $queryRes){
            if($queryRes["posti"]<=$posti){
                $camera = new ECamera($queryRes["nome"], $queryRes["posti"], $queryRes["prezzo"], $queryRes["tipo"]);
                $camera->setId($queryRes["id"]);
                $camereDisponibili[] = $camera;
            }
        }
        return $camereDisponibili;
}

?>